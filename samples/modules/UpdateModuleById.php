<?php
namespace samples\modules;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\modules\ModulesOperations;
use com\zoho\crm\api\modules\BodyWrapper;
use com\zoho\crm\api\modules\Modules;
use com\zoho\crm\api\modules\ActionWrapper;
use com\zoho\crm\api\modules\SuccessResponse;
use com\zoho\crm\api\modules\APIException;
use com\zoho\crm\api\profiles\MinifiedProfile;

require_once "vendor/autoload.php";

class UpdateModuleById
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

    public static function updateModuleById(string $moduleID)
    {
        self::initialize();
        
        $moduleOperations = new ModulesOperations();
        
        $modules = array();
        
        $profiles = array();
        
        $profile = new MinifiedProfile();
        $profile->setId("1055806000000026014");
        
        array_push($profiles, $profile);
        
        $module = new Modules();
        $module->setProfiles($profiles);
        
        array_push($modules, $module);
        
        $request = new BodyWrapper();
        $request->setModules($modules);
        
        $response = $moduleOperations->updateModule($moduleID, $request);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getModules();
                
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
                        
                        echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
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

UpdateModuleById::updateModuleById("1055806000000485367");
