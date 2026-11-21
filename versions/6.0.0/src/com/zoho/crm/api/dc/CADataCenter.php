<?php
namespace com\zoho\crm\api\dc;

use com\zoho\crm\api\dc\DataCenter;

/**
 * This class represents the properties of Zoho CRM in CA Domain.
 */
class CADataCenter extends DataCenter
{
    private static $PRODUCTION = null;
    private static $SANDBOX = null;
    private static $DEVELOPER = null;
    private static $CA = null;

    /**
     * This Environment class instance represents the Zoho CRM Production Environment in CA Domain.
     * @return Environment A Environment class instance.
     */
    public static function PRODUCTION()
    {
        self::$CA = new CADataCenter();
        if (self::$PRODUCTION == null)
        {
            self::$PRODUCTION = DataCenter::setEnvironment("https://www.zohoapis.ca", self::$CA->getIAMUrl(), self::$CA->getFileUploadUrl());
        }
        return self::$PRODUCTION;
    }

    /**
     * This Environment class instance represents the Zoho CRM Sandbox Environment in CA Domain.
     * @return Environment A Environment class instance.
     */
    public static function SANDBOX()
    {
        self::$CA = new CADataCenter();
        if (self::$SANDBOX == null)
        {
            self::$SANDBOX = DataCenter::setEnvironment("https://sandbox.zohoapis.ca", self::$CA->getIAMUrl(), self::$CA->getFileUploadUrl());
        }
        return self::$SANDBOX;
    }

    /**
     * This Environment class instance represents the Zoho CRM Developer Environment in CA Domain.
     * @return Environment A Environment class instance.
     */
    public static function DEVELOPER()
    {
        self::$CA = new CADataCenter();
        if (self::$DEVELOPER == null)
        {
            self::$DEVELOPER = DataCenter::setEnvironment("https://developer.zohoapis.ca", self::$CA->getIAMUrl(), self::$CA->getFileUploadUrl());
        }
        return self::$DEVELOPER;
    }

    public function getIAMUrl()
    {
        return "https://accounts.zohocloud.ca/oauth/v2/token";
    }

    public function getFileUploadUrl()
    {
        return "https://upload.zohocloud.ca";
    }
}