<?php
namespace samples\contactroles;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\contactroles\ContactRolesOperations;
use com\zoho\crm\api\contactroles\BodyWrapper;
use com\zoho\crm\api\contactroles\ContactRole;
use com\zoho\crm\api\contactroles\ActionWrapper;
use com\zoho\crm\api\contactroles\SuccessResponse;
use com\zoho\crm\api\contactroles\APIException;

require_once "vendor/autoload.php";

class UpdateContactRole
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

    public static function updateContactRole(string $contactRoleId)
    {
        $contactRolesOperations = new ContactRolesOperations();
        
        $bodyWrapper = new BodyWrapper();
        $contactRolesList = array();
        
        $cr1 = new ContactRole();
        $cr1->setName("Update Contact Role4");
        $cr1->setSequenceNumber(2);
        array_push($contactRolesList, $cr1);
        
        $bodyWrapper->setContactRoles($contactRolesList);
        
        $response = $contactRolesOperations->updateContactRole($contactRoleId, $bodyWrapper);
        
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

UpdateContactRole::initialize();
$contactRoleId = "1055806000016499002";
UpdateContactRole::updateContactRole($contactRoleId);
?>
