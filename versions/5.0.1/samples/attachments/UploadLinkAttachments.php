<?php
namespace samples\attachments;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\attachments\AttachmentsOperations;
use com\zoho\crm\api\attachments\UploadUrlAttachmentsParam;
use com\zoho\crm\api\attachments\ActionWrapper;
use com\zoho\crm\api\attachments\SuccessResponse;
use com\zoho\crm\api\attachments\APIException;

require_once "vendor/autoload.php";

class UploadLinkAttachments
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

    public static function uploadLinkAttachments(string $moduleAPIName, string $recordId, string $attachmentURL)
    {
        $attachmentsOperations = new AttachmentsOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(UploadUrlAttachmentsParam::attachmentUrl(), $attachmentURL);
        
        $response = $attachmentsOperations->uploadUrlAttachments($recordId, $moduleAPIName, $paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getData();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Message: " . $successResponse->getMessage() . "\n");
                        
                        if ($successResponse->getDetails() != null) {
                            echo("Details: \n");
                            foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                                echo($keyName . ": " . $keyValue . "\n");
                            }
                        }
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
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
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

UploadLinkAttachments::initialize();
$moduleAPIName = "Leads";
$recordId = "1055806000028386022";
$attachmentURL = "https://example.com/image.png";
UploadLinkAttachments::uploadLinkAttachments($moduleAPIName, $recordId, $attachmentURL);
?>
