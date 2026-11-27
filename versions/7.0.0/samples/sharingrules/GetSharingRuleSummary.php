<?php
namespace samples\sharingrules;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\sharingrules\SharingRulesOperations;
use com\zoho\crm\api\sharingrules\APIException;
use com\zoho\crm\api\sharingrules\SummaryResponseWrapper;

class GetSharingRuleSummary
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

    public static function getSharingRuleSummary($moduleAPIName)
    {
        $sharingRulesOperations = new SharingRulesOperations($moduleAPIName);
        $response = $sharingRulesOperations->getSharingRuleSummary();
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo $response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n";
                return;
            }
            $responseHandler = $response->getObject();
            if ($responseHandler instanceof SummaryResponseWrapper) {
                $responseWrapper = $responseHandler;
                $rulesSummary = $responseWrapper->getSharingRulesSummary();
                foreach ($rulesSummary as $ruleSummary) {
                    $module = $ruleSummary->getModule();
                    if ($module != null) {
                        echo "SharingRulesSummary Module APIName: " . $module->getAPIName() . PHP_EOL;
                        echo "SharingRulesSummary Module Id: " . $module->getId() . PHP_EOL;
                    }
                    echo "SharingRules RuleComputationStatus: " . $ruleSummary->getRuleComputationStatus() . PHP_EOL;
                    echo "SharingRules RuleCount: " . $ruleSummary->getRuleCount() . PHP_EOL;
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

GetSharingRuleSummary::initialize();
$moduleAPIName = "Leads";
GetSharingRuleSummary::getSharingRuleSummary($moduleAPIName);
