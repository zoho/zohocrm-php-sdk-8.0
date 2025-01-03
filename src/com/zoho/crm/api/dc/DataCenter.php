<?php
namespace com\zoho\crm\api\dc;

use com\zoho\crm\api\util\Constants;

/**
 * The abstract class represents the properties of Zoho CRM DataCenter.
 */
abstract class DataCenter
{
    /**
     *  This method to get accounts URL. URL to be used when calling an OAuth accounts.
     * @return string A string representing the accounts URL.
     */
    public abstract function getIAMUrl();

    /**
     * This method to get File Upload URL.
     * @return string A string representing the File Upload URL.
     */
    public abstract function getFileUploadUrl();

    public static function setEnvironment($url, $accountUrl, $fileUploadUrl)
    {
        return new Environment($url, $accountUrl, $fileUploadUrl);
    }

    public static function get($config)
	{
		if(in_array($config, Constants::US_DATACENTER))
		{
            if(strpos($config, Constants::SANDBOX) !== false)
			{
				return USDataCenter::SANDBOX();
			}
            else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return USDataCenter::DEVELOPER();
			}
			return USDataCenter::PRODUCTION();
		}
		else if(in_array($config, Constants::JP_DATACENTER))
		{
			if(strpos($config, Constants::SANDBOX) !== false)
			{
				return JPDataCenter::SANDBOX();
			}
			else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return JPDataCenter::DEVELOPER();
			}
			return JPDataCenter::PRODUCTION();
		}
		else if(in_array($config, Constants::IN_DATACENTER))
		{
			if(strpos($config, Constants::SANDBOX) !== false)
			{
				return INDataCenter::SANDBOX();
			}
			else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return INDataCenter::DEVELOPER();
			}
			return INDataCenter::PRODUCTION();
		}
        else if(in_array($config, Constants::EU_DATACENTER))
		{
			if(strpos($config, Constants::SANDBOX) !== false)
			{
				return EUDataCenter::SANDBOX();
			}
			else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return EUDataCenter::DEVELOPER();
			}
			return EUDataCenter::PRODUCTION();
		}
        else if(in_array($config, Constants::CN_DATACENTER))
		{
			if(strpos($config, Constants::SANDBOX) !== false)
			{
				return CNDataCenter::SANDBOX();
			}
			else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return CNDataCenter::DEVELOPER();
			}
			return CNDataCenter::PRODUCTION();
		}
        else if(in_array($config, Constants::AU_DATACENTER))
		{
			if(strpos($config, Constants::SANDBOX) !== false)
			{
				return AUDataCenter::SANDBOX();
			}
			else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return AUDataCenter::DEVELOPER();
			}
			return AUDataCenter::PRODUCTION();
		}
		else if(in_array($config, Constants::CA_DATACENTER))
		{
			if(strpos($config, Constants::SANDBOX) !== false)
			{
				return CADataCenter::SANDBOX();
			}
			else if(strpos($config, Constants::DEVELOPER) !== false)
			{
				return CADataCenter::DEVELOPER();
			}
			return CADataCenter::PRODUCTION();
		}
		return null;
	}
}

/**
 * The abstract class represents the properties of Zoho CRM Environment.
 */
class Environment
{
    public $url = null;
    public $accountUrl = null;
    public $fileUploadUrl = null;

    public function __construct($url, $accountUrl, $fileUploadUrl)
    {
        $this->url = $url;
        $this->accountUrl = $accountUrl;
        $this->fileUploadUrl = $fileUploadUrl;
    }

    /**
     * This method to get Zoho CRM API URL.
     * @return string A string representing the Zoho CRM API URL.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * This method to get Zoho CRM Accounts URL.
     * @return string A string representing the accounts URL.
     */
    public function getAccountsUrl()
    {
        return $this->accountUrl;
    }

    /**
     * This method to get File Upload URL.
     * @return string A string representing the File Upload URL.
     */
    public function getFileUploadUrl()
    {
        return $this->fileUploadUrl;
    }
}