<?php
namespace samples\notifications;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\notifications\APIException;
use com\zoho\crm\api\notifications\GetNotificationsParam;
use com\zoho\crm\api\notifications\NotificationsOperations;
use com\zoho\crm\api\notifications\ResponseWrapper;

require_once "vendor/autoload.php";

class GetNotifications
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

    public static function getNotifications()
    {
        $notificationsOperations = new NotificationsOperations();
        
        $paramInstance = new ParameterMap();
        // $paramInstance->add(GetNotificationsParam::channelId(), "1006800211");
        // $paramInstance->add(GetNotificationsParam::module(), "Accounts");
        // $paramInstance->add(GetNotificationsParam::page(), 1);
        // $paramInstance->add(GetNotificationsParam::perPage(), 10);
        
        $response = $notificationsOperations->getNotifications($paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $notifications = $responseWrapper->getWatch();
                
                foreach ($notifications as $notification) {
                    echo("Notification Channel ID: " . $notification->getChannelId() . "\n");
                    echo("Notification Resource URI: " . $notification->getResourceUri() . "\n");
                    echo("Notification Resource ID: " . $notification->getResourceId() . "\n");
                    echo("Notification Resource Name: " . $notification->getResourceName() . "\n");
                    echo("Notification Notify URL: " . $notification->getNotifyUrl() . "\n");
                    
                    echo("Notification Channel Expiry: ");
                    print_r($notification->getChannelExpiry());
                    echo("\n");
                    
                    echo("Notification Token: " . $notification->getToken() . "\n");
                    
                    echo("Notification NotifyOnRelatedAction: " . 
                         ($notification->getNotifyOnRelatedAction() ? "true" : "false") . "\n");
                    
                    $events = $notification->getEvents();
                    if ($events != null && count($events) > 0) {
                        echo("Notification Events: \n");
                        foreach ($events as $event) {
                            echo("  - " . $event . "\n");
                        }
                    }
                    
                    echo("\n");
                }
                
                $info = $responseWrapper->getInfo();
                if ($info != null) {
                    if ($info->getPerPage() != null) {
                        echo("Info PerPage: " . $info->getPerPage() . "\n");
                    }
                    if ($info->getCount() != null) {
                        echo("Info Count: " . $info->getCount() . "\n");
                    }
                    if ($info->getPage() != null) {
                        echo("Info Page: " . $info->getPage() . "\n");
                    }
                    if ($info->getMoreRecords() != null) {
                        echo("Info MoreRecords: " . ($info->getMoreRecords() ? "true" : "false") . "\n");
                    }
                }
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

GetNotifications::initialize();
GetNotifications::getNotifications();
