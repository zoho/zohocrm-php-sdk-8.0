<?php
namespace samples\dealcontactroles;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dealcontactroles\DealContactRolesOperations;
use com\zoho\crm\api\dealcontactroles\ResponseWrapper;
use com\zoho\crm\api\dealcontactroles\APIException;

require_once "vendor/autoload.php";

class GetContactRoleOfDeal
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

    public static function getContactRoleOfDeal(string $contactId, string $dealId)
    {
        $dealContactRolesOperations = new DealContactRolesOperations();
        
        $response = $dealContactRolesOperations->getAssociatedContactRolesSpecificToContact($contactId, $dealId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if ($response->isExpected()) {
                $responseHandler = $response->getObject();
                
                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $records = $responseWrapper->getData();
                    
                    foreach ($records as $record) {
                        echo("Record ID: " . $record->getId() . "\n");
                        
                        $createdBy = $record->getCreatedBy();
                        if ($createdBy != null) {
                            echo("Record Created By User-ID: " . $createdBy->getId() . "\n");
                            echo("Record Created By User-Name: " . $createdBy->getName() . "\n");
                            echo("Record Created By User-Email: " . $createdBy->getEmail() . "\n");
                        }
                        
                        echo("Record CreatedTime: ");
                        print_r($record->getCreatedTime());
                        echo("\n");
                        
                        $modifiedBy = $record->getModifiedBy();
                        if ($modifiedBy != null) {
                            echo("Record Modified By User-ID: " . $modifiedBy->getId() . "\n");
                            echo("Record Modified By User-Name: " . $modifiedBy->getName() . "\n");
                            echo("Record Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                        }
                        
                        echo("Record ModifiedTime: ");
                        print_r($record->getModifiedTime());
                        echo("\n");
                        
                        echo("Record Field Value: " . $record->getKeyValue("Last_Name") . "\n");
                        
                        echo("Record KeyValues: \n");
                        foreach ($record->getKeyValues() as $keyName => $value) {
                            if ($value != null) {
                                echo($keyName . " : ");
                                print_r($value);
                                echo("\n");
                            }
                        }
                    }
                    
                    $info = $responseWrapper->getInfo();
                    if ($info != null) {
                        if ($info->getCount() != null) {
                            echo("Record Info Count: " . $info->getCount() . "\n");
                        }
                        if ($info->getMoreRecords() != null) {
                            echo("Record Info MoreRecords: " . $info->getMoreRecords() . "\n");
                        }
                    }
                } else if ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
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
            } else {
                print_r($response);
            }
        }
    }
}

GetContactRoleOfDeal::initialize();
$contactId = "1055806000022418044";
$dealId = "1055806000022418049";
GetContactRoleOfDeal::getContactRoleOfDeal($contactId, $dealId);
?>
