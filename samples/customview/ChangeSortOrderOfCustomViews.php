<?php
namespace samples\customview;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\customviews\CustomViewsOperations;
use com\zoho\crm\api\customviews\BodyWrapper;
use com\zoho\crm\api\customviews\CustomViews;
use com\zoho\crm\api\customviews\ActionWrapper;
use com\zoho\crm\api\customviews\SuccessResponse;
use com\zoho\crm\api\customviews\APIException;
use com\zoho\crm\api\customviews\ChangeSortOrderOfCustomViewsParam;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\util\Choice;

class ChangeSortOrderOfCustomViews
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

    public static function changeSortOrderOfCustomViews()
    {
        self::initialize();
        
        $customViewsOperations = new CustomViewsOperations();
        $bodyWrapper = new BodyWrapper();
        $customViews = array();
        
        $customView1 = new CustomViews();
        $customView1->setId("34770610087501");
        $customView1->setSortOrder(new Choice("asc"));
        array_push($customViews, $customView1);
        
        $customView2 = new CustomViews();
        $customView2->setId("34770610091333");
        $customView2->setSortOrder(new Choice("asc"));
        array_push($customViews, $customView2);
        
        $bodyWrapper->setCustomViews($customViews);
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(ChangeSortOrderOfCustomViewsParam::module(), "Leads");
        
        $response = $customViewsOperations->changeSortOrderOfCustomViews($bodyWrapper, $paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getCustomViews();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Details: ");
                        
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo($key . ": " . $value . "\n");
                        }
                        
                        echo("Message: " . $successResponse->getMessage() . "\n");
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Details: ");
                        
                        foreach ($exception->getDetails() as $key => $value) {
                            echo($key . ": " . $value . "\n");
                        }
                        
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                
                foreach ($exception->getDetails() as $key => $value) {
                    echo($key . ": " . $value . "\n");
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

ChangeSortOrderOfCustomViews::changeSortOrderOfCustomViews();
