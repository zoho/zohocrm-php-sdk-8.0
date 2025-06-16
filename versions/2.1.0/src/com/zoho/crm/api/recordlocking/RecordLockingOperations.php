<?php 
namespace com\zoho\crm\api\recordlocking;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class RecordLockingOperations
{

	private  $moduleName;
	private  $recordId;

	/**
	 * Creates an instance of RecordLockingOperations with the given parameters
	 * @param string $recordId A string
	 * @param string $moduleName A string
	 */
	public function __Construct(string $recordId, string $moduleName)
	{
		$this->recordId=$recordId; 
		$this->moduleName=$moduleName; 

	}

	/**
	 * The method to get record locking informations
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getRecordLockingInformations(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Locking_Information__s'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setModuleAPIName("Locking_Information__s"); 
		Utility::getFields("Locking_Information__s", $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to lock records
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function lockRecords(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Locking_Information__s'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setModuleAPIName("Locking_Information__s"); 
		Utility::getFields("Locking_Information__s", $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get record locking information
	 * @param string $lockId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getRecordLockingInformation(string $lockId, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Locking_Information__s/'); 
		$apiPath=$apiPath.(strval($lockId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setModuleAPIName("Locking_Information__s"); 
		Utility::getFields("Locking_Information__s", $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update record locking information
	 * @param string $lockId A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateRecordLockingInformation(string $lockId, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Locking_Information__s/'); 
		$apiPath=$apiPath.(strval($lockId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setModuleAPIName("Locking_Information__s"); 
		Utility::getFields("Locking_Information__s", $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to unlock record
	 * @param string $lockId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function unlockRecord(string $lockId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Locking_Information__s/'); 
		$apiPath=$apiPath.(strval($lockId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setModuleAPIName("Locking_Information__s"); 
		Utility::getFields("Locking_Information__s", $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
