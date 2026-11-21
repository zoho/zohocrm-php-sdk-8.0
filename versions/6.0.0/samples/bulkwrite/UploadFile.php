<?php
namespace samples\bulkwrite;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\bulkwrite\BulkWriteOperations;
use com\zoho\crm\api\bulkwrite\FileBodyWrapper;
use com\zoho\crm\api\bulkwrite\UploadFileHeader;
use com\zoho\crm\api\bulkwrite\SuccessResponse;
use com\zoho\crm\api\bulkwrite\APIException;
use com\zoho\crm\api\util\StreamWrapper;

require_once "vendor/autoload.php";

class UploadFile
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

    public static function uploadFile(string $orgID, string $absoluteFilePath)
    {
        $bulkWriteOperations = new BulkWriteOperations();
        
        $fileBodyWrapper = new FileBodyWrapper();
        $streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
        $fileBodyWrapper->setFile($streamWrapper);
        
        $headerInstance = new HeaderMap();
        $headerInstance->add(UploadFileHeader::feature(), "bulk-write");
        $headerInstance->add(UploadFileHeader::XCRMORG(), $orgID);
        
        $response = $bulkWriteOperations->uploadFile($fileBodyWrapper, $headerInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionResponse = $response->getObject();
            
            if ($actionResponse instanceof SuccessResponse) {
                $successResponse = $actionResponse;
                echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                
                echo("Details: ");
                foreach ($successResponse->getDetails() as $key => $value) {
                    echo($key . " : ");
                    print_r($value);
                    echo("\n");
                }
            } else if ($actionResponse instanceof APIException) {
                $exception = $actionResponse;
                echo("Status: " . $exception->getStatus() . "\n");
                echo("Code: " . $exception->getCode() . "\n");
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

UploadFile::initialize();
$orgID = "6020";
$absoluteFilePath = "./Leads.zip";
UploadFile::uploadFile($orgID, $absoluteFilePath);
?>
