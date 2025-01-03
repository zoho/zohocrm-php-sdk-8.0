<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\FileBodyWrapper;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\SuccessResponse;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\StreamWrapper;

require_once "vendor/autoload.php";

class UploadPhoto
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

    public static function uploadPhoto(string $moduleAPIName, string $recordId, string $absoluteFilePath)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $fileBodyWrapper = new FileBodyWrapper();
        $streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
        $fileBodyWrapper->setFile($streamWrapper);
        $response = $recordOperations->uploadPhoto($recordId, $fileBodyWrapper);
        if ($response != null) {
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            if ($response->isExpected()) {
                $fileHandler = $response->getObject();
                if ($fileHandler instanceof SuccessResponse) {
                    $successResponse = $fileHandler;
                    echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");
                    echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    if ($successResponse->getDetails() != null) {
                        foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                            echo ($keyName . ": " . $keyValue . "\n");
                        }
                    }
                    echo ("Message: " . ($successResponse->getMessage() instanceof Choice ? $successResponse->getMessage()->getValue() : $successResponse->getMessage()) . "\n");
                } else if ($fileHandler instanceof APIException) {
                    $exception = $fileHandler;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    if ($exception->getDetails() != null) {
                        foreach ($exception->getDetails() as $keyName => $keyValue) {
                            echo ($keyName . ": " . $keyValue . "\n");
                        }
                    }
                    echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}
$moduleAPIName = "Participants";
$recordId = "3477061194181";
$absoluteFilePath = "/Users/Documents/photo.png";
UploadPhoto::initialize();
UploadPhoto::uploadPhoto($moduleAPIName, $recordId, $absoluteFilePath);
