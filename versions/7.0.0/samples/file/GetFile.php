<?php
namespace samples\file;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\files\FilesOperations;
use com\zoho\crm\api\files\GetFileParam;
use com\zoho\crm\api\files\FileBodyWrapper;
use com\zoho\crm\api\files\APIException;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetFile
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

    public static function getFile(string $id, string $destinationFolder)
    {
        self::initialize();
        
        $filesOperations = new FilesOperations();
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetFileParam::id(), $id);
        
        $response = $filesOperations->getFile($paramInstance);
        
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
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetFile::getFile("81c58c8e7e80cc6d483afd35ce706ac9e44c8fa29bf", "./");
