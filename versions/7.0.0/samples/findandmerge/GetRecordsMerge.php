<?php

namespace samples\findandmerge;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\findandmerge\FindAndMergeOperations;
use com\zoho\crm\api\findandmerge\GetRecordMergeParam;
use com\zoho\crm\api\findandmerge\ResponseWrapper;
use com\zoho\crm\api\findandmerge\APIException;

require_once "vendor/autoload.php";
class GetRecordsMerge
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
    public static function getRecordMerge(string $module, int $masterRecordId)
    {
        $findAndMergeOperations = new FindAndMergeOperations($module, $masterRecordId);
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetRecordMergeParam::jobId(), "80759797001");
        $response = $findAndMergeOperations->getRecordMerge($paramInstance);

        if ($response !== null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if (in_array($response->getStatusCode(), [204, 304])) {
                echo $response->getStatusCode() === 204 ? "No Content" : "Not Modified";
                return;
            }
            $responseHandler = $response->getObject();
            if ($responseHandler instanceof ResponseWrapper) {
                $mergeList = $responseHandler->getMerge();
                foreach ($mergeList as $merge) {
                    echo "RecordMerge JobId: " . $merge->getJobId() . "\n";
                    echo "RecordMerge Status: " . $merge->getStatus() . "\n";
                }
            } elseif ($responseHandler instanceof APIException) {
                echo "Status: " . $responseHandler->getStatus()->getValue() . "\n";
                echo "Code: " . $responseHandler->getCode()->getValue() . "\n";
                echo "Details:" . "\n";
                foreach ($responseHandler->getDetails() as $key => $value) {
                    echo $key . ": " . $value . "\n";
                }
                echo "Message: " . $responseHandler->getMessage()->getValue() . "\n";
            }
        }
    }
}

$module = "Leads";
$masterRecordId = 807597597001;
GetRecordsMerge::initialize();
GetRecordsMerge::getRecordMerge($module, $masterRecordId);
