<?php
namespace samples\blueprint;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\blueprint\BlueprintOperations;
use com\zoho\crm\api\blueprint\ResponseWrapper;
use com\zoho\crm\api\blueprint\APIException;

require_once "vendor/autoload.php";

class GetBlueprint
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

    public static function getBlueprint(string $moduleAPIName, string $recordId)
    {
        $blueprintOperations = new BlueprintOperations($recordId, $moduleAPIName);
        
        $response = $blueprintOperations->getBlueprint();
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $blueprint = $responseWrapper->getBlueprint();
                
                $processInfo = $blueprint->getProcessInfo();
                
                if ($processInfo != null) {
                    echo("ProcessInfo Field-ID: " . $processInfo->getFieldId() . "\n");
                    echo("ProcessInfo isContinuous: " . $processInfo->getIsContinuous() . "\n");
                    echo("ProcessInfo API Name: " . $processInfo->getAPIName() . "\n");
                    echo("ProcessInfo Continuous: " . $processInfo->getContinuous() . "\n");
                    echo("ProcessInfo FieldLabel: " . $processInfo->getFieldLabel() . "\n");
                    echo("ProcessInfo Name: " . $processInfo->getName() . "\n");
                    echo("ProcessInfo ColumnName: " . $processInfo->getColumnName() . "\n");
                    echo("ProcessInfo FieldValue: " . $processInfo->getFieldValue() . "\n");
                    echo("ProcessInfo ID: " . $processInfo->getId() . "\n");
                    echo("ProcessInfo FieldName: " . $processInfo->getFieldName() . "\n");
                }
                
                $transitions = $blueprint->getTransitions();
                
                foreach ($transitions as $transition) {
                    $nextTransitions = $transition->getNextTransitions();
                    
                    foreach ($nextTransitions as $nextTransition) {
                        echo("NextTransition ID: " . $nextTransition->getId() . "\n");
                        echo("NextTransition Name: " . $nextTransition->getName() . "\n");
                    }
                    
                    echo("Transition PercentPartialSave: " . $transition->getPercentPartialSave() . "\n");
                    
                    $data = $transition->getData();
                    
                    if ($data != null) {
                        echo("Record ID: " . $data->getId() . "\n");
                        
                        $createdBy = $data->getCreatedBy();
                        if ($createdBy != null) {
                            echo("Record Created By: " . $createdBy->getName() . "\n");
                        }
                        
                        foreach ($data->getKeyValues() as $key => $value) {
                            echo($key . ": " . print_r($value, true) . "\n");
                        }
                    }
                    
                    echo("Transition NextFieldValue: " . $transition->getNextFieldValue() . "\n");
                    echo("Transition Name: " . $transition->getName() . "\n");
                    echo("Transition CriteriaMatched: " . $transition->getCriteriaMatched() . "\n");
                    echo("Transition ID: " . $transition->getId() . "\n");
                    
                    $fields = $transition->getFields();
                    
                    foreach ($fields as $field) {
                        echo("Field ID: " . $field->getId() . "\n");
                        echo("Field APIName: " . $field->getAPIName() . "\n");
                        echo("Field DataType: " . $field->getDataType() . "\n");
                        echo("Field DisplayLabel: " . $field->getDisplayLabel() . "\n");
                    }
                    
                    echo("Transition CriteriaMessage: " . $transition->getCriteriaMessage() . "\n");
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage()->getValue(). "\n");
                
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

GetBlueprint::initialize();
$moduleAPIName = "Leads";
$recordId = "1055806000028386022";
GetBlueprint::getBlueprint($moduleAPIName, $recordId);
?>
