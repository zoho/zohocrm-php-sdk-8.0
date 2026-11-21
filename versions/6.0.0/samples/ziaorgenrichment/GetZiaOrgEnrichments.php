<?php
namespace samples\ziaorgenrichment;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\ziaorgenrichment\ZiaOrgEnrichmentOperations;
use com\zoho\crm\api\ziaorgenrichment\ResponseWrapper;
use com\zoho\crm\api\ziaorgenrichment\APIException;

class GetZiaOrgEnrichments
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

    public static function getZiaOrgEnrichments()
    {
        $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
        $paramInstance = new ParameterMap();
        $response = $ziaOrgEnrichmentOperations->getZiaOrgEnrichments($paramInstance);

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
                    $ziaOrgEnrichments = $responseWrapper->getZiaOrgEnrichment();

                    if ($ziaOrgEnrichments != null) {
                        foreach ($ziaOrgEnrichments as $ziaOrgEnrichment) {
                            echo "ZiaOrgEnrichment CreatedTime : " . $ziaOrgEnrichment->getCreatedTime() . PHP_EOL;
                            echo "ZiaOrgEnrichment Id : " . $ziaOrgEnrichment->getId() . PHP_EOL;

                            $user = $ziaOrgEnrichment->getCreatedBy();
                            if ($user != null) {
                                echo "ZiaOrgEnrichment User Id : " . $user->getId() . PHP_EOL;
                                echo "ZiaOrgEnrichment User Name : " . $user->getName() . PHP_EOL;
                            }

                            echo "ZiaOrgEnrichment Status : " . $ziaOrgEnrichment->getStatus() . PHP_EOL;
                        }
                    }

                    $info = $responseWrapper->getInfo();
                    if ($info != null) {
                        if ($info->getPerPage() != null) {
                            echo "ZiaOrgEnrichment Info PerPage: " . $info->getPerPage() . PHP_EOL;
                        }
                        if ($info->getCount() != null) {
                            echo "ZiaOrgEnrichment Info Count: " . $info->getCount() . PHP_EOL;
                        }
                        if ($info->getPage() != null) {
                            echo "ZiaOrgEnrichment Info Page: " . $info->getPage() . PHP_EOL;
                        }
                        if ($info->getMoreRecords() != null) {
                            echo "ZiaOrgEnrichment Info MoreRecords: " . $info->getMoreRecords() . PHP_EOL;
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

GetZiaOrgEnrichments::initialize();
GetZiaOrgEnrichments::getZiaOrgEnrichments();
