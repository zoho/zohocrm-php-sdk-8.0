<?php
namespace samples\datasharing;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\datasharing\DataSharingOperations;
use com\zoho\crm\api\datasharing\APIException;
use com\zoho\crm\api\datasharing\ResponseWrapper;

class GetDataSharing
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

    public static function getDataSharing()
    {
        $dataSharingOperations = new DataSharingOperations();
        $response = $dataSharingOperations->getDataSharing();
        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if ($response->isExpected()) {
                $responseHandler = $response->getObject();
                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $dataSharing = $responseWrapper->getDataSharing();
                    foreach ($dataSharing as $dataSharing1) {
                        echo "DataSharing PublicInPortals: " . $dataSharing1->getPublicInPortals() . "\n";
                        echo "DataSharing ShareType: " . $dataSharing1->getShareType()->getValue() . "\n";
                        $module = $dataSharing1->getModule();
                        if ($module != null) {
                            echo "DataSharing Module APIName: " . $module->getAPIName() . "\n";
                            echo "DataSharing Module Id: " . $module->getId() . "\n";
                        }
                        echo "DataSharing RuleComputationRunning: " . $dataSharing1->getRuleComputationRunning() . "\n";
                    }
                } else if ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
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

GetDataSharing::initialize();
GetDataSharing::getDataSharing();