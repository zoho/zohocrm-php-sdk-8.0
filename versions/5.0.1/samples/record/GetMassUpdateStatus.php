<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\MassUpdate;
use com\zoho\crm\api\record\MassUpdateResponseWrapper;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\GetMassUpdateStatusParam;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class GetMassUpdateStatus
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

    public static function getMassUpdateStatus(string $moduleAPIName, string $jobId)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetMassUpdateStatusParam::jobId(), $jobId);
        $response = $recordOperations->getMassUpdateStatus($paramInstance);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            if ($response->isExpected()) {
                $massUpdateResponseHandler = $response->getObject();
                if ($massUpdateResponseHandler instanceof MassUpdateResponseWrapper) {
                    $massUpdateResponseWrapper = $massUpdateResponseHandler;
                    $massUpdateResponses = $massUpdateResponseWrapper->getData();
                    foreach ($massUpdateResponses as $massUpdateResponse) {
                        if ($massUpdateResponse instanceof MassUpdate) {
                            $massUpdate = $massUpdateResponse;
                            echo ("MassUpdate Status: " . $massUpdate->getStatus()->getValue() . "\n");
                            echo ("MassUpdate FailedCount: " . $massUpdate->getFailedCount() . "\n");
                            echo ("MassUpdate UpdatedCount: " . $massUpdate->getUpdatedCount() . "\n");
                            echo ("MassUpdate NotUpdatedCount: " . $massUpdate->getNotUpdatedCount() . "\n");
                            echo ("MassUpdate TotalCount: " . $massUpdate->getTotalCount() . "\n");
                        } else if ($massUpdateResponse instanceof APIException) {
                            $exception = $massUpdateResponse;
                            echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                            echo ("Code: " . $exception->getCode()->getValue() . "\n");
                            if ($exception->getDetails() != null) {
                                echo ("Details: ");
                                foreach ($exception->getDetails() as $keyName => $keyValue) {
                                    echo ($keyName . ": " . $keyValue . "\n");
                                }
                            }
                            echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                        }
                    }
                } else if ($massUpdateResponseHandler instanceof APIException) {
                    $exception = $massUpdateResponseHandler;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    if ($exception->getDetails() != null) {
                        echo ("Details: ");
                        foreach ($exception->getDetails() as $keyName => $keyValue) {
                            echo ($keyName . ": " . $keyValue . "\n");
                        }
                    }
                    echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}
$moduleAPIName = "leads";
$jobId = "34770615177002";
GetMassUpdateStatus::initialize();
GetMassUpdateStatus::getMassUpdateStatus($moduleAPIName, $jobId);
