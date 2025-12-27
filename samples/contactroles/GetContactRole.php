<?php
namespace samples\contactroles;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\contactroles\ContactRolesOperations;
use com\zoho\crm\api\contactroles\ResponseWrapper;
use com\zoho\crm\api\contactroles\APIException;

require_once "vendor/autoload.php";

class GetContactRole
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

    public static function getContactRole(string $contactRoleId)
    {
        $contactRolesOperations = new ContactRolesOperations();
        
        $response = $contactRolesOperations->getRole($contactRoleId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $contactRoles = $responseWrapper->getContactRoles();
                
                foreach ($contactRoles as $contactRole) {
                    echo("ContactRole ID: " . $contactRole->getId() . "\n");
                    echo("ContactRole Name: " . $contactRole->getName() . "\n");
                    echo("ContactRole SequenceNumber: " . $contactRole->getSequenceNumber() . "\n");
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
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

GetContactRole::initialize();
$contactRoleId = "1055806000016499002";
GetContactRole::getContactRole($contactRoleId);
?>
