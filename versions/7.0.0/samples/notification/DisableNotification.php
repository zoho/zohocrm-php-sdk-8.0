<?php
namespace samples\notifications;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\notifications\ActionWrapper;
use com\zoho\crm\api\notifications\APIException;
use com\zoho\crm\api\notifications\BodyWrapper;
use com\zoho\crm\api\notifications\Notification;
use com\zoho\crm\api\notifications\NotificationsOperations;
use com\zoho\crm\api\notifications\SuccessResponse;

require_once "vendor/autoload.php";

class DisableNotification
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

    public static function disableNotification()
    {
        $notificationsOperations = new NotificationsOperations();
        $bodyWrapper = new BodyWrapper();
        $notifications = array();
        
        $notification = new Notification();
        $notification->setChannelId("1006800212");
        
        $events = array("Deals.all");
        $notification->setEvents($events);
        
        // Set delete events flag to true to disable specific events
        $notification->setDeleteevents(true);
        
        array_push($notifications, $notification);
        
        $bodyWrapper->setWatch($notifications);
        
        $response = $notificationsOperations->disableNotification($bodyWrapper);
        
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
                                echo($key . ": " . print_r($value) . "\n");
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

DisableNotification::initialize();
DisableNotification::disableNotification();
