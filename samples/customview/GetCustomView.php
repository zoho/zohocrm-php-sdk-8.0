<?php
namespace samples\customview;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\customviews\CustomViewsOperations;
use com\zoho\crm\api\customviews\GetCustomViewParam;
use com\zoho\crm\api\customviews\ResponseWrapper;
use com\zoho\crm\api\customviews\APIException;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetCustomView
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

    public static function getCustomView(string $customViewId)
    {
        $customViewsOperations = new CustomViewsOperations();
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetCustomViewParam::module(), "Leads");
        
        $response = $customViewsOperations->getCustomView($customViewId, $paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $customViews = $responseWrapper->getCustomViews();
                
                foreach ($customViews as $customView) {
                    echo("CustomView DisplayValue: " . $customView->getDisplayValue() . "\n");
                    echo("CustomView SystemName: " . $customView->getSystemName() . "\n");
                    
                    $criteria = $customView->getCriteria();
                    
                    if ($criteria != null) {
                        self::printCriteria($criteria);
                    }
                    
                    echo("CustomView SortBy: " . print_r($customView->getSortBy()) . "\n");
                    echo("CustomView Offline: " . $customView->getOffline() . "\n");
                    echo("CustomView Default: " . $customView->getDefault() . "\n");
                    echo("CustomView SystemDefined: " . $customView->getSystemDefined() . "\n");
                    echo("CustomView Name: " . $customView->getName() . "\n");
                    echo("CustomView ID: " . $customView->getId() . "\n");
                    echo("CustomView Category: " . $customView->getCategory() . "\n");
                    
                    $fields = $customView->getFields();
                    
                    if ($fields != null) {
                        foreach ($fields as $field) {
                            print_r($field); echo("\n");
                        }
                    }
                    
                    if ($customView->getFavorite() != null) {
                        echo("CustomView Favorite: " . $customView->getFavorite() . "\n");
                    }
                    
                    if ($customView->getSortOrder() != null) {
                        echo("CustomView SortOrder: " . print_r($customView->getSortOrder()) . "\n");
                    }
                }
                
                $info = $responseWrapper->getInfo();
                
                if ($info != null) {
                    $translation = $info->getTranslation();
                    
                    if ($translation != null) {
                        echo("CustomView Info Translation PublicViews: " . $translation->getPublicViews() . "\n");
                        echo("CustomView Info Translation OtherUsersViews: " . $translation->getOtherUsersViews() . "\n");
                        echo("CustomView Info Translation SharedWithMe: " . $translation->getSharedWithMe() . "\n");
                        echo("CustomView Info Translation CreatedByMe: " . $translation->getCreatedByMe() . "\n");
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
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
    
    private static function printCriteria($criteria)
    {
        if ($criteria->getComparator() != null) {
            echo("CustomView Criteria Comparator: " . $criteria->getComparator(). "\n");
        }
        
        echo("CustomView Criteria Field: " . $criteria->getField()->getAPIName() . "\n");
        
        if ($criteria->getValue() != null) {
            echo("CustomView Criteria Value: " . $criteria->getValue() . "\n");
        }
        
        $criteriaGroup = $criteria->getGroup();
        
        if ($criteriaGroup != null) {
            foreach ($criteriaGroup as $criteria1) {
                self::printCriteria($criteria1);
            }
        }
        
        if ($criteria->getGroupOperator() != null) {
            echo("CustomView Criteria Group Operator: " . $criteria->getGroupOperator()->getValue() . "\n");
        }
    }
}

GetCustomView::initialize();
GetCustomView::getCustomView("1055806000020849005");
