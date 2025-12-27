<?php
namespace samples\contactroles;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\contactroles\ContactRolesOperations;
use com\zoho\crm\api\contactroles\BodyWrapper;
use com\zoho\crm\api\contactroles\ContactRole;
use com\zoho\crm\api\contactroles\ActionWrapper;
use com\zoho\crm\api\contactroles\SuccessResponse;
use com\zoho\crm\api\contactroles\APIException;

require_once "vendor/autoload.php";

class CreateContactRoles
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

    public static function createContactRoles()
    {
        $contactRolesOperations = new ContactRolesOperations();
        
        $bodyWrapper = new BodyWrapper();
        $contactRoles = array();
        
        for ($i = 1; $i <= 5; $i++) {
            $contactRole = new ContactRole();
            $contactRole->setName("Contact Role Name" . strval($i));
            $contactRole->setSequenceNumber($i);
            array_push($contactRoles, $contactRole);
        }
        
        $bodyWrapper->setContactRoles($contactRoles);
        
        $response = $contactRolesOperations->createRoles($bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getContactRoles();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                        
                        echo("Details: ");
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo($key . " : ");
                            print_r($value);
                            echo("\n");
                        }
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Message: " . $exception->getMessage()->getValue() . "\n");
                        
                        if ($exception->getDetails() != null) {
                            echo("Details: ");
                            foreach ($exception->getDetails() as $key => $value) {
                                echo($key . " : " . $value . "\n");
                            }
                        }
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: ");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . " : " . $value . "\n");
                    }
                }
            }
        }
    }
}

CreateContactRoles::initialize();
CreateContactRoles::createContactRoles();
?>
