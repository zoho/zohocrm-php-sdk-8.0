<?php
namespace samples\organization;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\org\APIException;
use com\zoho\crm\api\org\OrgOperations;
use com\zoho\crm\api\org\FileBodyWrapper;

require_once "vendor/autoload.php";

class GetOrgPhoto
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

    public static function getOrgPhoto(string $destinationFolder)
    {
        $orgOperations = new OrgOperations();
        $response = $orgOperations->getOrgPhoto();
        
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
                $fileName = $streamWrapper->getName();
                
                if ($fileName == null) {
                    $fileName = "organization_photo.png";
                }
                
                $filePath = $destinationFolder . $fileName;
                $fp = fopen($filePath, "w");
                $stream = $streamWrapper->getStream();
                fputs($fp, $stream);
                fclose($fp);
                
                echo("Organization photo saved at: " . $filePath . "\n");
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetOrgPhoto::initialize();
GetOrgPhoto::getOrgPhoto("./");
