<?php
namespace samples\fromaddresses;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\fromaddresses\FromAddressesOperations;
use com\zoho\crm\api\fromaddresses\ResponseWrapper;
use com\zoho\crm\api\fromaddresses\APIException;

require_once "vendor/autoload.php";

class GetFromAddresses
{
    public static function initialize()
    {
        $environment = INDataCenter::PRODUCTION();
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

    public static function getFromAddresses()
    {
        $fromAddressesOperations = new FromAddressesOperations("34770610000323001");
        $response = $fromAddressesOperations->getFromAddresses();
        if($response != null)
        {
            echo("Status code " . $response->getStatusCode() . "\n");
            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
                return;
            }
            $responseHandler = $response->getObject();
            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $emails = $responseWrapper->getFromAddresses();
                foreach($emails as $email)
                {
                    echo("UserName: " . $email->getUserName() . "\n");
                    echo("Mail Type: " . $email->getType() . "\n");
                    echo("Mail : " . $email->getEmail() . "\n");
                    echo("Mail ID: " . $email->getId() . "\n");
                    echo("Mail Default: " . $email->getDefault() . "\n");
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: " );
                if($exception->getDetails() != null)
                {
                    foreach($exception->getDetails() as $key => $value)
                    {
                        echo($key . ": " . $value . "\n");
                    }
                }
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetFromAddresses::initialize();
GetFromAddresses::getFromAddresses();
?>
