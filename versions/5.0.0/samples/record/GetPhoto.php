<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\FileBodyWrapper;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class GetPhoto
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

    public static function getPhoto(string $moduleAPIName, string $recordId, string $destinationFolder)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $response = $recordOperations->getPhoto($recordId);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            if ($response->isExpected()) {
                $downloadHandler = $response->getObject();
                if ($downloadHandler instanceof FileBodyWrapper) {
                    $fileBodyWrapper = $downloadHandler;
                    $streamWrapper = $fileBodyWrapper->getFile();
                    //Create a file instance with the absolute_file_path
                    print_r($streamWrapper->getName());
                    $fp = fopen($destinationFolder . "/" . $streamWrapper->getName(), "w");
                    $stream = $streamWrapper->getStream();
                    fputs($fp, $stream);
                    fclose($fp);
                } else if ($downloadHandler instanceof APIException) {
                    $exception = $downloadHandler;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    if ($exception->getDetails() != null) {
                        echo ("Details: \n");
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
$moduleAPIName = "Leads";
$recordId = "3477061194181";
$destinationFolder = "/Users/Documents/file";
GetPhoto::initialize();
GetPhoto::getPhoto($moduleAPIName, $recordId, $destinationFolder);
