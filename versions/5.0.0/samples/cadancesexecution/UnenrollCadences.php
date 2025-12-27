<?php
namespace samples\cadancesexecution;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\cadencesexecution\CadencesExecutionOperations;
use com\zoho\crm\api\cadencesexecution\BodyWrapper;
use com\zoho\crm\api\cadencesexecution\ActionWrapper;
use com\zoho\crm\api\cadencesexecution\SuccessResponse;
use com\zoho\crm\api\cadencesexecution\APIException;

class UnenrollCadences
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

    public static function unenrollCadences($moduleAPIName)
    {
        $cadencesExecutionOperations = new CadencesExecutionOperations();
        $request = new BodyWrapper();
        $cadencesIds = ["34770785001"];
        $request->setCadencesIds($cadencesIds);
        $ids = ["347750001"];
        $request->setIds($ids);

        $response = $cadencesExecutionOperations->unenrollCadences($moduleAPIName, $request);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

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
                            echo "Message: " . $exception->getMessage() . PHP_EOL;
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

UnenrollCadences::initialize();
$moduleAPIName = "Leads";
UnenrollCadences::unenrollCadences($moduleAPIName);