<?php
namespace samples\apis;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\apis\APIsOperations;
use com\zoho\crm\api\apis\APIException;
use com\zoho\crm\api\apis\ResponseWrapper;

class GetSupportedAPI
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

    public static function getSupportedAPI()
    {
        $filters = null;
        $apisOperations = new APIsOperations($filters);
        $response = $apisOperations->getSupportedAPI();

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";

            if ($response->getStatusCode() == 204) {
                echo "No Content\n";
                return;
            }

            if ($response->isExpected()) {
                $responseHandler = $response->getObject();

                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $apis = $responseWrapper->getApis();

                    if ($apis != null) {
                        foreach ($apis as $api) {
                            echo "API Path: " . $api->getPath() . "\n";
                            $operationTypes = $api->getOperationTypes();

                            foreach ($operationTypes as $operationType) {
                                echo "API Operation Method: " . $operationType->getMethod() . "\n";
                                echo "API Operation OAuthScope: " . $operationType->getOauthScope() . "\n";
                                echo "API Operation MaxCredits: " . $operationType->getMaxCredits() . "\n";
                                echo "API Operation MinCredits: " . $operationType->getMinCredits() . "\n";
                            }
                        }
                    }
                } else if ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . "\n";
                    echo "Code: " . $exception->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . "\n";
                    }
                    echo "Message: " . $exception->getMessage() . "\n";
                }
            }
        }
    }
}
GetSupportedAPI::initialize();
GetSupportedAPI::getSupportedAPI();
