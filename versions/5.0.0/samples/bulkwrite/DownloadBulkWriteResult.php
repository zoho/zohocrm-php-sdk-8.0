<?php
namespace samples\bulkwrite;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\bulkwrite\BulkWriteOperations;
use com\zoho\crm\api\bulkwrite\FileBodyWrapper;
use com\zoho\crm\api\bulkwrite\APIException;

require_once "vendor/autoload.php";

class DownloadBulkWriteResult
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

    public static function downloadBulkWriteResult(string $downloadUrl, string $destinationFolder)
    {
        $bulkWriteOperations = new BulkWriteOperations();
        
        $response = $bulkWriteOperations->downloadBulkWriteResult($downloadUrl);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof FileBodyWrapper) {
                $fileBodyWrapper = $responseHandler;
                $streamWrapper = $fileBodyWrapper->getFile();
                
                $fp = fopen($destinationFolder . "/" . $streamWrapper->getName(), "w");
                $stream = $streamWrapper->getStream();
                fputs($fp, $stream);
                fclose($fp);
                
                echo("File downloaded successfully to: " . $destinationFolder . "/" . $streamWrapper->getName() . "\n");
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                
                if ($exception->getStatus() != null) {
                    echo("Status: " . $exception->getStatus()->getValue() . "\n");
                }
                
                if ($exception->getCode() != null) {
                    echo("Code: " . $exception->getCode()->getValue() . "\n");
                }
                
                if ($exception->getMessage() != null) {
                    echo("Message: " . $exception->getMessage() . "\n");
                }
                
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

DownloadBulkWriteResult::initialize();
$downloadUrl = "https://download-accl.zoho.in/v2/crm/6020/bulk-write/10554009/10554009.zip";
$destinationFolder = "./";
DownloadBulkWriteResult::downloadBulkWriteResult($downloadUrl, $destinationFolder);
?>
