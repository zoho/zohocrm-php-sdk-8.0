<?php
namespace samples\file;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\files\FilesOperations;
use com\zoho\crm\api\files\BodyWrapper;
use com\zoho\crm\api\files\ActionWrapper;
use com\zoho\crm\api\files\SuccessResponse;
use com\zoho\crm\api\files\APIException;
use com\zoho\crm\api\util\StreamWrapper;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class UploadFiles
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

    public static function uploadFiles()
    {
        self::initialize();
        
        $filesOperations = new FilesOperations();
        
        $bodyWrapper = new BodyWrapper();
        
        $streamWrapper = new StreamWrapper(null, null, "./GetFile.php");
        $streamWrapper1 = new StreamWrapper(null, null, "./file2.txt");
        $streamWrapper2 = new StreamWrapper(null, null, "./image.jpg");
        
        $bodyWrapper->setFile([$streamWrapper , $streamWrapper1, $streamWrapper2]);
        
        $paramInstance = new ParameterMap();
        
        $response = $filesOperations->uploadFiles($bodyWrapper, $paramInstance);
        
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
                        echo("Details: ");
                        
                        if ($successResponse->getDetails() != null) {
                            foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                                echo($keyName . ": " . $keyValue . "\n");
                            }
                        }
                        
                        echo("Message: " . $successResponse->getMessage() . "\n");
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Details: ");
                        
                        if ($exception->getDetails() != null) {
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo($keyName . ": " . $keyValue . "\n");
                            }
                        }
                        
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                
                if ($exception->getDetails() != null) {
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

UploadFiles::uploadFiles();
