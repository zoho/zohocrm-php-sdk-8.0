<?php
namespace samples\attachments;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\attachments\AttachmentsOperations;
use com\zoho\crm\api\attachments\FileBodyWrapper;
use com\zoho\crm\api\attachments\APIException;

require_once "vendor/autoload.php";

class DownloadAttachment
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

    public static function downloadAttachment(string $moduleAPIName, string $recordId, string $attachmentId, string $destinationFolder)
    {
        $attachmentsOperations = new AttachmentsOperations();
        $response = $attachmentsOperations->getAttachment($attachmentId, $recordId, $moduleAPIName);
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if ($response->getStatusCode() == 204) {
                echo("No Content\n");
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

DownloadAttachment::initialize();
$moduleAPIName = "Leads";
$recordId = "1055806000028386022";
$attachmentId = "1055806000028443001";
$destinationFolder = "/file";
DownloadAttachment::downloadAttachment($moduleAPIName, $recordId, $attachmentId, $destinationFolder);
?>
