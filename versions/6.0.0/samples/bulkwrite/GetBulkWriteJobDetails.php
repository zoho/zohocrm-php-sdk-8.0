<?php
namespace samples\bulkwrite;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\bulkwrite\BulkWriteOperations;
use com\zoho\crm\api\bulkwrite\BulkWriteResponse;
use com\zoho\crm\api\bulkwrite\APIException;

require_once "vendor/autoload.php";

class GetBulkWriteJobDetails
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

    public static function getBulkWriteJobDetails(string $jobId)
    {
        $bulkWriteOperations = new BulkWriteOperations();
        
        $response = $bulkWriteOperations->getBulkWriteJobDetails($jobId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseWrapper = $response->getObject();
            
            if ($responseWrapper instanceof BulkWriteResponse) {
                $bulkWriteResponse = $responseWrapper;
                
                echo("Bulkwrite Job Status: " . $bulkWriteResponse->getStatus() . "\n");
                echo("Bulkwrite CharacterEncoding: " . $bulkWriteResponse->getCharacterEncoding() . "\n");
                
                $resources = $bulkWriteResponse->getResource();
                
                if ($resources != null) {
                    foreach ($resources as $resource) {
                        echo("Bulkwrite Resource Status: " . $resource->getStatus()->getValue() . "\n");
                        echo("Bulkwrite Resource Type: " . $resource->getType()->getValue() . "\n");
                        $module = $resource->getModule();
                        if ($module != null)
                        {
                            echo("Bulkwrite Resource Module Name : " . $module->getAPIName() . "\n");
                            echo("Bulkwrite Resource Module Id : " . $module->getId() . "\n");
                        }

                        $fieldMappings = $resource->getFieldMappings();
                        
                        if ($fieldMappings != null) {
                            foreach ($fieldMappings as $fieldMapping) {
                                echo("Bulkwrite Resource FieldMapping APIName: " . $fieldMapping->getAPIName() . "\n");
                                echo("Bulkwrite Resource FieldMapping Index: " . $fieldMapping->getIndex() . "\n");
                            }
                        }
                    }
                }
                
                echo("Bulkwrite ID: " . $bulkWriteResponse->getId() . "\n");
                
                $result = $bulkWriteResponse->getResult();
                
                if ($result != null) {
                    echo("Bulkwrite DownloadUrl: " . $result->getDownloadUrl() . "\n");
                }
                
                $createdBy = $bulkWriteResponse->getCreatedBy();
                
                if ($createdBy != null) {
                    echo("Bulkwrite Created By User-ID: " . $createdBy->getId() . "\n");
                    echo("Bulkwrite Created By user-Name: " . $createdBy->getName() . "\n");
                }
                
                echo("Bulkwrite Operation: " . $bulkWriteResponse->getOperation() . "\n");
                
                echo("Bulkwrite File CreatedTime: ");
                print_r($bulkWriteResponse->getCreatedTime());
                echo("\n");
            } else if ($responseWrapper instanceof APIException) {
                $exception = $responseWrapper;
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

GetBulkWriteJobDetails::initialize();
$jobId = "1055844009";
GetBulkWriteJobDetails::getBulkWriteJobDetails($jobId);
?>
