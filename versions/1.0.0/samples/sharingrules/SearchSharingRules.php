<?php
namespace samples\sharingrules;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\sharingrules\SharingRulesOperations;
use com\zoho\crm\api\sharingrules\APIException;
use com\zoho\crm\api\sharingrules\ResponseWrapper;
use com\zoho\crm\api\sharingrules\SearchSharingRulesParam;
use com\zoho\crm\api\sharingrules\FiltersBody;
use com\zoho\crm\api\sharingrules\Field;
use com\zoho\crm\api\sharingrules\Criteria;

class SearchSharingRules
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

    public static function searchSharingRules($moduleAPIName)
    {
        $sharingRulesOperations = new SharingRulesOperations($moduleAPIName);
        $paramInstance = new ParameterMap();
        $paramInstance->add(SearchSharingRulesParam::page(), 1);
        $paramInstance->add(SearchSharingRulesParam::perPage(), 10);
        $filtersBody = new FiltersBody();
        $criteria = new Criteria();
        $criteria->setGroupOperator("and");
        $group = [];

        $groupCriteria1 = new Criteria();
        $field1 = new Field();
        $field1->setAPIName("shared_from.type");
        $groupCriteria1->setField($field1);
        $groupCriteria1->setValue('${EMPTY}');
        $groupCriteria1->setComparator("equal");
        array_push($group, $groupCriteria1);


        $groupCriteria2 = new Criteria();
        $field2 = new Field();
        $field2->setAPIName("superiors_allowed");
        $groupCriteria2->setField($field2);
        $groupCriteria2->setValue("false");
        $groupCriteria2->setComparator("equal");
        array_push($group, $groupCriteria2);

        $groupCriteria3 = new Criteria();
        $field3 = new Field();
        $field3->setAPIName("status");
        $groupCriteria3->setField($field3);
        $groupCriteria3->setValue("active");
        $groupCriteria3->setComparator("equal");
        array_push($group, $groupCriteria3);


        $groupCriteria4 = new Criteria();
        $groupCriteria4->setGroupOperator("or");

        $group4 = [];

        $group4Criteria1 = new Criteria();
        $group4Criteria1->setGroupOperator("and");

        $group41 = [];

        $group41Criteria1 = new Criteria();
        $group41Criteria1field1 = new Field();
        $group41Criteria1field1->setAPIName("shared_to.resource.id");
        $group41Criteria1->setField($group41Criteria1field1);
        $group41Criteria1->setValue(["1111078", "111117098"]);
        $group41Criteria1->setComparator("in");
        array_push($group41, $group41Criteria1);

        $group41Criteria2 = new Criteria();
        $group41Criteria1field2 = new Field();
        $group41Criteria1field2->setAPIName("shared_to.type");
        $group41Criteria2->setField($group41Criteria1field2);
        $group41Criteria2->setValue("groups");
        $group41Criteria2->setComparator("equal");
        array_push($group41, $group41Criteria2);

        $group4Criteria1->setGroup($group41);
        array_push($group4, $group4Criteria1);


        $group4Criteria2 = new Criteria();
        $group4Criteria2->setGroupOperator("and");

        $group42 = [];

        $group42Criteria1 = new Criteria();
        $group42Criteria1field1 = new Field();
        $group42Criteria1field1->setAPIName("shared_to.resource.id");
        $group42Criteria1->setField($group42Criteria1field1);
        $group42Criteria1->setValue(["111117078", "111198"]);
        $group42Criteria1->setComparator("in");
        array_push($group42, $group42Criteria1);

        $group42Criteria2 = new Criteria();
        $group42Criteria1field2 = new Field();
        $group42Criteria1field2->setAPIName("shared_to.type");
        $group42Criteria2->setField($group42Criteria1field2);
        $group42Criteria2->setValue("roles");
        $group42Criteria2->setComparator("equal");
        array_push($group42, $group42Criteria2);

        $group4Criteria2->setGroup($group42);
        array_push($group4, $group4Criteria2);

        $groupCriteria4->setGroup($group4);
        array_push($group, $groupCriteria4);

        $criteria->setGroup($group);

        $filtersBody->setFilters([$criteria]);
        $response = $sharingRulesOperations->searchSharingRules($filtersBody, $paramInstance);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo $response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n";
                return;
            }
            $responseHandler = $response->getObject();
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $sharingRules = $responseWrapper->getSharingRules();
                foreach ($sharingRules as $sharingRule) {
                    $module = $sharingRule->getModule();
                    if ($module != null) {
                        echo "SharingRules Module APIName: " . $module->getAPIName() . PHP_EOL;
                        echo "SharingRules Module Name: " . $module->getName() . PHP_EOL;
                        echo "SharingRules Module Id: " . $module->getId() . PHP_EOL;
                    }
                    echo "SharingRules SuperiorsAllowed: " . $sharingRule->getSuperiorsAllowed() . PHP_EOL;
                    echo "SharingRules Type: " . $sharingRule->getType()->getValue() . PHP_EOL;
                    $sharedTo = $sharingRule->getSharedTo();
                    if ($sharedTo != null) {
                        $resource = $sharedTo->getResource();
                        if ($resource != null) {
                            echo "SharingRules SharedTo Resource Name: " . $resource->getName() . PHP_EOL;
                            echo "SharingRules SharedTo Resource Id: " . $resource->getId() . PHP_EOL;
                        }
                        echo "SharingRules SharedTo Type: " . $sharedTo->getType()->getValue() . PHP_EOL;
                        echo "SharingRules SharedTo Subordinates: " . print_r($sharedTo->getSubordinates()) . PHP_EOL;
                    }

                    $sharedFrom = $sharingRule->getSharedFrom();
                    if ($sharedFrom != null) {
                        $resource = $sharedFrom->getResource();
                        if ($resource != null) {
                            echo "SharingRules SharedFrom Resource Name: " . $resource->getName() . PHP_EOL;
                            echo "SharingRules SharedFrom Resource Id: " . $resource->getId() . PHP_EOL;
                        }
                        echo "SharingRules SharedFrom Type: " . $sharedFrom->getType()->getValue() . PHP_EOL;
                        echo "SharingRules SharedFrom Subordinates: " . print_r($sharedFrom->getSubordinates()) . PHP_EOL;
                    }

                    echo "SharingRules PermissionType: " . $sharingRule->getPermissionType()->getValue() . PHP_EOL;
                    echo "SharingRules Name: " . $sharingRule->getName() . PHP_EOL;
                    echo "SharingRules Id: " . $sharingRule->getId() . PHP_EOL;
                    echo "SharingRules Status: " . $sharingRule->getStatus()->getValue() . PHP_EOL;
                    echo "SharingRules MatchLimitExceeded: " . $sharingRule->getMatchLimitExceeded() . PHP_EOL;
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                echo ("Details: ");
                foreach ($exception->getDetails() as $key => $value) {
                    echo ($key . " : " . $value . "\n");
                }
                echo "Message : " . $exception->getMessage()->getValue() . "\n";
            }
        }
    }
}

SearchSharingRules::initialize();
$moduleAPIName = "Leads";
SearchSharingRules::searchSharingRules($moduleAPIName);
