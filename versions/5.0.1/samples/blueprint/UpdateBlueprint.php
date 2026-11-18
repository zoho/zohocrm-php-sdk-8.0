<?php
namespace samples\blueprint;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\blueprint\BlueprintOperations;
use com\zoho\crm\api\blueprint\BodyWrapper;
use com\zoho\crm\api\blueprint\BluePrint;
use com\zoho\crm\api\blueprint\SuccessResponse;
use com\zoho\crm\api\blueprint\APIException;
use com\zoho\crm\api\record\Record;

require_once "vendor/autoload.php";

class UpdateBlueprint
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

    public static function updateBlueprint(string $moduleAPIName, string $recordId, string $transitionId)
    {
        $blueprintOperations = new BlueprintOperations($recordId, $moduleAPIName);
        
        $bodyWrapper = new BodyWrapper();
        $blueprintList = array();
        
        $blueprint = new BluePrint();
        $blueprint->setTransitionId($transitionId);
        
        $data = new Record();
        $data->addKeyValue("Phone", "8940372937");
        $data->addKeyValue("Notes", "Updated via blueprint");
        
        // Add attachments
        $attachments = array();
        $fileIds = array();
        array_push($fileIds, "blojtd2d13b5f044e4041a3315e0793fb21ef");
        $attachments['$file_id'] = $fileIds;
        $data->addKeyValue("Attachments", $attachments);
        
        // Add checklists
        $checkLists = array();
        $checkLists[] = array("list 1" => true);
        $checkLists[] = array("list 2" => true);
        $checkLists[] = array("list 3" => true);
        $data->addKeyValue("CheckLists", $checkLists);
        
        $blueprint->setData($data);
        array_push($blueprintList, $blueprint);
        $bodyWrapper->setBlueprint($blueprintList);
        
        $response = $blueprintOperations->updateBlueprint($bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionResponse = $response->getObject();
            
            if ($actionResponse instanceof SuccessResponse) {
                $successResponse = $actionResponse;
                echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                echo("Message: " . $successResponse->getMessage() . "\n");
                
                if ($successResponse->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
            } else if ($actionResponse instanceof APIException) {
                $exception = $actionResponse;
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

UpdateBlueprint::initialize();
$moduleAPIName = "Leads";
$recordId = "1055806000028386022";
$transitionId = "1055806000000173093";
UpdateBlueprint::updateBlueprint($moduleAPIName, $recordId, $transitionId);
?>
