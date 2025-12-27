<?php
namespace samples\notifications;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\notifications\ActionWrapper;
use com\zoho\crm\api\notifications\APIException;
use com\zoho\crm\api\notifications\DeleteNotificationParam;
use com\zoho\crm\api\notifications\NotificationsOperations;
use com\zoho\crm\api\notifications\SuccessResponse;

require_once "vendor/autoload.php";

class DeleteNotification
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

    public static function deleteNotification()
    {
        $notificationsOperations = new NotificationsOperations();
        $paramInstance = new ParameterMap();
        
        $channelIds = array("1006800211", "1006800212", "1006800213");
        
        foreach ($channelIds as $id) {
            $paramInstance->add(DeleteNotificationParam::channelIds(), $id);
        }
        
        $response = $notificationsOperations->deleteNotification($paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getWatch();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        
                        echo("Details: \n");
                        if ($successResponse->getDetails() != null) {
                            foreach ($successResponse->getDetails() as $key => $value) {
                                echo($key . ": " . $value . "\n");
                            }
                        }
                        
                        echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
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
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
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

DeleteNotification::initialize();
DeleteNotification::deleteNotification();
