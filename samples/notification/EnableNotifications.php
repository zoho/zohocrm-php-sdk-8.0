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

class EnableNotifications
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

    public static function enableNotifications()
    {
        $notificationsOperations = new NotificationsOperations();
        $bodyWrapper = new BodyWrapper();
        $notifications = array();
        
        // First notification for Deals module
        $notification1 = new Notification();
        $notification1->setChannelId("1006800211");
        
        $events1 = array("Deals.all");
        $notification1->setEvents($events1);
        
        $expiryTime1 = date_create("2025-12-31T23:59:59")
            ->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $notification1->setChannelExpiry($expiryTime1);
        
        $notification1->setToken("TOKEN_FOR_VERIFICATION_OF_DEALS");
        $notification1->setNotifyUrl("https://www.example.com/notifications/deals");
        
        array_push($notifications, $notification1);
        
        // Second notification for Accounts module
        $notification2 = new Notification();
        $notification2->setChannelId("1006800212");
        
        $events2 = array("Accounts.all");
        $notification2->setEvents($events2);
        
        $expiryTime2 = date_create("2025-12-31T23:59:59")
            ->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $notification2->setChannelExpiry($expiryTime2);
        
        $notification2->setToken("TOKEN_FOR_VERIFICATION_OF_ACCOUNTS");
        $notification2->setNotifyUrl("https://www.example.com/notifications/accounts");
        
        array_push($notifications, $notification2);
        
        $bodyWrapper->setWatch($notifications);
        
        $response = $notificationsOperations->enableNotifications($bodyWrapper);
        
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
                        foreach ($successResponse->getDetails() as $key => $value) {
                            if (is_array($value)) {
                                echo($key . ": \n");
                                foreach ($value as $item) {
                                    if ($item instanceof Notification) {
                                        echo("  Channel ID: " . $item->getChannelId() . "\n");
                                        echo("  Resource URI: " . $item->getResourceUri() . "\n");
                                        echo("  Resource ID: " . $item->getResourceId() . "\n");
                                    }
                                }
                            } else {
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

EnableNotifications::initialize();
EnableNotifications::enableNotifications();
