<?php
namespace com\zoho\crm\api;

/*
Copyright (c) 2021, ZOHO CORPORATION PRIVATE LIMITED 
All rights reserved. 
 
   Licensed under the Apache License, Version 2.0 (the "License"); 
   you may not use this file except in compliance with the License. 
   You may obtain a copy of the License at 
 
       http://www.apache.org/licenses/LICENSE-2.0 
 
   Unless required by applicable law or agreed to in writing, software 
   distributed under the License is distributed on an "AS IS" BASIS, 
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. 
   See the License for the specific language governing permissions and 
   limitations under the License. 
*/

use com\zoho\api\authenticator\OAuthToken;
use com\zoho\api\logger\Logger;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\sdkconfigbuilder\SDKConfig;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\dc\Environment;
use com\zoho\api\authenticator\Token;
use com\zoho\api\authenticator\store\TokenStore;
use com\zoho\api\logger\SDKLogger;


/**
 * This class to initialize Zoho CRM SDK.
 */
class Initializer
{
    public static $LOCAL = array();
    private static $initializer;
    private $environment = null;
    private $store = null;
    private $token = null;
    public static $jsonDetails = null;
    private $resourcePath = null;
    private $requestProxy = null;
    private $sdkConfig = null;

    /**
     * This to initialize the SDK.
     *
     * @param Environment $environment A Environment class instance containing the CRM API base URL and Accounts URL.
     * @param Token $token A Token class instance containing the OAuth client application information.
     * @param TokenStore $store A TokenStore class instance containing the token store information.
     * @param SDKConfig $ A SDKConfig class instance containing the SDK configuration.
     * @param string $resourcePath A String containing the absolute directory path to store user specific JSON files containing module fields information.
     * @param Logger $logger A Logger class instance containing the log file path and Logger type.
     * @param RequestProxy $proxy A RequestProxy class instance containing the proxy properties of the user.
     */
    public static function initialize($environment, $token, $store, $sdkConfig, $resourcePath, $logger=null, $proxy=null)
    {
        try
        {
            SDKLogger::initialize($logger);
            try
            {
                if(is_null(self::$jsonDetails))
                {
                    self::$jsonDetails = json_decode(file_get_contents(__DIR__ . '/../../../../'. Constants::JSON_DETAILS_FILE_PATH), true);
                }
            }
            catch (\Exception $ex)
            {
                throw new SDKException(Constants::JSON_DETAILS_ERROR, null, null, $ex);
            }
            self::$initializer = new Initializer();
            $initializer = new Initializer();
            $initializer->environment = $environment;
            $initializer->store = $store;
            $initializer->sdkConfig = $sdkConfig;
            $initializer->resourcePath = $resourcePath;
            $initializer->requestProxy = $proxy;
            $initializer->token = $token;
            self::$initializer = $initializer;
            if ($token != null)
            {
                $token->generateToken();
            }
            $initializer->token = $token;
            self::$initializer = $initializer;
            self::$LOCAL[$initializer->getEncodedKey()] = $initializer;
            SDKLogger::info(Constants::INITIALIZATION_SUCCESSFUL . $initializer->toString());
        }
        catch(SDKException $e)
        {
            throw $e;
        }
        catch (\Exception $e)
        {
            throw new SDKException(Constants::INITIALIZATION_EXCEPTION, null, null, $e);
        }
    }

    public static function getJSON($filePath)
    {
        return json_decode(file_get_contents($filePath), TRUE);
    }

    /**
     * This method to get Initializer class instance.
     *
     * @return Initializer A Initializer class instance representing the SDK configuration details.
     */
    public static function getInitializer()
    {
        if (!empty(self::$LOCAL) && count(self::$LOCAL) != 0)
        {
            $initializer = new Initializer();
            $key = $initializer->getEncodedKey();
            if(array_key_exists($key, self::$LOCAL))
            {
                return self::$LOCAL[$key];
            }
        }
        return self::$initializer;
    }

    /**
     * This method to switch the different user in SDK environment.
     * @param Environment $environment A Environment class instance containing the CRM API base URL and Accounts URL.
     * @param Token $token A Token class instance containing the OAuth client application information.
     * @param SDKConfig $sdkConfig A SDKConfig class instance containing the SDK configuration.
     */
    public static function switchUser($environment, $token, $sdkConfig, $proxy=null)
    {
        $initializer = new Initializer();
        $initializer->environment = $environment;
        $initializer->store = self::$initializer->store;
        $initializer->sdkConfig = $sdkConfig;
        $initializer->resourcePath = self::$initializer->resourcePath;
        $initializer->requestProxy = $proxy;
        $initializer->token = $token;
        if ($token != null)
        {
            $token->generateToken();
        }
        $initializer->token = $token;
        self::$LOCAL[$initializer->getEncodedKey()] = $initializer;
        self::$initializer = $initializer;
        SDKLogger::info(Constants::INITIALIZATION_SWITCHED . $initializer->toString());
    }

    /**
     * This is a getter method to get API environment.
     *
     * @return Environment A Environment representing the API environment.
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * This is a getter method to get API environment.
     *
     * @return TokenStore A TokenStore class instance containing the token store information.
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * This is a getter method to get RequestProxy.
     *
     * @return RequestProxy A RequestProxy class instance representing the proxy.
     */
    public function getRequestProxy()
    {
        return $this->requestProxy;
    }


    /**
     * This is a getter method to get OAuth client application information.
     *
     * @return Token A Token class instance representing the OAuth client application information.
     */
    public function getToken()
    {
        return $this->token;
    }

    public function getResourcePath()
    {
        return $this->resourcePath;
    }

    /**
     * This is a getter method to get SDK configuration.
     * @return SDKConfig A SDKConfig instance representing the configuration
     */
    public function getSDKConfig()
    {
        return $this->sdkConfig;
    }

    public static function removeUserConfiguration($token)
    {
        $initializer = new Initializer();
        if ($token instanceof OAuthToken)
        {
            if ($token->getId() == self::$initializer->getToken()->getId())
            {
                $key = $initializer->getEncodedKey();
                if(array_key_exists($key, self::$LOCAL))
                {
                    unset(self::$LOCAL[$initializer->getEncodedKey()]);
                }
                else
                {
                    $exception = new SDKException(null, Constants::USER_NOT_FOUND_ERROR_MESSAGE);
                    SDKLogger::info(Constants::USER_NOT_FOUND_ERROR . $exception);
                    throw $exception;
                }
            }
        }
    }
    public static function getEncodedKey()
    {
        $initializer = new Initializer();
        $token = $initializer->getToken();
        $key = null;
        if ($token instanceof OAuthToken)
        {
            $oauthToken = $token;
            if($oauthToken->getUserSignature() != null)
			{
				$key = $oauthToken->getUserSignature()->getName();
			}
            else
            {
                $refreshToken = $oauthToken->getRefreshToken();
                if ($refreshToken != null && mb_strlen($refreshToken, 'utf-8') > 0)
                {
                    $key = substr($refreshToken, 0, mb_strlen($refreshToken, 'utf-8') - 32);
                }
                else
                {
                    $accessToken = $oauthToken->getAccessToken();
                    if ($accessToken != null && mb_strlen($accessToken, 'utf-8') > 0)
                    {
                        $key = substr($accessToken, 0, mb_strlen($accessToken, 'utf-8') - 32);
                    }
                }
            }
        }
        $tokenKey = self::$initializer->getEnvironment()->getUrl();
        if ($key != null && mb_strlen($key, 'utf-8') > 0)
        {
            $tokenKey = $tokenKey . $key;
        }
        $input = unpack('C*', mb_convert_encoding($tokenKey, "UTF-8"));
        return base64_encode(implode(array_map("chr", $input)));
    }

    public function toString()
	{
		return Constants::IN_ENVIRONMENT . self::$initializer->getEnvironment()->getUrl() . ".";
	}
}
?>