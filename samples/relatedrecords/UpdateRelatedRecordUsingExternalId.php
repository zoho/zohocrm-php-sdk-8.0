<?php
use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\relatedrecords\RelatedRecordsOperations;
use com\zoho\crm\api\relatedrecords\UpdateRelatedRecordsUsingExternalIdHeader;
use com\zoho\crm\api\relatedrecords\BodyWrapper;
use com\zoho\crm\api\relatedrecords\ActionWrapper;
use com\zoho\crm\api\relatedrecords\SuccessResponse;
use com\zoho\crm\api\relatedrecords\APIException;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\HeaderMap;

require_once "vendor/autoload.php";

class UpdateRelatedRecordUsingExternalId 
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

    public static function updateRelatedRecordUsingExternalId(string $moduleAPIName, string $externalValue, string $relatedListAPIName, string $relatedRecordId) 
    {
        $xExternal = "Leads.External,Products.Products_External";
        $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName, $moduleAPIName);
        
        $bodyWrapper = new BodyWrapper();
        $records = array();
        
        $record = new Record();
        $record->setId($relatedRecordId);
        $record->addKeyValue("Email", "external_updated@example.com");
        $record->addKeyValue("Last_Name", "External Updated Single");
        array_push($records, $record);
        
        $bodyWrapper->setData($records);
        $headerInstance = new HeaderMap();
        $headerInstance->add(UpdateRelatedRecordsUsingExternalIdHeader::XEXTERNAL(), $xExternal);
        $response = $relatedRecordsOperations->updateRelatedRecordUsingExternalId($relatedRecordId, $externalValue, $bodyWrapper, $headerInstance);
        
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

UpdateRelatedRecordUsingExternalId::initialize();
UpdateRelatedRecordUsingExternalId::updateRelatedRecordUsingExternalId("Leads", "External123", "Contacts", "440248254002");
?>