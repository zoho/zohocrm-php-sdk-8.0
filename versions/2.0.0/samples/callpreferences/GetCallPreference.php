<?php
namespace samples\callpreferences;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\callpreferences\APIException;
use com\zoho\crm\api\callpreferences\CallPreferencesOperations;
use com\zoho\crm\api\callpreferences\ResponseWrapper;

require_once "vendor/autoload.php";

class GetCallPreference
{
    public static function initialize()
    {
        $environment = USDataCenter::PRODUCTION();
        $token = (new OAuthBuilder())
            ->clientId("client_id")
            ->clientSecret("client_secret")
            ->refreshToken("refresh_token")
            ->build();
        (new InitializeBuilder())
            ->environment($environment)
            ->token($token)
            ->initialize();
    }

    public static function getCallPreference()
    {
        $callPreferencesOperations = new CallPreferencesOperations();
        $response = $callPreferencesOperations->getCallPreference();
        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if ($response->getStatusCode() == 204) {
                echo "No Content\n";
                return;
            }
            if ($response->isExpected()) {
                $responseHandler = $response->getObject();
                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $callPreferences = $responseWrapper->getCallPreferences();
                    echo "CallPreferences ShowFromNumber: " . $callPreferences->getShowFromNumber() . "\n";
                    echo "CallPreferences ShowToNumber: " . $callPreferences->getShowToNumber() . "\n";
                } else if ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . "\n";
                    echo "Code: " . $exception->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . "\n";
                    }
                    echo "Message: " . $exception->getMessage() . "\n";
                }
            }
        }
    }
}
GetCallPreference::initialize();
GetCallPreference::getCallPreference();
