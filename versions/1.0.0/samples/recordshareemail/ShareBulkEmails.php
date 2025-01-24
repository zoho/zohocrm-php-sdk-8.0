<?php
namespace samples\recordshareemail;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\recordshareemail\APIException;
use com\zoho\crm\api\recordshareemail\ActionWrapper;
use com\zoho\crm\api\recordshareemail\RecordShareEmailOperations;
use com\zoho\crm\api\recordshareemail\SuccessResponse;
use com\zoho\crm\api\recordshareemail\BodyWrapper;

require_once "vendor/autoload.php";

class ShareBulkEmails
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

    public static function shareBulkEmails($moduleAPIName)
    {
        $recordShareEmailOperations = new RecordShareEmailOperations($moduleAPIName);
        $request = new BodyWrapper();
        $request->setIds(["34770623", "34770020"]);
        $response = $recordShareEmailOperations->shareBulkEmails($request);
        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode();
            if ($response->isExpected()) {
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getData();
                    foreach ($actionResponses as $actionResponse) {
                        if ($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo "Status: " . $successResponse->getStatus()->getValue() . PHP_EOL;
                            echo "Code: " . $successResponse->getCode()->getValue() . PHP_EOL;
                            echo "Details: " . PHP_EOL;
                            foreach ($successResponse->getDetails() as $key => $value) {
                                echo $key . ": " . $value . PHP_EOL;
                            }
                            echo "Message: " . $successResponse->getMessage() . PHP_EOL;
                        } elseif ($actionResponse instanceof APIException) {
                            $exception = $actionResponse;
                            echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                            echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                            echo "Details: " . PHP_EOL;
                            foreach ($exception->getDetails() as $key => $value) {
                                echo $key . ": " . $value . PHP_EOL;
                            }
                            echo "Message: " . $exception->getMessage()->getValue() . PHP_EOL;
                        }
                    }
                } elseif ($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                    echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                    echo "Details: " . PHP_EOL;
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . PHP_EOL;
                    }
                    echo "Message: " . $exception->getMessage() . PHP_EOL;
                }
            }
        }
    }
}

ShareBulkEmails::initialize();
ShareBulkEmails::shareBulkEmails("Leads");