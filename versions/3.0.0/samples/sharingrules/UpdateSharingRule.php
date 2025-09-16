<?php
namespace samples\sharingrules;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\sharingrules\SharingRulesOperations;
use com\zoho\crm\api\sharingrules\APIException;
use com\zoho\crm\api\sharingrules\ActionWrapper;
use com\zoho\crm\api\sharingrules\SharingRules;
use com\zoho\crm\api\sharingrules\BodyWrapper;
use com\zoho\crm\api\sharingrules\SuccessResponse;
use com\zoho\crm\api\sharingrules\Shared;
use com\zoho\crm\api\sharingrules\Resource;
use com\zoho\crm\api\sharingrules\Criteria;
use com\zoho\crm\api\util\Choice;

class UpdateSharingRule
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

    public static function updateSharingRule($id, $moduleAPIName)
    {
        $sharingRulesOperations = new SharingRulesOperations($moduleAPIName);
        $request = new BodyWrapper();
        $sharingRules = [];
        $sharingRule = new SharingRules();

        $sharingRule->setType(new Choice("Record_Owner_Based"));
        $sharedFrom = new Shared();
        $resource = new Resource();
        $resource->setId("347706002");
        $sharedFrom->setResource($resource);
        $sharedFrom->setType(new Choice("groups"));
        $sharedFrom->setSubordinates(false);
        $sharingRule->setSharedFrom($sharedFrom);

        // $sharingRule->setType(new Choice("Criteria_Based"));
        // $criteria = new Criteria();
        // $criteria->setComparator("equal");
        // $fieldClass = "com\zoho\crm\api\sharingrules\Field";
        // $field = new $fieldClass();
        // $field->setAPIName("Wizard");
        // $field->setId("11111195003");
        // $criteria->setField($field);
        // $value = [];
        // $value["name"] = "TestWizards";
        // $value["id"] = "111111095001";
        // $criteria->setValue([$value]);
        // $sharingRule->setCriteria($criteria);

        $sharingRule->setSuperiorsAllowed(false);

        $sharedTo = new Shared();
        $resource = new Resource();
        $resource->setId("34736002");
        $sharedTo->setResource($resource);
        $sharedTo->setType(new Choice("groups"));
        $sharedTo->setSubordinates(false);
        $sharingRule->setSharedTo($sharedTo);

        $sharingRule->setPermissionType(new Choice("read_write_delete"));
        $sharingRule->setName("TestJavaSDK1");

        array_push($sharingRules, $sharingRule);
        $request->setSharingRules($sharingRules);
        $response = $sharingRulesOperations->updateSharingRule($id, $request);
        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            $actionHandler = $response->getObject();
            if ($actionHandler instanceof ActionWrapper) {
                $responseWrapper = $actionHandler;
                $actionResponses = $responseWrapper->getSharingRules();
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo ("Details: ");
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo ($key . " : " . $value . "\n");
                        }
                        echo ("Message: " . $successResponse->getMessage()->getValue()) . "\n";
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo ("Code: " . $exception->getCode()->getValue() . "\n");
                        echo ("Details: ");
                        if ($exception->getDetails() != null) {
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo $keyName . ": ";
                                print_r($keyValue);
                                echo "\n";
                            }
                        }
                        echo ("Message : " . $exception->getMessage()->getValue() . "\n");
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                if ($exception->getDetails() != null) {
                    echo ("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo ($keyName . ": " . $keyValue . "\n");
                    }
                }
                echo ("Message : " . $exception->getMessage());
            }
        }
    }
}

UpdateSharingRule::initialize();
$moduleAPIName = "Leads";
$id = "3477001";
UpdateSharingRule::updateSharingRule($id, $moduleAPIName);
