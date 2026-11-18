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

class UpdateRelatedRecordsUsingExternalId 
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

    public static function updateRelatedRecordsUsingExternalId(string $moduleAPIName, string $externalValue, string $relatedListAPIName) 
    {
        $xExternal = "Leads.External,Products.Products_External";
        $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName, $moduleAPIName);
        
        $bodyWrapper = new BodyWrapper();
        $records = array();
        
        $record1 = new Record();
        $record1->setId("440248254002");
        $record1->addKeyValue("Email", "external_updated@example.com");
        $record1->addKeyValue("Last_Name", "External Updated");
        array_push($records, $record1);
        
        $bodyWrapper->setData($records);
        $headerInstance = new HeaderMap();
        $headerInstance->add(UpdateRelatedRecordsUsingExternalIdHeader::XEXTERNAL(), $xExternal);
        $response = $relatedRecordsOperations->updateRelatedRecordsUsingExternalId($externalValue, $bodyWrapper, $headerInstance);
        
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

UpdateRelatedRecordsUsingExternalId::initialize();
UpdateRelatedRecordsUsingExternalId::updateRelatedRecordsUsingExternalId("Leads", "External123", "Contacts");
?>