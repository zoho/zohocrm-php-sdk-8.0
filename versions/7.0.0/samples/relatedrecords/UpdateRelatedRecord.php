<?php
use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\relatedrecords\RelatedRecordsOperations;
use com\zoho\crm\api\relatedrecords\BodyWrapper;
use com\zoho\crm\api\relatedrecords\ActionWrapper;
use com\zoho\crm\api\relatedrecords\SuccessResponse;
use com\zoho\crm\api\relatedrecords\APIException;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\HeaderMap;

require_once "vendor/autoload.php";

class UpdateRelatedRecord 
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

    public static function updateRelatedRecord(string $moduleAPIName, string $recordId, string $relatedListAPIName, string $relatedRecordId) 
    {
        $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName, $moduleAPIName);
        
        $bodyWrapper = new BodyWrapper();
        $records = array();
        
        $record = new Record();
        $record->addKeyValue("Email", "updated@example.com");
        $record->addKeyValue("Last_Name", "Updated Last Name");
        array_push($records, $record);
        
        $bodyWrapper->setData($records);
        $headerInstance = new HeaderMap();
        
        $response = $relatedRecordsOperations->updateRelatedRecord($relatedRecordId, $recordId, $bodyWrapper, $headerInstance);
        
        if($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");

            if($response->isExpected()) {
                $actionHandler = $response->getObject();
                
                if($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getData();
                    
                    foreach($actionResponses as $actionResponse) {
                        if($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                            echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                            echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                        }
                        else if($actionResponse instanceof APIException) {
                            $exception = $actionResponse;
                            echo("Status: " . $exception->getStatus()->getValue() . "\n");
                            echo("Code: " . $exception->getCode()->getValue() . "\n");
                            echo("Message: " . $exception->getMessage() . "\n");
                        }
                    }
                }
                else if($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
                    echo("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo("Code: " . $exception->getCode()->getValue() . "\n");
                    echo("Message: " . $exception->getMessage()->getValue() . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}

UpdateRelatedRecord::initialize();
UpdateRelatedRecord::updateRelatedRecord("Leads", "1055806000028448052", "Products", "1055806000000308001");
?>