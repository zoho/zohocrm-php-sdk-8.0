<?php
namespace samples\ziaorgenrichment;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ziaorgenrichment\BodyWrapper;
use com\zoho\crm\api\ziaorgenrichment\CreateZiaOrgEnrichmentParam;
use com\zoho\crm\api\ziaorgenrichment\EnrichBasedOn;
use com\zoho\crm\api\ziaorgenrichment\ZiaOrgEnrichment;
use com\zoho\crm\api\ziaorgenrichment\ZiaOrgEnrichmentOperations;
use com\zoho\crm\api\ziaorgenrichment\APIException;
use com\zoho\crm\api\ziaorgenrichment\ActionWrapper;
use com\zoho\crm\api\ziaorgenrichment\SuccessResponse;
use com\zoho\crm\api\ParameterMap;

class CreateZiaOrgEnrichment
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

    public static function createZiaOrgEnrichment()
    {
        $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
        $request = new BodyWrapper();
        $ziaOrgEnrichmentList = [];
        $ziaOrgEnrichment1 = new ZiaOrgEnrichment();
        $enrichBasedOn = new EnrichBasedOn();
        $enrichBasedOn->setName("zoho");
        $enrichBasedOn->setEmail("sales@zohocorp.com");
        $enrichBasedOn->setWebsite("www.zoho.com");
        $ziaOrgEnrichment1->setEnrichBasedOn($enrichBasedOn);
        array_push($ziaOrgEnrichmentList, $ziaOrgEnrichment1);
        $request->setZiaOrgEnrichment($ziaOrgEnrichmentList);

        $paramInstance = new ParameterMap();
        $paramInstance->add(CreateZiaOrgEnrichmentParam::MODULE(), "Leads");

        $response = $ziaOrgEnrichmentOperations->createZiaOrgEnrichment($request, $paramInstance);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if ($response->isExpected()) {
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getZiaOrgEnrichment();
                    foreach ($actionResponses as $actionResponse) {
                        if ($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo "Status: " . $successResponse->getStatus()->getValue() . "\n";
                            echo "Code: " . $successResponse->getCode()->getValue() . "\n";
                            echo "Details: \n";
                            foreach ($successResponse->getDetails() as $key => $value) {
                                echo $key . ": " . $value . "\n";
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
                            echo "Message: " . $exception->getMessage() . "\n";
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
                    echo "Message: " . $exception->getMessage() . "\n";
                }
            }
        }
    }
}

CreateZiaOrgEnrichment::initialize();
CreateZiaOrgEnrichment::createZiaOrgEnrichment();