<?php
namespace samples\datasharing;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\datasharing\DataSharingOperations;
use com\zoho\crm\api\datasharing\APIException;
use com\zoho\crm\api\datasharing\ActionWrapper;
use com\zoho\crm\api\datasharing\DataSharing;
use com\zoho\crm\api\datasharing\BodyWrapper;
use com\zoho\crm\api\datasharing\SuccessResponse;
use com\zoho\crm\api\datasharing\Module;
use com\zoho\crm\api\util\Choice;

class UpdateDataSharing
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

    public static function updateDataSharing()
    {
        $dataSharingOperations = new DataSharingOperations();
        $request = new BodyWrapper();
        $dataSharing = [];
        $dataSharing1 = new DataSharing();
        $dataSharing1->setShareType(new Choice("private"));
        $module = new Module();
        $module->setAPIName("Leads");
        $module->setId("3477002175");
        $dataSharing1->setModule($module);
        array_push($dataSharing, $dataSharing1);
        $request->setDataSharing($dataSharing);
        $response = $dataSharingOperations->updateDataSharing($request);
        if ($response != null) {
            //Get the status code from response
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            if ($response->isExpected()) {
                //Get object from response
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getDataSharing();
                    foreach ($actionResponses as $actionResponse) {
                        if ($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");
                            echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                            echo ("Details: ");
                            foreach ($successResponse->getDetails() as $key => $value) {
                                echo ($key . " : ");
                                print_r($value);
                                echo ("\n");
                            }
                            echo ("Message: " . $successResponse->getMessage() . "\n");
                        } else if ($actionResponse instanceof APIException) {
                            $exception = $actionResponse;
                            echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                            echo ("Code: " . $exception->getCode()->getValue() . "\n");
                            echo ("Details: ");
                            foreach ($exception->getDetails() as $key => $value) {
                                echo ($key . " : " . $value . "\n");
                            }
                            echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                        }
                    }
                } else if ($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo ($key . " : " . $value . "\n");
                    }
                    echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}

UpdateDataSharing::initialize();
UpdateDataSharing::updateDataSharing();