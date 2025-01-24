<?php
namespace samples\massdeletetags;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\massdeletetags\GetStatusParam;
use com\zoho\crm\api\massdeletetags\MassDeleteTagsOperations;
use com\zoho\crm\api\massdeletetags\APIException;
use com\zoho\crm\api\massdeletetags\MassDeleteDetails;
use com\zoho\crm\api\massdeletetags\StatusResponseWrapper;
use com\zoho\crm\api\ParameterMap;

class GetStatus
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

    public static function getStatus()
    {
        $massDeleteTagsOperations = new MassDeleteTagsOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetStatusParam::jobId(), "7272250630001");

        $response = $massDeleteTagsOperations->getStatus($paramInstance);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

            if ($response->isExpected()) {
                $responseHandler = $response->getObject();

                if ($responseHandler instanceof StatusResponseWrapper) {
                    $statusResponseWrapper = $responseHandler;
                    $statusActionResponses = $statusResponseWrapper->getMassDelete();

                    foreach ($statusActionResponses as $statusActionResponse) {
                        if ($statusActionResponse instanceof MassDeleteDetails) {
                            $massDeleteDetail = $statusActionResponse;
                            echo "Status JobId: " . $massDeleteDetail->getJobId() . PHP_EOL;
                            echo "Status TotalCount: " . $massDeleteDetail->getTotalCount() . PHP_EOL;
                            echo "Status FailedCount: " . $massDeleteDetail->getFailedCount() . PHP_EOL;
                            echo "Status DeletedCount: " . $massDeleteDetail->getDeletedCount() . PHP_EOL;
                            echo "Job Status: " . $massDeleteDetail->getStatus()->getValue() . PHP_EOL;
                        } elseif ($statusActionResponse instanceof APIException) {
                            $exception = $statusActionResponse;
                            echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                            echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                            echo "Details: " . PHP_EOL;
                            if ($exception->getDetails() != null) {
                                foreach ($exception->getDetails() as $key => $value) {
                                    echo $key . ": " . $value . PHP_EOL;
                                }
                            }
                            echo "Message: " . $exception->getMessage() . PHP_EOL;
                        }
                    }
                } elseif ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                    echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                    echo "Details: " . PHP_EOL;
                    if ($exception->getDetails() != null) {
                        foreach ($exception->getDetails() as $key => $value) {
                            echo $key . ": " . $value . PHP_EOL;
                        }
                    }
                    echo "Message: " . $exception->getMessage() . PHP_EOL;
                }
            }
        }
    }
}
GetStatus::initialize();
GetStatus::getStatus();