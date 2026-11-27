<?php

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\ActionWrapper;
use com\zoho\crm\api\record\SuccessResponse;

class CloneRecord
{
    public static function initialize()
    {
        $environment = USDataCenter::PRODUCTION();
        $token = (new OAuthBuilder())
            ->clientID("clientId")
            ->clientSecret("clientSecret")
            ->grantToken("grantToken")
            ->build();
        (new InitializeBuilder())
            ->environment($environment)
            ->token($token)
            ->initialize();
    }
    public static function cloneRecord($moduleAPIName, $recordId)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $response = $recordOperations->cloneRecord($recordId);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if ($response->isExpected()) {
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getData();
                    foreach ($actionResponses as $actionResponse) {
                        if ($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo "Status: " . $successResponse->getStatus()->getValue() . "\n";
                            echo "Code: " . $successResponse->getCode()->getValue() . "\n";
                            echo "Details: \n";
                            foreach ($successResponse->getDetails() as $key => $value) {
                                if ($value instanceof DateTime) {
                                    echo $key . ": " . $value->format('Y-m-d') . "\n";
                                } else {
                                    if ($value instanceof \com\zoho\crm\api\users\MinifiedUser) {
                                        echo $key . ": " . $value->getName() . "\n";
                                        echo $key . ": " . $value->getId() . "\n";
                                    } else {
                                        echo $key . ": " . $value . "\n";
                                    }
                                }
                            }
                            echo "Message: " . $successResponse->getMessage()->getValue() . "\n";
                        } elseif ($actionResponse instanceof APIException) {
                            $exception = $actionResponse;
                            echo "Status: " . $exception->getStatus()->getValue() . "\n";
                            echo "Code: " . $exception->getCode()->getValue() . "\n";
                            echo "Details: \n";
                            foreach ($exception->getDetails() as $key => $value) {
                                echo $key . ": " . $value . "\n";
                            }
                            echo "Message: " . $exception->getMessage()->getValue() . "\n";
                        }
                    }
                } elseif ($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . "\n";
                    echo "Code: " . $exception->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . "\n";
                    }
                    echo "Message: " . $exception->getMessage()->getValue() . "\n";
                }
            }
        }
    }
}

CloneRecord::initialize();
$moduleAPIName = "Leads";
$recordId = 7272250521001;
CloneRecord::cloneRecord($moduleAPIName, $recordId);