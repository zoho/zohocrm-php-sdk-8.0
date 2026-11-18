<?php
namespace samples\ziapeopleenrichment;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ziapeopleenrichment\ZiaPeopleEnrichmentOperations;
use com\zoho\crm\api\ziapeopleenrichment\ResponseWrapper;
use com\zoho\crm\api\ziapeopleenrichment\APIException;
use com\zoho\crm\api\ParameterMap;

class GetZiaPeopleEnrichments
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

    public static function getZiaPeopleEnrichments()
    {
        $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations();
        $paramInstance = new ParameterMap();
        $response = $ziaPeopleEnrichmentOperations->getZiaPeopleEnrichments($paramInstance);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

            if ($response->getStatusCode() == 204) {
                echo "No Content" . PHP_EOL;
                return;
            }

            if ($response->isExpected()) {
                $responseHandler = $response->getObject();

                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $ziaPeopleEnrichments = $responseWrapper->getZiaPeopleEnrichment();

                    if ($ziaPeopleEnrichments != null) {
                        foreach ($ziaPeopleEnrichments as $ziaPeopleEnrichment) {
                            echo "CreatedTime: " . $ziaPeopleEnrichment->getCreatedTime() . PHP_EOL;
                            echo "Id: " . $ziaPeopleEnrichment->getId() . PHP_EOL;

                            $user = $ziaPeopleEnrichment->getCreatedBy();
                            if ($user != null) {
                                echo "User Id: " . $user->getId() . PHP_EOL;
                                echo "User Name: " . $user->getName() . PHP_EOL;
                            }

                            echo "Status: " . $ziaPeopleEnrichment->getStatus() . PHP_EOL;
                        }
                    }

                    $info = $responseWrapper->getInfo();
                    if ($info != null) {
                        if ($info->getPerPage() != null) {
                            echo "Info PerPage: " . $info->getPerPage() . PHP_EOL;
                        }
                        if ($info->getCount() != null) {
                            echo "Info Count: " . $info->getCount() . PHP_EOL;
                        }
                        if ($info->getPage() != null) {
                            echo "Info Page: " . $info->getPage() . PHP_EOL;
                        }
                        if ($info->getMoreRecords() != null) {
                            echo "Info MoreRecords: " . $info->getMoreRecords() . PHP_EOL;
                        }
                    }
                } elseif ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
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

GetZiaPeopleEnrichments::initialize();
GetZiaPeopleEnrichments::getZiaPeopleEnrichments()
    ?>