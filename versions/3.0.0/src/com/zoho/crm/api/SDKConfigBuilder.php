<?php
namespace com\zoho\crm\api;

/**
 * The Builder class to build SDKConfig
 */
class SDKConfigBuilder
{
    private $autoRefreshFields;
    private $pickListValidation;
    private $enableSSLVerification;
    private $connectionTimeout;
    private $timeout;
    private $updateAPIDomain;

    public function __Construct()
    {
        $this->autoRefreshFields = false;
        $this->pickListValidation = true;
        $this->enableSSLVerification = true;
        $this->connectionTimeout = 0;
        $this->timeout = 0;
        $this->updateAPIDomain = true;
    }

    /**
     * This is a setter method to set autoRefreshFields.
     * @param bool $autoRefreshFields
     */
    public function autoRefreshFields(bool $autoRefreshFields)
    {
        $this->autoRefreshFields = $autoRefreshFields;
        return $this;
    }

    /**
     * This is a setter method to set pickListValidation.
     * @param bool $pickListValidation
     */
    public function pickListValidation(bool $pickListValidation)
    {
        $this->pickListValidation = $pickListValidation;
        return $this;
    }

    /**
     * This is a setter method to set enableSSLVerification.
     * @param bool $enableSSLVerification
     */
    public function sslVerification(bool $enableSSLVerification)
    {
        $this->enableSSLVerification = $enableSSLVerification;
        return $this;
    }

    /**
     * This is a setter method to set connectionTimeout.
     * @param int $connectionTimeout A int number of seconds to wait while trying to connect.
     */
    public function connectionTimeout(int $connectionTimeout)
    {
        $this->connectionTimeout = $connectionTimeout > 0 ? $connectionTimeout : 0;
        return $this;
    }

    /**
     * This is a setter method to set timeout.
     * @param int $timeout A int maximum number of seconds to allow cURL functions to execute.
     */
    public function timeout(int $timeout)
    {
        $this->timeout = $timeout > 0 ? $timeout : 0;
        return $this;
    }

    // CURLOPT_CONNECTTIMEOUT is a segment of the time represented by CURLOPT_TIMEOUT, so the value of the CURLOPT_TIMEOUT should be greater than the value of the CURLOPT_CONNECTTIMEOUT.

    public function updateAPIDomain(bool $updateAPIDomain)
    {
        $this->updateAPIDomain = $updateAPIDomain;
        return $this;
    }

    /**
     * The method to build the SDKConfig instance
     * @returns An instance of SDKConfig
     */
    public function build()
    {
        return new \com\zoho\crm\api\sdkconfigbuilder\SDKConfig($this->autoRefreshFields, $this->pickListValidation, $this->enableSSLVerification, $this->connectionTimeout, $this->timeout, $this->updateAPIDomain);
    }
}

namespace com\zoho\crm\api\sdkconfigbuilder;

/**
 * The class to configure the SDK.
 */
class SDKConfig
{
    private $autoRefreshFields;
    private $pickListValidation;
    private $enableSSLVerification;
    private $connectionTimeout;
    private $timeout;
    private $updateAPIDomain;

    /**
     * Creates an instance of SDKConfig with the given parameters
     * @param bool $autoRefreshFields - A boolean representing autoRefreshFields
     * @param bool $pickListValidation - A boolean representing pickListValidation
     * @param bool $enableSSLVerification - A boolean representing enableSSLVerification
     * @param int $connectionTimeout - 
     * @param int $timeout - A boolean representing enableSSLVerification
     */
    public function __Construct(bool $autoRefreshFields, bool $pickListValidation, bool $enableSSLVerification, int $connectionTimeout, int $timeout, bool $updateAPIDomain)
    {
        $this->autoRefreshFields = $autoRefreshFields;
        $this->pickListValidation = $pickListValidation;
        $this->enableSSLVerification = $enableSSLVerification;
        $this->connectionTimeout = $connectionTimeout;
        $this->timeout = $timeout;
        $this->updateAPIDomain = $updateAPIDomain;
    }

    /**
     * This is a getter method to get autoRefreshFields.
     * @return bool A boolean representing autoRefreshFields
     */
    public function getAutoRefreshFields()
    {
        return $this->autoRefreshFields;
    }

    /**
     * This is a getter method to get pickListValidation.
     * @return bool A boolean representing pickListValidation
     */
    public function getPickListValidation()
    {
        return $this->pickListValidation;
    }

    /**
     * This is a getter method to get enableSSLVerification.
     * @return bool A boolean representing enableSSLVerification
     */
    public function isSSLVerificationEnabled()
    {
        return $this->enableSSLVerification;
    }

    /**
	 * This is a getter method to get connectionTimeout.
	 * @return int A int representing connectionTimeout
	 */
	public function connectionTimeout()
	{
		return $this->connectionTimeout;
	}

	/**
	 * This is a getter method to get cURL Timeout.
	 * @return int A int representing cURL Timeout
	 */
	public function timeout()
	{
		return $this->timeout;
	}

    public function applyAPIDomainUpdate()
	{
		return $this->updateAPIDomain;
	}
}
?>