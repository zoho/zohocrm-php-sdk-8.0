<?php
namespace samples\attachments;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\attachments\AttachmentsOperations;
use com\zoho\crm\api\attachments\GetAttachmentsParam;
use com\zoho\crm\api\attachments\ResponseWrapper;
use com\zoho\crm\api\attachments\APIException;

require_once "vendor/autoload.php";

class GetAttachments
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

    public static function getAttachments(string $moduleAPIName, string $recordId)
    {
        $attachmentsOperations = new AttachmentsOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetAttachmentsParam::page(), 1);
        $paramInstance->add(GetAttachmentsParam::perPage(), 10);
        $paramInstance->add(GetAttachmentsParam::fields(), "id,Modified_Time");
        
        $response = $attachmentsOperations->getAttachments($recordId, $moduleAPIName, $paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $attachments = $responseWrapper->getData();
                
                foreach ($attachments as $attachment) {
                    echo("Attachment ID: " . $attachment->getId() . "\n");
                    echo("Attachment File Name: " . $attachment->getFileName() . "\n");
                    echo("Attachment File Size: " . $attachment->getSize() . "\n");
                    
                    $owner = $attachment->getOwner();
                    if ($owner != null) {
                        echo("Attachment Owner Name: " . $owner->getName() . "\n");
                        echo("Attachment Owner ID: " . $owner->getId() . "\n");
                    }
                    
                    echo("Attachment Modified Time: ");
                    print_r($attachment->getModifiedTime());
                    echo("\n");
                    
                    echo("Attachment Created Time: ");
                    print_r($attachment->getCreatedTime());
                    echo("\n");
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetAttachments::initialize();
$moduleAPIName = "Leads";
$recordId = "105586022";
GetAttachments::getAttachments($moduleAPIName, $recordId);
?>
