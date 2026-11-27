<?php
use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\relatedrecords\RelatedRecordsOperations;
use com\zoho\crm\api\relatedrecords\DeleteRelatedRecordsUsingExternalIDParam;
use com\zoho\crm\api\relatedrecords\DeleteRelatedRecordsUsingExternalIDHeader;
use com\zoho\crm\api\relatedrecords\ActionWrapper;
use com\zoho\crm\api\relatedrecords\SuccessResponse;
use com\zoho\crm\api\relatedrecords\APIException;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class DeleteRelatedRecordsUsingExternalId 
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

    public static function deleteRelatedRecordsUsingExternalId(string $moduleAPIName, string $externalValue, string $relatedListAPIName, array $relatedRecordIds) 
    {
        $xExternal = "Leads.External,Products.Products_External";
        $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName, $moduleAPIName);
        $paramInstance = new ParameterMap();
        foreach ($relatedRecordIds as $relatedRecordId) {
            $paramInstance->add(DeleteRelatedRecordsUsingExternalIDParam::ids(), $relatedRecordId);
        }
        $headerInstance = new HeaderMap();
        $headerInstance->add(DeleteRelatedRecordsUsingExternalIDHeader::XEXTERNAL(), $xExternal);
        $response = $relatedRecordsOperations->deleteRelatedRecordsUsingExternalId($externalValue, $paramInstance, $headerInstance);
        
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

DeleteRelatedRecordsUsingExternalId::initialize();
DeleteRelatedRecordsUsingExternalId::deleteRelatedRecordsUsingExternalId("Leads", "External123", "Contacts", array("440248254001", "440248254002"));
?>