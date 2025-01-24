<?php
namespace com\zoho\crm\api\dc;

use com\zoho\crm\api\dc\DataCenter;

/**
 * This class represents the properties of Zoho CRM in SA Domain.
 */
class SADataCenter extends DataCenter
{
    private static $PRODUCTION = null;
    private static $SANDBOX = null;
    private static $DEVELOPER = null;
    private static $SA = null;

    /**
     * This Environment class instance represents the Zoho CRM Production Environment in SA Domain.
     * @return Environment A Environment class instance.
     */
    public static function PRODUCTION()
    {
        self::$SA = new SADataCenter();
        if (self::$PRODUCTION == null)
        {
            self::$PRODUCTION = DataCenter::setEnvironment("https://www.zohoapis.sa", self::$SA->getIAMUrl(), self::$SA->getFileUploadUrl());
        }
        return self::$PRODUCTION;
    }

    /**
     * This Environment class instance represents the Zoho CRM Sandbox Environment in SA Domain.
     * @return Environment A Environment class instance.
     */
    public static function SANDBOX()
    {
        self::$SA = new SADataCenter();
        if (self::$SANDBOX == null)
        {
            self::$SANDBOX = DataCenter::setEnvironment("https://sandbox.zohoapis.sa", self::$SA->getIAMUrl(), self::$SA->getFileUploadUrl());
        }
        return self::$SANDBOX;
    }

    /**
     * This Environment class instance represents the Zoho CRM Developer Environment in SA Domain.
     * @return Environment A Environment class instance.
     */
    public static function DEVELOPER()
    {
        self::$SA = new SADataCenter();
        if (self::$DEVELOPER == null)
        {
            self::$DEVELOPER = DataCenter::setEnvironment("https://developer.zohoapis.sa", self::$SA->getIAMUrl(), self::$SA->getFileUploadUrl());
        }
        return self::$DEVELOPER;
    }

    public function getIAMUrl()
    {
        return "https://accounts.zoho.sa/oauth/v2/token";
    }

    public function getFileUploadUrl()
    {
        return "https://files.zoho.sa";
    }
}