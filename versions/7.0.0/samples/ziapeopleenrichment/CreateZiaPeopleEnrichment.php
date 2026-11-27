<?php
namespace samples\ziapeopleenrichment;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\ziapeopleenrichment\BodyWrapper;
use com\zoho\crm\api\ziapeopleenrichment\Company;
use com\zoho\crm\api\ziapeopleenrichment\EnrichBasedOn;
use com\zoho\crm\api\ziapeopleenrichment\Social;
use com\zoho\crm\api\ziapeopleenrichment\ZiaPeopleEnrichment;
use com\zoho\crm\api\ziapeopleenrichment\ZiaPeopleEnrichmentOperations;
use com\zoho\crm\api\ziapeopleenrichment\CreateZiaPeopleEnrichmentParam;
use com\zoho\crm\api\ziapeopleenrichment\ActionWrapper;
use com\zoho\crm\api\ziapeopleenrichment\SuccessResponse;
use com\zoho\crm\api\ziapeopleenrichment\APIException;

class CreateZiaPeopleEnrichment
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

    public static function createZiaPeopleEnrichment()
    {
        $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations();
        $request = new BodyWrapper();
        $ziapeopleenrichment = array();

        $ziapeopleenrichment1 = new ZiaPeopleEnrichment();
        $enrichBasedOn = new EnrichBasedOn();
        $enrichBasedOn->setName("zoho");
        $enrichBasedOn->setEmail("sales@zohocorp.com");

        $company = new Company();
        $company->setName("zoho");
        $company->setWebsite("www.zoho.com");
        $enrichBasedOn->setCompany($company);

        $social = new Social();
        $social->setFacebook("facebook.com/zoho");
        $social->setLinkedin("linkedin.com/zoho");
        $social->setTwitter("twitter.com/zoho");
        $enrichBasedOn->setSocial($social);

        $ziapeopleenrichment1->setEnrichBasedOn($enrichBasedOn);
        array_push($ziapeopleenrichment, $ziapeopleenrichment1);
        $request->setZiaPeopleEnrichment($ziapeopleenrichment);

        $paramInstance = new ParameterMap();
        $paramInstance->add(CreateZiaPeopleEnrichmentParam::module(), "Vendors");

        $response = $ziaPeopleEnrichmentOperations->createZiaPeopleEnrichment($request, $paramInstance);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

            if ($response->isExpected()) {
                $actionHandler = $response->getObject();

                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionresponses = $actionWrapper->getZiaPeopleEnrichment();

                    foreach ($actionresponses as $actionresponse) {
                        if ($actionresponse instanceof SuccessResponse) {
                            $successresponse = $actionresponse;
                            echo "Status: " . $successresponse->getStatus()->getValue() . PHP_EOL;
                            echo "Code: " . $successresponse->getCode()->getValue() . PHP_EOL;
                            echo "Details: " . PHP_EOL;
                            foreach ($successresponse->getDetails() as $key => $value) {
                                echo $key . ": " . $value . PHP_EOL;
                            }
                            echo "Message: " . $successresponse->getMessage()->getValue() . PHP_EOL;
                        } elseif ($actionresponse instanceof APIException) {
                            $exception = $actionresponse;
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

CreateZiaPeopleEnrichment::initialize();
CreateZiaPeopleEnrichment::createZiaPeopleEnrichment();
?>