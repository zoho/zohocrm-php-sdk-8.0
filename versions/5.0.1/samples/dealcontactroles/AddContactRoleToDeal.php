<?php
namespace samples\dealcontactroles;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dealcontactroles\DealContactRolesOperations;
use com\zoho\crm\api\dealcontactroles\BodyWrapper;
use com\zoho\crm\api\dealcontactroles\Data;
use com\zoho\crm\api\dealcontactroles\ContactRole;
use com\zoho\crm\api\dealcontactroles\ActionWrapper;
use com\zoho\crm\api\dealcontactroles\SuccessResponse;
use com\zoho\crm\api\dealcontactroles\APIException;

require_once "vendor/autoload.php";

class AddContactRoleToDeal
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

    public static function addContactRoleToDeal(string $contactId, string $dealId)
    {
        
        $dealContactRolesOperations = new DealContactRolesOperations();
        
        $bodyWrapper = new BodyWrapper();
		$data1 = new Data();
		$contactRole = new ContactRole();
		// $contactRole->setName("contactRole1");
        $contactRole->setId("1055806000008137061");
		$data1->setContactRole($contactRole);
        $bodyWrapper->setData([$data1]);
        
        $response = $dealContactRolesOperations->associateContactRoleToDeal($contactId, $dealId, $bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getData();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Message: " . $successResponse->getMessage() . "\n");
                        
                        if ($successResponse->getDetails() != null) {
                            echo("Details: ");
                            foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                                echo($keyName . " : ");
                                print_r($keyValue);
                                echo("\n");
                            }
                        }
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Message: " . $exception->getMessage() . "\n");
                        
                        if ($exception->getDetails() != null) {
                            echo("Details: ");
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo($keyName . " : "); print_r($keyValue);
                                echo("\n");
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
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
            }
        }
    }
}

AddContactRoleToDeal::initialize();
$contactId = "1055806000022418044";
$dealId = "1055806000022418049";
AddContactRoleToDeal::addContactRoleToDeal($contactId, $dealId);
?>
