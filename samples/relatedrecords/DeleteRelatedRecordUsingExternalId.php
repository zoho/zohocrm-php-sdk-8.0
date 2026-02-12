<?php
use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\relatedrecords\RelatedRecordsOperations;
use com\zoho\crm\api\relatedrecords\DeleteRelatedRecordUsingExternalIDHeader;
use com\zoho\crm\api\relatedrecords\ActionWrapper;
use com\zoho\crm\api\relatedrecords\SuccessResponse;
use com\zoho\crm\api\relatedrecords\APIException;
use com\zoho\crm\api\HeaderMap;

require_once "vendor/autoload.php";

class DeleteRelatedRecordUsingExternalId 
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

    public static function deleteRelatedRecordUsingExternalId(string $moduleAPIName, string $externalValue, string $relatedListAPIName, string $externalFieldValue) 
    {
        $xExternal = "Leads.External,Products.Products_External";
        $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName, $moduleAPIName);
        $headerInstance = new HeaderMap();
        $headerInstance->add(DeleteRelatedRecordUsingExternalIDHeader::XEXTERNAL(), $xExternal);
        $response = $relatedRecordsOperations->deleteRelatedRecordUsingExternalId($externalFieldValue, $externalValue, $headerInstance);
        
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
                            echo("Message: " . $successResponse->getMessage() . "\n");
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

DeleteRelatedRecordUsingExternalId::initialize();
DeleteRelatedRecordUsingExternalId::deleteRelatedRecordUsingExternalId("Leads", "External123", "Contacts", "440248254002");
?>