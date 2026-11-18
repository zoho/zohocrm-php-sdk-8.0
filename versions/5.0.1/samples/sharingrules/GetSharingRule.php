<?php
namespace samples\sharingrules;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\sharingrules\SharingRulesOperations;
use com\zoho\crm\api\sharingrules\APIException;
use com\zoho\crm\api\sharingrules\ResponseWrapper;

class GetSharingRule
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

    public static function getSharingRule($id, $moduleAPIName)
    {
        $sharingRulesOperations = new SharingRulesOperations($moduleAPIName);
        $response = $sharingRulesOperations->getSharingRule($id);
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

GetSharingRule::initialize();
$moduleAPIName = "Leads";
$id = "347758001";
GetSharingRule::getSharingRule($id, $moduleAPIName);
