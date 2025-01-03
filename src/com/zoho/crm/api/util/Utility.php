<?php
namespace com\zoho\crm\api\util;

use com\zoho\api\authenticator\OAuthToken;
use com\zoho\crm\api\fields\FieldsOperations;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\fields\ResponseWrapper;
use com\zoho\crm\api\fields\APIException;
use com\zoho\crm\api\modules\ModulesOperations;
use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\relatedlists\RelatedListsOperations;
use com\zoho\api\logger\SDKLogger;
use com\zoho\crm\api\modules\MinifiedModule;
use com\zoho\crm\api\fields\GetFieldsParam;
use com\zoho\crm\api\relatedlists\GetRelatedListsParam;
use com\zoho\crm\api\users\GetUsersParam;

/**
 * This class handles module field details.
 */
class Utility
{
    public static $apiTypeVsDataType = array();
    public static $apiTypeVsStructureName = array();
    public static $newFile = false;
    public static $getModifiedModules = false;
    public static $forceRefresh = false;
    private static $sdkException = 'com\zoho\crm\api\exception\SDKException';
    private static $moduleAPIName;
    private static $apiSupportedModule = array();

    public static function assertNotNull($value, $errorCode, $errorMessage)
	{
		if($value == null)
		{
			throw new SDKException($errorCode, $errorMessage);
		}
    }

    private static function fileExistsFlow($moduleAPIName, $recordFieldDetailsPath, &$lastModifiedTime)
    {
        $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
        if(Initializer::getInitializer()->getSDKConfig()->getAutoRefreshFields() && !self::$newFile && !self::$getModifiedModules && (!array_key_exists(Constants::FIELDS_LAST_MODIFIED_TIME, $recordFieldDetailsJson) || self::$forceRefresh || (round(microtime(true) * 1000) - $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME]) > 3600000))
        {
            self::$getModifiedModules = true;
            $lastModifiedTime = (!self::$forceRefresh && array_key_exists(Constants::FIELDS_LAST_MODIFIED_TIME, $recordFieldDetailsJson)) ?  $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] : null;
            self::modifyFields($recordFieldDetailsPath, $lastModifiedTime);
            self::$getModifiedModules = false;
        }
        else if(!Initializer::getInitializer()->getSDKConfig()->getAutoRefreshFields() && self::$forceRefresh && !self::$getModifiedModules)
        {
            self::$getModifiedModules = true;
            self::modifyFields($recordFieldDetailsPath, $lastModifiedTime);
            self::$getModifiedModules = false;
        }
        $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
        if ($moduleAPIName == null || (array_key_exists(strtolower($moduleAPIName), $recordFieldDetailsJson) && isset($recordFieldDetailsJson[strtolower($moduleAPIName)])))
        {
            return;
        }
        else
        {
            self::fillDataType();
            $recordFieldDetailsJson[strtolower($moduleAPIName)] = array();
            file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
            $fieldDetails = self::getFieldDetails($moduleAPIName);
            $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
            $recordFieldDetailsJson[strtolower($moduleAPIName)] = $fieldDetails;
            file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
        }
    }

    private static function verifyModuleAPIName($moduleName)
	{
		if($moduleName != null && array_key_exists(strtolower($moduleName), Constants::DEFAULT_MODULENAME_VS_APINAME) && Constants::DEFAULT_MODULENAME_VS_APINAME[strtolower($moduleName)] != null)
		{
			return Constants::DEFAULT_MODULENAME_VS_APINAME[strtolower($moduleName)];
		}
        $recordFieldDetailsPath = self::getEncodedFileName();
        if (file_exists($recordFieldDetailsPath))
        {
            $fieldsJSON = Initializer::getJSON($recordFieldDetailsPath);
			if(array_key_exists(Constants::SDK_MODULE_METADATA, $fieldsJSON) && array_key_exists(strtolower($moduleName), $fieldsJSON[Constants::SDK_MODULE_METADATA]))
			{
                $moduleMeta = $fieldsJSON[Constants::SDK_MODULE_METADATA];
				return $moduleMeta[strtolower($moduleName)][Constants::API_NAME];
			}
        }
		return $moduleName;
	}

    private static function setHandlerAPIPath($moduleAPIName, $handlerInstance)
	{
		if($handlerInstance == null)
		{
			return;
		}
		$apiPath = $handlerInstance->getAPIPath();
		if(strpos(strtolower($apiPath), strtolower($moduleAPIName)) == true)
		{
			$apiPathSplit = explode("/", $apiPath);
			for($i = 0; $i < sizeof($apiPathSplit); $i++)
			{
				if(strtolower($apiPathSplit[$i]) == strtolower($moduleAPIName))
				{
					$apiPathSplit[$i] = $moduleAPIName;
				}
				else if(array_key_exists(strtolower($apiPathSplit[$i]), Constants::DEFAULT_MODULENAME_VS_APINAME) && Constants::DEFAULT_MODULENAME_VS_APINAME[strtolower($apiPathSplit[$i])] != null)
				{
					$apiPathSplit[$i] = Constants::DEFAULT_MODULENAME_VS_APINAME[strtolower($apiPathSplit[$i])];
				}
			}
			$apiPath = join("/", $apiPathSplit);
			$handlerInstance->setAPIPath($apiPath);
		}
	}

    /**
     * This method to fetch field details of the current module for the current user and store the result in a JSON file.
     * @param string $moduleAPIName A String containing the CRM module API name.
     * @param string $handlerInstance A CommonAPIHandler Instance
     */
    public static function getFields($moduleAPIName, $handlerInstance = null)
    {
        if (strpos($moduleAPIName, ",") !== false)
        {
            $moduleAPINames = explode(",", $moduleAPIName);
            foreach($moduleAPINames as $moduleName)
            {
                self::$moduleAPIName = $moduleName;
                self::getFieldsInfo(self::$moduleAPIName, $handlerInstance);
            }
        }
        else
        {
            self::$moduleAPIName = $moduleAPIName;
            self::getFieldsInfo(self::$moduleAPIName, $handlerInstance);
        }
    }

    /**
	 * This method to fetch field details of the current module for the current user and store the result in a JSON file.
	 * @param string $moduleAPIName A String containing the CRM module API name.
	 * @throws SDKException
	 */
	public static function getFieldsInfo($moduleAPIName, $handlerInstance = null)
	{
        $recordFieldDetailsPath = null;
        $lastModifiedTime = null;
        try
        {
            $moduleAPIName = self::verifyModuleAPIName($moduleAPIName);
            self::setHandlerAPIPath($moduleAPIName, $handlerInstance);
            if($handlerInstance != null && $handlerInstance->getModuleAPIName() == null && !in_array(strtolower($moduleAPIName), Constants::SKIP_MODULES)) 
            {
                return;
            }
            $recordFieldDetailsPath = self::getEncodedFileName();
            if (file_exists($recordFieldDetailsPath))
            {
                self::fileExistsFlow($moduleAPIName, $recordFieldDetailsPath, $lastModifiedTime);
            }
            else if(Initializer::getInitializer()->getSDKConfig()->getAutoRefreshFields())
            {
                self::$newFile = true;
                self::fillDataType();
                self::$apiSupportedModule = count(self::$apiSupportedModule) > 0 ? self::$apiSupportedModule : self::getModules(null);
                $recordFieldDetailsJson = file_exists($recordFieldDetailsPath) ? Initializer::getJSON($recordFieldDetailsPath) : array();
                $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] = round(microtime(true) * 1000);
                if(count(self::$apiSupportedModule) > 0)
                {
                    foreach(self::$apiSupportedModule as $module => $value)
                    {
                        if(!array_key_exists($module, $recordFieldDetailsJson))
                        {
                            $moduleData = self::$apiSupportedModule[$module];
                            $recordFieldDetailsJson[$module] = array();
                            file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));// file created with only dummy
                            $fieldDetails = Utility::getFieldDetails($moduleData[Constants::API_NAME]);
                            $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
                            $recordFieldDetailsJson[$module] = $fieldDetails;
                            file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));// overwrting the dummy +existing data
                        }
                    }
                }
				self::$newFile = false;
            }
            else if(self::$forceRefresh && !self::$getModifiedModules)
            {
                //New file - and force refresh by User
                self::$getModifiedModules = true;
                $recordFieldDetailsJson = array();
                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));// file created with only dummy
                self::modifyFields($recordFieldDetailsPath, $lastModifiedTime);
                self::$getModifiedModules = false;
            }
            else
            {
                Utility::fillDataType();
                $recordFieldDetailsJson = array();
                $recordFieldDetailsJson[strtolower($moduleAPIName)] = array();
                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
                $fieldDetails = Utility::getFieldDetails($moduleAPIName);
                $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
                $recordFieldDetailsJson[strtolower($moduleAPIName)] = $fieldDetails;
                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
            }
        }
        catch (\Exception $e)
		{
            if($recordFieldDetailsPath != null && file_exists($recordFieldDetailsPath))
			{
                $recordFieldDetailsJson = array();
				try
				{
					$recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
					if(array_key_exists(strtolower($moduleAPIName), $recordFieldDetailsJson))
					{
						unset($recordFieldDetailsJson[strtolower($moduleAPIName)]);
                    }
                    if(self::$newFile)
					{
						if(array_key_exists(Constants::FIELDS_LAST_MODIFIED_TIME, $recordFieldDetailsJson) && $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] != null)
						{
							unset($recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME]);
						}
						self::$newFile = false;
					}
					if(self::$getModifiedModules || self::$forceRefresh)
					{
                        self::$getModifiedModules = false;
                        self::$forceRefresh = false;
						if($lastModifiedTime != null)
						{
							$recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] = $lastModifiedTime;
						}
					}
					file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
				}
				catch (\Exception $ex)
				{
                    if(!($ex instanceof self::$sdkException))
                    {
                        $ex = new SDKException(null, null, null, $ex);
                    }
                    SDKLogger::severeError(Constants::EXCEPTION, $ex);
                    throw $ex;
				}
            }
            if(!($e instanceof self::$sdkException))
            {
                $e = new SDKException(null, null, null, $e);
            }
            SDKLogger::severeError(Constants::EXCEPTION, $e);
            throw $e;
		}
    }

    private static function modifyFields($recordFieldDetailsPath, $modifiedTime)
	{
        $modifiedModules = self::getModules($modifiedTime);
		$recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
		$recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] = round(microtime(true) * 1000);
		file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
		if(count($modifiedModules) > 0)
		{
			foreach($modifiedModules as $module => $value)
			{
				if(array_key_exists(strtolower($module), $recordFieldDetailsJson))
				{
					unset($recordFieldDetailsJson[strtolower($module)]);
				}
			}
            file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
			foreach($modifiedModules as $module => $value)
			{
                $moduleData = $modifiedModules[strtolower($module)];
				Utility::getFieldsInfo($moduleData[Constants::API_NAME], null);
			}
		}
    }

    public static function deleteFields(&$recordFieldDetailsJson, $module)
    {
        $subformModules = array();
        $fieldsJSON = $recordFieldDetailsJson[$module];
        foreach ($fieldsJSON as $key => $value)
        {
            if(array_key_exists(Constants::SUBFORM, $value) && $value[Constants::SUBFORM] == true && array_key_exists($value[Constants::MODULE], $recordFieldDetailsJson))
            {
                array_push($subformModules, $value[Constants::MODULE]);
            }
        }
        unset($recordFieldDetailsJson[$module]);
        if(count($subformModules) > 0)
        {
            foreach($subformModules as $subformModule)
            {
                self::deleteFields($recordFieldDetailsJson, $subformModule);
            }
        }
    }
    public static function getEncodedFileName()
    {
        $initializer = Initializer::getInitializer();
        $token = $initializer->getToken();
        $accessToken = "";
        $refreshToken = "";
        $tokenKey = "";
        if ($token instanceof OAuthToken)
        {
            $oauthToken = $token;
			if($oauthToken->getUserSignature() != null)
			{
				$tokenKey = $oauthToken->getUserSignature()->getName();
			}
			else
			{
				$refreshToken = $oauthToken->getRefreshToken();
				if ($refreshToken != null && mb_strlen($refreshToken, 'utf-8') > 0)
				{
                    $tokenKey = substr($refreshToken, 0, mb_strlen($refreshToken, 'utf-8') - 32);
				}
				else
				{
					$accessToken = $oauthToken->getAccessToken();
					if ($accessToken != null && mb_strlen($accessToken) > 0)
					{
						$tokenKey = substr($accessToken, 0, mb_strlen($accessToken, 'utf-8') - 32);
					}
				}
			}
        }
        $fileName = $initializer->getEnvironment()->getUrl();
        if ($tokenKey != null && mb_strlen($tokenKey, 'utf-8') > 0)
        {
            $fileName = $fileName . $tokenKey;
        }
        $input = unpack('C*', mb_convert_encoding($fileName, "UTF-8"));
        $str = base64_encode(implode(array_map("chr", $input)));
        $resourcesPath = Initializer::getInitializer()->getResourcePath() . DIRECTORY_SEPARATOR . Constants::FIELD_DETAILS_DIRECTORY;
        if (!is_dir($resourcesPath))
        {
            mkdir($resourcesPath);
        }
        return $resourcesPath . DIRECTORY_SEPARATOR . $str . ".json";
    }

    public static function getRelatedLists($relatedModuleName, $moduleAPIName, &$commonAPIHandler)
	{
		try
		{
			$isNewData = false;
			$key = strtolower($moduleAPIName . Constants::UNDERSCORE . Constants::RELATED_LISTS);
            $recordFieldDetailsPath = self::getEncodedFileName();
			if(!file_exists($recordFieldDetailsPath) || (file_exists($recordFieldDetailsPath) && (!array_key_exists($key, Initializer::getJSON($recordFieldDetailsPath)) || (is_null(Initializer::getJSON($recordFieldDetailsPath)[$key]) || count(Initializer::getJSON($recordFieldDetailsPath)[$key]) <= 0 ))))
			{
                $isNewData = true;
                $moduleAPIName = self::verifyModuleAPIName($moduleAPIName);
                $relatedListValues = self::getRelatedListDetails($moduleAPIName);
                $recordFieldDetailsJSON = file_exists($recordFieldDetailsPath) ?  Initializer::getJSON($recordFieldDetailsPath) : array();
                $recordFieldDetailsJSON[$key] = $relatedListValues;
                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJSON));
			}
			$recordFieldDetailsJSON = Initializer::getJSON($recordFieldDetailsPath);
			$modulerelatedList = array_key_exists($key, $recordFieldDetailsJSON) ? $recordFieldDetailsJSON[$key] : array();
			if(!self::checkRelatedListExists($relatedModuleName, $modulerelatedList, $commonAPIHandler) && !$isNewData)
			{
				unset($recordFieldDetailsJSON[$key]);
				file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJSON));
                self::getRelatedLists($relatedModuleName, $moduleAPIName, $commonAPIHandler);
			}
		}
		catch (SDKException $ex)
		{
		    SDKLogger::severeError(Constants::EXCEPTION, $ex);
		    throw $ex;
		}
		catch (\Exception $e)
		{
		    $exception = new SDKException(Constants::EXCEPTION, null,null,$e);
		    SDKLogger::severeError(Constants::EXCEPTION, $exception);
			throw $exception;
		}
	}

	private static function checkRelatedListExists($relatedModuleName, $modulerelatedListJA, $commonAPIHandler)
	{
		foreach($modulerelatedListJA as $relatedListJO)
		{
			if(array_key_exists(Constants::API_NAME, $relatedListJO) && ($relatedListJO[Constants::API_NAME] != null && strtolower($relatedListJO[Constants::API_NAME]) == strtolower($relatedModuleName)))
			{
                if($relatedListJO[Constants::HREF] === Constants::NULL_VALUE)
                {
			        throw new SDKException(Constants::UNSUPPORTED_IN_API, $commonAPIHandler->getHttpMethod() . " " . $commonAPIHandler->getAPIPath() . " " . Constants::UNSUPPORTED_IN_API_MESSAGE);
                }
                if($relatedListJO[Constants::MODULE] !== Constants::NULL_VALUE)
                {
    				$commonAPIHandler->setModuleAPIName($relatedListJO[Constants::MODULE]);
    				self::getFieldsInfo($relatedListJO[Constants::MODULE], $commonAPIHandler);
			    }
				return true;
			}
		}
		return false;
	}

	private static function getRelatedListDetails($moduleAPIName)
	{
		$relatedListsOperations = new RelatedListsOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetRelatedListsParam::module(), $moduleAPIName);
		$response = $relatedListsOperations->getRelatedLists($paramInstance);
		$relatedListJA = array();
		if($response != null)
		{
            if(strval($response->getStatusCode()) == Constants::NO_CONTENT_STATUS_CODE)
			{
				return $relatedListJA;
            }
            $responseHandler = $response->getObject();
            $relatedlistsResponseWrapper = 'com\zoho\crm\api\relatedlists\ResponseWrapper';
            $relatedlistsAPIException = 'com\zoho\crm\api\relatedlists\APIException';
            if($responseHandler instanceof $relatedlistsResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $relatedLists = $responseWrapper->getRelatedLists();
                foreach($relatedLists as $relatedList)
                {
                    $relatedListDetail = array();
                    $relatedListDetail[Constants::API_NAME] = $relatedList->getAPIName();
                    $relatedListDetail[Constants::MODULE] = $relatedList->getModule() != null ? $relatedList->getModule()->getAPIName() : Constants::NULL_VALUE;
                    $relatedListDetail[Constants::NAME] = $relatedList->getName();
                    $relatedListDetail[Constants::HREF] = $relatedList->getHref() != null ? $relatedList->getHref() : Constants::NULL_VALUE;
                    array_push($relatedListJA, $relatedListDetail);
                }
            }
            else if($responseHandler instanceof $relatedlistsAPIException)
            {
                $exception = $responseHandler;
                $errorResponse = array();
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                $errorResponse[Constants::MESSAGE] = $exception->getMessage();
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
			else
			{
				$errorResponse = array();
				$errorResponse[Constants::CODE] = $response->getStatusCode();
				throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
        }
		return $relatedListJA;
	}

    /**
     * This method to get module field data from Zoho CRM.
     * @param string $moduleAPIName A string containing the CRM module API name.
     * @return array[] A array[] representing the Zoho CRM module field details.
     */
    public static function getFieldDetails($moduleAPIName)
    {
        $fieldsDetails = array();
        $fieldOperation = new FieldsOperations();
        $parameterMap = new ParameterMap();
        $parameterMap->add(GetFieldsParam::module(), $moduleAPIName);
        $response = $fieldOperation->getFields($parameterMap);
        if($response != null)
		{
            if(strval($response->getStatusCode()) == Constants::NO_CONTENT_STATUS_CODE)
			{
				return $fieldsDetails;
            }
            $responseHandler = $response->getObject();
            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $fields = $responseWrapper->getFields();
                foreach ($fields as $field)
                {
                    $keyName = $field->getAPIName();
                    if (in_array($keyName, Constants::KEYS_TO_SKIP))
                    {
                        continue;
                    }
                    $fieldDetail = array();
                    $fieldDetail = Utility::setDataType($fieldDetail, $field, $moduleAPIName);
                    $fieldsDetails[$field->getAPIName()] = $fieldDetail;
                }
                if(in_array(strtolower($moduleAPIName), Constants::INVENTORY_MODULES))
                {
                    $fieldDetail = array();
                    $fieldDetail[Constants::NAME] = Constants::LINE_TAX;
                    $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
                    $fieldDetail[Constants::STRUCTURE_NAME] = Constants::LINE_TAX_NAMESPACE;
                    $fieldDetail[Constants::LOOKUP] = true;
                    $fieldsDetails[Constants::LINE_TAX] =  $fieldDetail;
                }
                if(strtolower($moduleAPIName) === strtolower(Constants::NOTES))
                {
                    $fieldDetail = array();
                    $fieldDetail[Constants::NAME] = Constants::ATTACHMENTS;
                    $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
                    $fieldDetail[Constants::STRUCTURE_NAME] = Constants::ATTACHMENTS_NAMESPACE;
                    $fieldsDetails[Constants::ATTACHMENTS] =  $fieldDetail;
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                $errorResponse = array();
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                $errorResponse[Constants::MESSAGE] = $exception->getMessage();
                $exception = new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
                if(strtolower(self::$moduleAPIName) == strtolower($moduleAPIName))
                {
                    throw $exception;
                }
                SDKLogger::severeError(Constants::API_EXCEPTION, $exception);
            }
        }
        else
        {
            throw new SDKException(Constants::API_EXCEPTION, null, null);
        }
        return $fieldsDetails;
    }

    public static function verifyPhotoSupport($moduleAPIName)
	{
		try
		{
			$moduleAPIName = self::verifyModuleAPIName($moduleAPIName);
			if(in_array(strtolower($moduleAPIName), Constants::PHOTO_SUPPORTED_MODULES))
			{
				return true;
			}
            $modules = self::getModuleNames();
			if(array_key_exists(strtolower($moduleAPIName), $modules) && $modules[strtolower($moduleAPIName)] != null)
			{
                $moduleMetaData = $modules[strtolower($moduleAPIName)];
				if(array_key_exists(Constants::GENERATED_TYPE, $moduleMetaData) && $moduleMetaData[Constants::GENERATED_TYPE] != Constants::GENERATED_TYPE_CUSTOM)
				{
					throw new SDKException(Constants::UPLOAD_PHOTO_UNSUPPORTED_ERROR, Constants::UPLOAD_PHOTO_UNSUPPORTED_MESSAGE . $moduleAPIName);
				}
			}
		}
		catch(SDKException $e)
		{
			throw $e;
		}
		catch(\Exception $e)
		{
			throw new SDKException(Constants::EXCEPTION, $e);
		}
		return true;
    }

    private static function getModuleNames()
	{
		$moduleData = array();
        $recordFieldDetailsPath = self::getEncodedFileName();
        if (!file_exists($recordFieldDetailsPath) || (file_exists($recordFieldDetailsPath) && (!array_key_exists(Constants::SDK_MODULE_METADATA, Initializer::getJSON($recordFieldDetailsPath)) || (Initializer::getJSON($recordFieldDetailsPath)[Constants::SDK_MODULE_METADATA] == null || count(Initializer::getJSON($recordFieldDetailsPath)[Constants::SDK_MODULE_METADATA]) <= 0))))
        {
			$moduleData = self::getModules(null);
			self::writeModuleMetaData($recordFieldDetailsPath, $moduleData);
			return $moduleData;
		}
		$recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
		return $recordFieldDetailsJson[Constants::SDK_MODULE_METADATA];
    }

    private static function writeModuleMetaData($recordFieldDetailsPath, $moduleData)
	{
		$fieldDetailsJSON = file_exists($recordFieldDetailsPath) ? Initializer::getJSON($recordFieldDetailsPath) : array();
		$fieldDetailsJSON[Constants::SDK_MODULE_METADATA] = $moduleData;
        file_put_contents($recordFieldDetailsPath, json_encode($fieldDetailsJSON));
	}

    private static function getModules($header)
	{
		$apiNames = array();
		$headerMap = new HeaderMap();
		if($header != null)
		{
            $datetime = new \DateTime(date("Y-m-d H:i:s", intval($header/1000)));
            $datetime->setTimezone(new \DateTimeZone(date_default_timezone_get()));
            $moduleHeader = new Header(Constants::IF_MODIFIED_SINCE);
			$headerMap->add($moduleHeader, $datetime);
		}
        $parameterMap = new ParameterMap();
        $modulesOperations = new ModulesOperations();
        $response = $modulesOperations->getModules($parameterMap, $headerMap);
        if($response != null)
		{
            if(in_array(strval($response->getStatusCode()), array(Constants::NO_CONTENT_STATUS_CODE, Constants::NOT_MODIFIED_STATUS_CODE)))
            {
				return $apiNames;
            }
            $responseObject = $response->getObject();
            $moduleResponseWrapper = Constants::MODULE_RESPONSE_WRAPPER;
            $apiException = Constants::MODULE_API_EXCEPTION;
            if($responseObject instanceof $moduleResponseWrapper)
            {
                $modules = $responseObject->getModules();
                foreach($modules as $module)
                {
                    if($module->getAPISupported())
                    {
                        $moduleDetails = array();
                        $moduleDetails[Constants::API_NAME] = $module->getAPIName();
                        $moduleDetails[Constants::GENERATED_TYPE] = $module->getGeneratedType()->getValue();
                        $apiNames[strtolower($module->getAPIName())] = $moduleDetails;
                    }
                }
            }
            else if ($responseObject instanceOf $apiException)
            {
                $exception = $responseObject;
                $errorResponse = array();
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                $errorResponse[Constants::MESSAGE] = $exception->getMessage();
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
        }
        if($header == null)
		{
			try
			{
                $recordFieldDetailsPath = self::getEncodedFileName();
				self::writeModuleMetaData($recordFieldDetailsPath, $apiNames);
			}
			catch (\Exception $e)
			{
				throw new SDKException(Constants::EXCEPTION, null, null, $e);
			}
		}
		return $apiNames;
    }

    public static function refreshModules()
    {
        self::$forceRefresh = true;
        self::getFieldsInfo(null, null);
        self::$forceRefresh = false;
    }

    public static function getJSONObject($json, $key)
    {
        foreach ($json as $JSONKey => $value)
        {
            if (strtolower($key) == strtolower($JSONKey))
            {
                return $value;
            }
        }
        return null;
    }

    public static function setDataType($fieldDetail, $field, $moduleAPIName)
    {
        $apiType = $field->getDataType();
        $keyName = $field->getAPIName();
        $module = new MinifiedModule();
        if($field->getSystemMandatory() != null && $field->getSystemMandatory() == true && !(strtolower($moduleAPIName) == strtolower(Constants::CALLS) && strtolower($keyName) == strtolower(Constants::CALL_DURATION)))
		{
			$fieldDetail[Constants::REQUIRED] = true;
        }
        if (strtolower($keyName) == Constants::PRICING_DETAILS && strtolower($moduleAPIName) == Constants::PRICE_BOOKS)
        {
            $fieldDetail[Constants::NAME] = $keyName;
            $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::PRICING_DETAILS_NAMESPACE;
            $fieldDetail[Constants::SKIP_MANDATORY] = true;
            return $fieldDetail;
        }
        else if (strtolower($keyName) == Constants::PARTICIPANT_API_NAME && (strtolower($moduleAPIName) == Constants::EVENTS || strtolower($moduleAPIName) == Constants::ACTIVITIES))
        {
            $fieldDetail[Constants::NAME] = $keyName;
            $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::PARTICIPANTS;
            $fieldDetail[Constants::SKIP_MANDATORY] = true;
            return $fieldDetail;
        }
        else if (strtolower($keyName) == Constants::COMMENTS && (strtolower($moduleAPIName) == Constants::SOLUTIONS || strtolower($moduleAPIName) == Constants::CASES))
		{
			$fieldDetail[Constants::NAME] = $keyName;
			$fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::COMMENT_NAMESPACE;
            $fieldDetail[Constants::LOOKUP] = true;
			return $fieldDetail;
		}
        else if (strtolower($keyName) == Constants::LAYOUT)
		{
			$fieldDetail[Constants::NAME] = $keyName;
			$fieldDetail[Constants::TYPE] = Constants::LAYOUT_NAMESPACE;
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::LAYOUT_NAMESPACE;
            $fieldDetail[Constants::LOOKUP] = true;
			return $fieldDetail;
        }
        else if((strtolower($keyName) == strtolower(Constants::TERRITORIES) || strtolower($keyName) == strtolower(Constants::TERRITORY)) && $field->getCustomField() !== null && $field->getCustomField() == false)
		{
			$fieldDetail[Constants::NAME] = $keyName;
			$fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
			$fieldDetail[Constants::STRUCTURE_NAME] = Constants::TERRITORY_NAMESPACE;
			$fieldDetail[Constants::LOOKUP] = true;
			return $fieldDetail;
        }
        else if(strtolower($keyName) == strtolower(Constants::PRODUCT_NAME) && in_array(strtolower($moduleAPIName), Constants::INVENTORY_MODULES_ITEMS))
        {
            $fieldDetail[Constants::NAME] = $keyName;
            $fieldDetail[Constants::TYPE] = Constants::LINEITEM_PRODUCT;
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::LINEITEM_PRODUCT;
            $fieldDetail[Constants::SKIP_MANDATORY] = true;
            return $fieldDetail;
        }
        else if(strtolower($keyName) == strtolower(Constants::DISCOUNT) && in_array(strtolower($moduleAPIName), Constants::INVENTORY_MODULES_ITEMS))
        {
            $fieldDetail[Constants::NAME] = $keyName;
            $fieldDetail[Constants::TYPE] = Constants::STRING_NAMESPACE;
            return $fieldDetail;
        }
        else if (strtolower($keyName) == strtolower(Constants::TAX) && strtolower(Constants::PRODUCTS) ==  strtolower($moduleAPIName))
        {
            $fieldDetail[Constants::NAME] = $keyName;
            $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::TAX_NAMESPACE;
            return $fieldDetail;
        }
        else if (array_key_exists($apiType, Utility::$apiTypeVsDataType))
        {
            $fieldDetail[Constants::TYPE] = Utility::$apiTypeVsDataType[$apiType];
        }
        else if(strtolower($apiType) == Constants::FORMULA)
        {
            if($field->getFormula() != null)
            {
                $returnType = $field->getFormula()->getReturnType();
                if($returnType != null && array_key_exists($returnType, Utility::$apiTypeVsDataType) && Utility::$apiTypeVsDataType[$returnType] != null)
                {
                    $fieldDetail[Constants::TYPE] = Utility::$apiTypeVsDataType[$returnType];
                }
            }
            $fieldDetail[Constants::READ_ONLY] = true;
        }
        else if(strtolower($apiType) == Constants::ROLLUP_SUMMARY)
        {
            if($field->getRollupSummary() != null)
            {
                $returnType = $field->getRollupSummary()->getReturnType();
                if($returnType != null && array_key_exists($returnType, Utility::$apiTypeVsDataType) && Utility::$apiTypeVsDataType[$returnType] != null)
                {
                    $fieldDetail[Constants::TYPE] = Utility::$apiTypeVsDataType[$returnType];
                }
                else if($field->getJsonType() != null && array_key_exists($field->getJsonType(), Utility::$apiTypeVsDataType) && Utility::$apiTypeVsDataType[$field->getJsonType()] != null)
                {
                    $fieldDetail[Constants::TYPE] = Utility::$apiTypeVsDataType[$field->getJsonType()];
                }
            }
        }
        else
        {
            return;
        }
        if(strpos(strtolower($apiType), Constants::LOOKUP) !== false)
        {
            $fieldDetail[Constants::LOOKUP] = true;
        }
        if(strtolower($apiType) == Constants::CONSENT_LOOKUP || strtolower($apiType) == Constants::OWNER_LOOKUP)
        {
            $fieldDetail[Constants::SKIP_MANDATORY] = true;
        }
        if(strtolower($apiType) == Constants::MULTI_SELECT_LOOKUP)
		{
			$fieldDetail[Constants::SKIP_MANDATORY] = true;
            $multiselectlookup = $field->getMultiselectlookup();
            if($multiselectlookup != null)
            {
                $linkingDetails = $multiselectlookup->getLinkingDetails();
                if($linkingDetails != null)
                {
                    $linkingModule = $linkingDetails->getModule();
                    $fieldDetail[Constants::MODULE] = $linkingModule->getAPIName();
                    $module = new MinifiedModule();
                    $module->setAPIName($linkingModule->getAPIName());
					$module->setId($linkingModule->getId());
                }
            }
			$fieldDetail[Constants::SUBFORM] = true;
        }
        if(strtolower($apiType) == Constants::MULTI_USER_LOOKUP)
		{
			$fieldDetail[Constants::SKIP_MANDATORY] = true;
            $multiuserlookup = $field->getMultiuserlookup();
            if ($multiuserlookup != null)
            {
                $linkingDetails = $multiuserlookup->getLinkingDetails();
                if($linkingDetails != null)
                {
                    $linkingModule = $linkingDetails->getModule();
                    $module = new MinifiedModule();
					$module->setAPIName($linkingModule->getAPIName());
					$module->setId($linkingModule->getId());
                }
            }
			$fieldDetail[Constants::SUBFORM] = true;
		}
        if(strtolower($apiType) == Constants::MULTI_MODULE_LOOKUP)
		{
			$fieldDetail[Constants::SKIP_MANDATORY] = true;	
			$fieldDetail[Constants::SUBFORM] = true;
		}
        if (array_key_exists($apiType, Utility::$apiTypeVsStructureName))
        {
            $fieldDetail[Constants::STRUCTURE_NAME] = Utility::$apiTypeVsStructureName[$apiType];
        }
        if (strtolower($apiType) == Constants::PICKLIST && ($field->getPickListValues() != null && sizeof($field->getPickListValues()) > 0))
        {
            $fieldDetail[Constants::PICKLIST] = true;
            $values = array();
            foreach ($field->getPickListValues() as $plv)
            {
                $values[] = $plv->getDisplayValue();
            }
            $fieldDetail[Constants::VALUES] = $values;
        }
        if ($apiType == Constants::SUBFORM && $field->getAssociatedModule() != null)
        {
            $module->setAPIName($field->getAssociatedModule()->getModule());
            $fieldDetail[Constants::MODULE] = $module->getAPIName();
            $fieldDetail[Constants::SKIP_MANDATORY] = true;
            $fieldDetail[Constants::SUBFORM] = true;
        }
        if ($apiType == Constants::LOOKUP && $field->getLookup() != null)
        {
            $module1 = $field->getLookup()->getModule();
            if ($module1 != null && strtolower($module1->getAPIName()) != Constants::SE_MODULE)
            {
                $module->setAPIName($module1->getAPIName());
                $module->setId($module1->getId());
                $fieldDetail[Constants::MODULE] = $module1->getAPIName();
                if(strtolower($module1->getAPIName()) == Constants::ACCOUNTS && !$field->getCustomField())
                {
                    $fieldDetail[Constants::SKIP_MANDATORY] = true;
                }
            }
            else
            {
                $module = new MinifiedModule();
            }
            $fieldDetail[Constants::LOOKUP] = true;
        }
        if ($module != null && $module->getAPIName() != null && strlen($module->getAPIName()) > 0)
        {
            Utility::getFieldsInfo($module->getAPIName());
        }
        $fieldDetail[Constants::NAME] = $keyName;
        return $fieldDetail;
    }

    public static function fillDataType()
    {
        if(count(self::$apiTypeVsDataType) > 0)
        {
            return;
        }
        $fieldAPINamesString = ["textarea", "text", "website", "email", "phone", "mediumtext", "profileimage", "autonumber"];
        $fieldAPINamesInteger = ["integer"];
        $fieldAPINamesBoolean = ["boolean"];
        $fieldAPINamesLong = ["long", "bigint"];
        $fieldAPINamesDouble = ["double", "percent", "lookup", "currency"];
        $fieldAPINamesFieldFile = ["fileupload"];
        $fieldAPINamesDateTime = ["datetime", "event_reminder"];
        $fieldAPINamesDate = ["date"];
        $fieldAPINamesLookup = ["lookup"];
        $fieldAPINamesPickList = ["picklist"];
        $fieldAPINamesMultiSelectPickList = ["multiselectpicklist"];
        $fieldAPINamesSubForm = ["subform"];
        $fieldAPINamesOwnerLookUp = ["ownerlookup", "userlookup"];
        $fieldAPINamesMultiUserLookUp = ["multiuserlookup"];
        $fieldAPINameTaskRemindAt = ["ALARM"];
        $fieldAPINameRecurringActivity = ["RRULE"];
        $fieldAPINameReminder = ["multireminder"];
        $fieldAPINameConsentLookUp = ["consent_lookup"];
        $fieldAPINameImageUpload = ["imageupload"];
        $fieldAPINameMultiSelectLookUp = ["multiselectlookup"];
        $fieldAPINameLineTax = ["linetax"];
        $fieldAPINamesModule = ["module"];
        $fieldAPINamesLayout = ["layout"];
        $fieldAPINamesMultiModuleLookUp = ["multi_module_lookup"];
        $fieldAPINamesTimeRange = ["time_range" ];
        foreach ($fieldAPINamesString as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::STRING_NAMESPACE;
        }
        foreach ($fieldAPINamesInteger as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::INTEGER_NAMESPACE;
        }
        foreach ($fieldAPINamesBoolean as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::BOOLEAN_NAMESPACE;
        }
        foreach ($fieldAPINamesLong as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::LONG_NAMESPACE;
        }
        foreach ($fieldAPINamesDouble as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::FLOAT_NAMESPACE;
        }
        foreach ($fieldAPINamesDateTime as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::DATETIME_NAMESPACE;
        }
        foreach ($fieldAPINamesDate as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::DATE;
        }
        foreach ($fieldAPINamesLookup as $fieldAPIName)
        {
            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::RECORD_NAMESPACE;
        }
        foreach ($fieldAPINamesPickList as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::CHOICE_NAMESPACE;
        }
        foreach ($fieldAPINamesMultiSelectPickList as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::CHOICE_NAMESPACE;
        }
        foreach ($fieldAPINamesSubForm as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;
        }
        foreach ($fieldAPINamesOwnerLookUp as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::USER_NAMESPACE;
            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::USER_NAMESPACE;
        }
        foreach ($fieldAPINamesMultiUserLookUp as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;
        }
        foreach ($fieldAPINamesFieldFile as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::FIELD_FILE_NAMESPACE;
		}
		foreach ($fieldAPINameTaskRemindAt as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::REMINDAT_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::REMINDAT_NAMESPACE;
        }
        foreach ($fieldAPINameRecurringActivity as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::RECURRING_ACTIVITY_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECURRING_ACTIVITY_NAMESPACE;
        }
        foreach ($fieldAPINameReminder as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::REMINDER_NAMESPACE;
        }
        foreach ($fieldAPINameConsentLookUp as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::CONSENT_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::CONSENT_NAMESPACE;
        }
        foreach ($fieldAPINameImageUpload as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::IMAGEUPLOAD_NAMESPACE;
        }
        foreach ($fieldAPINameMultiSelectLookUp as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;
        }
        foreach($fieldAPINameLineTax as $fieldAPIName)
        {
            self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::LINE_TAX_NAMESPACE;
        }
        foreach ($fieldAPINamesModule as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::MODULE_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::MODULE_NAMESPACE;
		}
		foreach ($fieldAPINamesMultiModuleLookUp as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::RECORD_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;
		}
        foreach ($fieldAPINamesLayout as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::LAYOUT_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::LAYOUT_NAMESPACE;
		}
        foreach ($fieldAPINamesTimeRange as $fieldAPIName)
		{
			self::$apiTypeVsDataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::TIME_RANGE_NAMESPACE;
		}
    }

    public function getUserName($token)
	{
		$userName = null;
		$paramInstance = new ParameterMap();
		$paramInstance->add(GetUsersParam::type(), new Choice(Constants::CURRENTUSER));
		$headerInstance = new HeaderMap();
		$handlerInstance = new CommonAPIHandler();
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/users'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$headerInstance->add(new Header(Constants::AUTHORIZATION, Constants::STRING_NAMESPACE), Constants::OAUTH_HEADER_PREFIX . $token);
		$handlerInstance->setHeader($headerInstance); 
		$response = $handlerInstance->apiCall("com\zoho\crm\api\users\ResponseHandler", 'application/json'); 
		if ($response != null)
		{
            if (in_array($response->getStatusCode(), array(204, 304)))
            {
                return null;
            }
			$responseHandler = $response->getObject();
            $usersResponseWrapper = "com\zoho\crm\api\users\ResponseWrapper";
            $usersAPIException = "com\zoho\crm\api\users\APIException";
            if ($responseHandler instanceof $usersResponseWrapper) 
            {
                $responseWrapper = $responseHandler;
                $users = $responseWrapper->getUsers();
                foreach ($users as $user) 
                {
                    $userName = $user->getEmail();
                    break;
                }
            }
            else if ($responseHandler instanceof $usersAPIException)
            {
                $exception = $responseHandler;
                $errorResponse = array();
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                $errorResponse[Constants::MESSAGE] = $exception->getMessage();
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
		}
        $orgID = $this->getUserOrgID($token);
        if($userName == null || $orgID == null)
        {
            return null;
        }
		return $userName . ":" . $orgID;
	}
	
	private function getUserOrgID($token)
	{
        $headerInstance = new HeaderMap();
		$handlerInstance = new CommonAPIHandler();
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/org'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$headerInstance->add(new Header(Constants::AUTHORIZATION, Constants::STRING_NAMESPACE), Constants::OAUTH_HEADER_PREFIX . $token);
		$handlerInstance->setHeader($headerInstance);
		$response = $handlerInstance->apiCall("com\zoho\crm\api\org\ResponseHandler", 'application/json'); 
		if ($response != null)
		{
            $responseHandler = $response->getObject();
            $orgResponseWrapper = "com\zoho\crm\api\org\ResponseWrapper";
            $orgAPIException = "com\zoho\crm\api\org\APIException";
            if ($responseHandler instanceof $orgResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $orgs = $responseWrapper->getOrg();
                foreach ($orgs as $org)
                {
                    return $org->getZgid();
                }
            }
            else if ($responseHandler instanceof $orgAPIException)
            {
                $exception = $responseHandler;
                $errorResponse = array();
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                $errorResponse[Constants::MESSAGE] = $exception->getMessage();
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
		}
		return null;
	}
}
?>