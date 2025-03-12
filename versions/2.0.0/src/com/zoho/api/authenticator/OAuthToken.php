<?php
namespace com\zoho\api\authenticator;

use com\zoho\crm\api\UserSignature;
use com\zoho\crm\api\util\APIHTTPConnector;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\api\authenticator\Token;
use com\zoho\crm\api\dc\DataCenter;
use com\zoho\api\logger\SDKLogger;
use com\zoho\crm\api\util\Utility;
use Exception;
use ReflectionClass;

/**
 * This class gets the tokens and checks the expiry time.
 * @template T
 */
class OAuthToken implements Token
{
    private $clientID = null;
    private $clientSecret = null;
    private $redirectURL = null;
    private $grantToken = null;
    private $refreshToken = null;
    private $accessToken = null;
    private $expiresIn = null;
    private $id = null;
    private $userSignature = null;
    private $apiDomain = null;
    private $findUser = true;

    /**
     * This is a getter method to get OAuth client id.
     * @return string A string representing the OAuth client id.
     */
    public function getClientId()
    {
        return $this->clientID;
    }

    /**
     * This is a getter method to get OAuth client secret.
     * @return string A string representing the OAuth client secret.
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * This is a getter method to get OAuth redirect URL.
     * @return string A string representing the OAuth redirect URL.
     */
    public function getRedirectURL()
    {
        return $this->redirectURL;
    }

    /**
     * This is a getter method to get grant token.
     * @return NULL|string A string representing the grant token.
     */
    public function getGrantToken()
    {
        return $this->grantToken;
    }

    /**
     * This is a getter method to get refresh token.
     * @return null|string|mixed A string representing the refresh token.
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * This is a setter method to set refresh token.
     * @param string $refreshToken A string containing the refresh token.
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * This is a getter method to set OAuth redirect URL.
     * @param string A string representing the OAuth redirect URL.
     */
    public function setRedirectURL($redirectURL)
    {
        $this->redirectURL = $redirectURL;
    }

    /**
     * This is a setter method to set OAuth client id.
     * @param string A string representing the OAuth client id.
     */
    public function setClientId($clientID)
    {
        $this->clientID = $clientID;
    }

    /**
     * This is a getter method to set OAuth client secret.
     * @param string A string representing the OAuth client secret.
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * This is a setter method to set grant token.
     * @param string A string representing the grant token.
     */
    public function setGrantToken($grantToken)
    {
        $this->grantToken = $grantToken;
    }

    /**
     * This is a getter method to get access token.
     * @return string A string representing the access token.
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * This is a setter method to set access token.
     * @param string $accessToken A string containing the access token.
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * This is a getter method to get token expire time.
     * @return string A string representing the token expire time.
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * This is a setter method to set token expire time.
     * @param string $expiresIn A string containing the token expire time.
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }

    /**
     * This is a getter method to get user Name.
     * @return UserSignature|null A object containing username.
     */
    public function getUserSignature()
    {
        return $this->userSignature;
    }

    /**
     * This is a setter method to set user Name.
     * @param UserSignature $userSignature A string containing the user Name.
     */
    public function setUserSignature(UserSignature $userSignature)
    {
        $this->userSignature = $userSignature;
    }

    /**
     * This is a getter method to get ID.
     * @return null|string|mixed A string representing the tokenId.
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * This is a setter method to set ID.
     * @param string $id A string containing the ID.
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAPIDomain()
	{
		return $this->apiDomain;
	}

	public function setAPIDomain($apiDomain)
	{
		$this->apiDomain = $apiDomain;
	}

    public function generateToken()
    {
        $this->getToken();
    }

    /**
     * @throws SDKException
     * @throws \ReflectionException
     */
    public function getToken()
    {
        $initializer = Initializer::getInitializer();
        $store = $initializer->getStore();
        $oauthToken = null;
        if ($this->getId() != null)
        {
            $oauthToken = $store->findTokenById($this->getId());
            $this->mergeObjects($this, $oauthToken);
            $oauthToken->findUser = $this->findUser;
        }
        else
        {
            $oauthToken = $store->findToken($this);
        }
        if($oauthToken == null)
        {
            if ($this->getUserSignature() != null)
            {
                $this->checkTokenDetails();
            }
            $oauthToken = $this;
        }
		if($oauthToken->getAPIDomain() == null || mb_strlen($oauthToken->getAPIDomain(), 'utf-8') <= 0)
		{
			if($initializer->getEnvironment() == null)
			{
				throw new SDKException(Constants::ENVIRONMENT_ERROR_1, Constants::ENVIRONMENT_ERROR_MESSAGE . " : ");
			}
			$oauthToken->setAPIDomain($initializer->getEnvironment()->getUrl());
		}
        $environment = DataCenter::get($oauthToken->getAPIDomain());
        if($environment != null)
        {
            try
            {
                $cl = get_class($initializer);
                $reflector = new \ReflectionClass($cl);
                $member = $reflector->getProperty(Constants::ENVIRONMENT_1);
                $member->setAccessible(true);
                $member->setValue($initializer, $environment);
            }
            catch (\Exception $e)
            {
                throw new SDKException(Constants::ENVIRONMENT_ERROR_RESPONSE . " : ", $e);
            }
        }
        else
        {
            if($initializer->getEnvironment() == null)
			{
				throw new SDKException(Constants::ENVIRONMENT_ERROR_1, Constants::ENVIRONMENT_ERROR_MESSAGE . " : ");
			}
        }
		$url = $initializer->getEnvironment()->getAccountsUrl();
        $save = false;
        if ($oauthToken->getAccessToken() == null || mb_strlen($oauthToken->getAccessToken(), 'utf-8') == 0)
        {
            if ($oauthToken->getRefreshToken() != null && mb_strlen($oauthToken->getRefreshToken() ?? '', 'utf-8') > 0)
            {
                SDKLogger::info(Constants::ACCESS_TOKEN_USING_REFRESH_TOKEN_MESSAGE);
                $oauthToken->refreshAccessToken($oauthToken, $url);
            }
            else 
            {
                SDKLogger::info(Constants::ACCESS_TOKEN_USING_GRANT_TOKEN_MESSAGE);
                $oauthToken->generateAccessToken($oauthToken, $url);
            }
            $save = true;
        }
        elseif ($oauthToken->getExpiresIn() != null && mb_strlen($oauthToken->getExpiresIn() ?? '', 'utf-8')>0 && $this->isAccessTokenExpired($oauthToken->getExpiresIn()))
        {
            SDKLogger::info(Constants::REFRESH_TOKEN_MESSAGE);
            $oauthToken->refreshAccessToken($oauthToken, $url);
            $save = true;
        }
        elseif ($oauthToken->getExpiresIn() == null && $oauthToken->getAccessToken() != null && $oauthToken->getId() == null)
        {
            $save = true;
        }
        if($save)
        {
            try
            {
                if($oauthToken->getUserSignature() == null && $oauthToken->findUser)
                {
                    try
                    {
                        $utility = new Utility();
                        $userName = $utility->getUserName($oauthToken->accessToken);
                        if($userName != null)
                        {
                            $oauthToken->setUserSignature(new UserSignature($userName));
                        }
                    }
                    catch (SDKException $e)
                    {
                        SDKLogger::severeError(Constants::API_EXCEPTION, $e);
                    }
                }
                $store->saveToken($oauthToken);
            }
            catch (Exception $ex)
            {
                throw new SDKException(Constants::SAVE_TOKEN_ERROR, $ex);
            }
        }
        return $oauthToken->getAccessToken();
    }
    public function checkTokenDetails()
    {
        if ($this->getGrantToken() == null && $this->getRefreshToken() == null)
        {
            throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::GET_TOKEN_BY_USER_NAME_ERROR . " - " . (join(", ", Constants::OAUTH_MANDATORY_KEYS2)));
        }
        return true;
    }
    public function mergeObjects($first, $second)
    {
        $reflection_class = new ReflectionClass(get_class($first));
        foreach ($reflection_class->getProperties() as $field) 
        {
            if (in_array($field->getName(), Constants::OAUTH_TOKEN_FIELDS))
            {
                $field->setAccessible(true);
                $value1= $field->getValue($first);
                $value2 = $field->getValue($second);
                $value = ($value1 != null ) ? $value1 : $value2;
                $field->setValue($first, $value);
            }
        }
    }
    public function authenticate(APIHTTPConnector $urlConnection)
    {
        if(!array_key_exists(Constants::AUTHORIZATION, $urlConnection->getHeaders()))
        {
            $urlConnection->addHeader(Constants::AUTHORIZATION, Constants::OAUTH_HEADER_PREFIX . $this->getToken());
        }
    }

    public function getResponseFromServer($request_params, $url)
    {
        $curl_pointer = curl_init();
        curl_setopt($curl_pointer, CURLOPT_URL, $url);
        curl_setopt($curl_pointer, CURLOPT_HEADER, 1);
        curl_setopt($curl_pointer, CURLOPT_POSTFIELDS, $this->getUrlParamsAsString($request_params));
        curl_setopt($curl_pointer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_pointer, CURLOPT_USERAGENT, Constants::USER_AGENT);
        curl_setopt($curl_pointer, CURLOPT_POST, count($request_params));
        curl_setopt($curl_pointer, CURLOPT_CUSTOMREQUEST, Constants::REQUEST_METHOD_POST);
        if(!Initializer::getInitializer()->getSDKConfig()->isSSLVerificationEnabled())
        {
            curl_setopt($curl_pointer, CURLOPT_SSL_VERIFYPEER, false);
        }
        $result = curl_exec($curl_pointer);
        curl_close($curl_pointer);
        return $result;
    }

    public function refreshAccessToken($oauthToken, $url)
    {
        $requestParams = array();
        $requestParams[Constants::CLIENT_ID] =  $oauthToken->getClientId();
        $requestParams[Constants::CLIENT_SECRET] =  $oauthToken->getClientSecret();
        $requestParams[Constants::GRANT_TYPE] = Constants::REFRESH_TOKEN;
        $requestParams[Constants::REFRESH_TOKEN] =  $oauthToken->getRefreshToken();
        $response = $this->getResponseFromServer($requestParams, $url);
        try
        {
            $this->processResponse($oauthToken, $response);
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {
            throw new SDKException(null, Constants::REFRESH_TOKEN_ERROR, null, $ex);
        }
        return $oauthToken;
    }

    public function generateAccessToken($oauthToken, $url)
    {
        $requestParams = array();
        $requestParams[Constants::CLIENT_ID] =  $oauthToken->getClientId();
        $requestParams[Constants::CLIENT_SECRET] =  $oauthToken->getClientSecret();
        if($oauthToken->getRedirectURL() != null)
        {
            $requestParams[Constants::REDIRECT_URI] =  $oauthToken->getRedirectURL();
        }
        $requestParams[Constants::GRANT_TYPE] = Constants::GRANT_TYPE_AUTH_CODE;
        $requestParams[Constants::CODE] = $oauthToken->getGrantToken();
        $response = $this->getResponseFromServer($requestParams, $url);
        try
        {
            $this->processResponse($oauthToken, $response);
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {
            throw new SDKException(null, Constants::ACCESS_TOKEN_ERROR, null, $ex);
        }
        return $oauthToken;
    }

    public function processResponse($oauthToken, $response)
    {
        $initializer = Initializer::getInitializer();
        $sdkConfig = $initializer->getSDKConfig();
        $headerRows = explode("\n",$response);
        $responseBody = end($headerRows);
        $jsonResponse = json_decode($responseBody, true);
        if (!array_key_exists(Constants::ACCESS_TOKEN, $jsonResponse))
        {
            throw new SDKException(Constants::INVALID_TOKEN_ERROR, array_key_exists(Constants::ERROR, $jsonResponse) ? $jsonResponse[Constants::ERROR] : Constants::NO_ACCESS_TOKEN_ERROR);
        }
        $oauthToken->setAccessToken($jsonResponse[Constants::ACCESS_TOKEN]);
        $oauthToken->setExpiresIn($this->getTokenExpiresIn($jsonResponse));
        if (array_key_exists(Constants::REFRESH_TOKEN, $jsonResponse))
        {
            $oauthToken->setRefreshToken($jsonResponse[Constants::REFRESH_TOKEN]);
        }
        if($sdkConfig->applyAPIDomainUpdate() && array_key_exists(Constants::API_DOMAIN, $jsonResponse))
        {
            $oauthToken->setAPIDomain($jsonResponse[Constants::API_DOMAIN]);
        }
        return $oauthToken;
    }

    private function getTokenExpiresIn($response)
    {
        $expireIn = $response[Constants::EXPIRES_IN];
        if(!array_key_exists(Constants::EXPIRES_IN_SEC, $response))
        {
            $expireIn= $expireIn * 1000;
        }
        return $this->getCurrentTimeInMillis() + $expireIn;
    }

    public function getCurrentTimeInMillis()
    {
        return round(microtime(true) * 1000);
    }

    public function isAccessTokenExpired($expiry_time)
    {
        return ((((double)$expiry_time) - $this->getCurrentTimeInMillis()) < 5000);
    }

    public function getUrlParamsAsString($urlParams)
    {
        $paramsAsString = "";
        foreach ($urlParams as $key => $value)
        {
            $paramsAsString = $paramsAsString . $key . "=" . $value . "&";
        }
        $paramsAsString = rtrim($paramsAsString, "&");
        return str_replace(PHP_EOL, '', $paramsAsString);
    }

    public function remove()
    {
        try
        {
            Initializer::getInitializer()->getStore()->deleteToken($this->id);

            return true;
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {
            throw new SDKException(null, null, null, $ex);
        }
    }

    /**
     * Creates an OAuthToken class instance with the specified parameters.
     * @param string $clientID A string containing the OAuth client id.
     * @param string $clientSecret A string containing the OAuth client secret.
     * @param string $grantToken A string containing the GRANT token.
     * @param string $refreshToken A string containing the Refresh token.
     * @param string $redirectURL A string containing the OAuth redirect URL.
     * @param string $id A string
     */
    public function __construct($clientID, $clientSecret, $grantToken, $refreshToken, $redirectURL=null, $id=null, $accessToken=null, $userSignature=null, $findUser=true)
    {
        $this->clientID = $clientID;
        $this->clientSecret = $clientSecret;
        $this->grantToken = $grantToken;
        $this->refreshToken = $refreshToken;
        $this->redirectURL = $redirectURL;
        $this->accessToken = $accessToken;
        $this->id = $id;
        $this->userSignature = $userSignature;
        $this->findUser = $findUser;
    }

    public function revokeRefreshToken(String $refreshToken, String $url)
    {
        $requestParams = array(Constants::TOKEN => $refreshToken);
        $response = "";
        try
        {
            $response = $this->getResponseFromServer($requestParams, $url);
            $headerRows = explode("\n",$response);
            $responseBody = end($headerRows);
            $responseJSON = json_decode($responseBody, true);
            if ($responseJSON != null && array_key_exists(Constants::STATUS, $responseJSON) && $responseJSON[Constants::STATUS] == Constants::STATUS_SUCCESS)
            {
                return true;
            }
            return false;
        }
        catch (\JsonException $e)
        {
            throw new SDKException(Constants::PARSE_RESPONSE . " : " . $response, $e);
        }
        catch (SDKException $ex)
        {
            throw $ex;
        }
        catch (Exception $ex)
        {
            throw new SDKException(Constants::REVOKE_TOKEN_ERROR, $ex);
        }
    }

    public function revoke($id)
    {
        try
        {
            if (Initializer::getInitializer() == null)
            {
                throw new SDKException(Constants::SDK_UNINITIALIZATION_ERROR, Constants::SDK_UNINITIALIZATION_MESSAGE);
            }
            $initializer = Initializer::getInitializer();
            $store  = $initializer->getStore();
            $url = $initializer->getEnvironment()->getAccountsUrl();
            $isRevoke = false;
            $class = new \ReflectionClass(OAuthToken::class);
            $oauthToken = $class->newInstanceWithoutConstructor();
            $oauthToken->setId($id);
            $store->findToken($oauthToken);
            if ($oauthToken != null && $oauthToken->getRefreshToken() != null)
            {
                $isRevoke = $this->revokeRefreshToken($oauthToken->getRefreshToken(), $url . Constants::REVOKE_URL);
                SDKLogger::info(Constants::ID . ":" . $id . Constants::REFRESH_TOKEN_REMOVED);
            }
            else{
                SDKLogger::warn(Constants::ID . ":" . $id . Constants::TOKEN_NOT_FOUND);
            }
            return $isRevoke;
        }
        catch (SDKException $ex)
        {
            throw  $ex;
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
}
?>