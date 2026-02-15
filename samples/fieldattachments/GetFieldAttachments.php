<?php
namespace samples\fieldattachments;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\fieldattachments\FieldAttachmentsOperations;
use com\zoho\crm\api\fieldattachments\FileBodyWrapper;
use com\zoho\crm\api\fieldattachments\APIException;

require_once "vendor/autoload.php";

class GetFieldAttachments
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

    public static function getFieldAttachments(string $moduleAPIName, string $recordId, string $fieldsAttachmentId, $destinationFolder=null)
    {
        $fieldAttachmentsOperations = new FieldAttachmentsOperations($moduleAPIName, $recordId, $fieldsAttachmentId);
        $response = $fieldAttachmentsOperations->getFieldAttachments();
        if($response != null)
        {
            echo("Status code : " . $response->getStatusCode() . "\n");
            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
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

GetFieldAttachments::initialize();
$moduleAPIName = "Leads";
$recordId = "440248001234567890"; // Replace with actual record ID
$fieldsAttachmentId = "440248001234567891"; // Replace with actual field attachment ID
$destinationFolder = "/path/to/destination/folder"; // Replace with actual destination folder path
GetFieldAttachments::getFieldAttachments($moduleAPIName, $recordId, $fieldsAttachmentId, $destinationFolder);
