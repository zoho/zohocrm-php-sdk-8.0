<?php
namespace samples\features;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\features\APIException;
use com\zoho\crm\api\features\FeaturesOperations;
use com\zoho\crm\api\features\ResponseWrapper;

class GetDataEnrichment
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

    public static function getDataEnrichment()
    {
        $featuresOperations = new FeaturesOperations();
        $response = $featuresOperations->getDataEnrichment();

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

            if (in_array($response->getStatusCode(), [204, 304])) {
                echo $response->getStatusCode() == 204 ? "No Content" : "Not Modified";
                return;
            }

            if ($response->isExpected()) {
                $responseHandler = $response->getObject();

                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $features = $responseWrapper->getFeatures();

                    if ($features != null) {
                        foreach ($features as $feature) {
                            $components = $feature->getComponents();

                            if ($components != null) {
                                foreach ($components as $component) {
                                    echo "Feature Component APIName : " . $component->getAPIName() . PHP_EOL;
                                    echo "Feature Component ModuleSupported : " . $component->getModuleSupported() . PHP_EOL;

                                    $detail = $component->getDetails();

                                    if ($detail != null) {
                                        $limit = $detail->getLimits();

                                        if ($limit != null) {
                                            echo "Feature Component Detail Limit EditionLimit: " . $limit->getEditionLimit() . PHP_EOL;
                                            echo "Feature Component Detail Limit Total: " . $limit->getTotal() . PHP_EOL;
                                        }

                                        $usedCount = $detail->getUsedCount();

                                        if ($usedCount != null) {
                                            echo "Feature Component Detail UsedCount EditionLimit: " . $usedCount->getEditionLimit() . PHP_EOL;
                                            echo "Feature Component Detail UsedCount Total: " . $usedCount->getTotal() . PHP_EOL;
                                        }
                                    }

                                    echo "Feature Component FeatureLabel : " . $component->getFeatureLabel() . PHP_EOL;
                                }
                            }

                            echo "Feature APIName : " . $feature->getAPIName() . PHP_EOL;

                            $parentFeature = $feature->getParentFeature();

                            if ($parentFeature != null) {
                                echo "Feature ParentFeature APIName: " . $parentFeature->getAPIName() . PHP_EOL;
                            }

                            echo "Feature ModuleSupported : " . $feature->getModuleSupported() . PHP_EOL;

                            $detail = $feature->getDetails();

                            if ($detail != null) {
                                $limit = $detail->getLimits();

                                if ($limit != null) {
                                    echo "Feature Detail Limit EditionLimit: " . $limit->getEditionLimit() . PHP_EOL;
                                    echo "Feature Detail Limit Total: " . $limit->getTotal() . PHP_EOL;
                                }

                                $usedCount = $detail->getUsedCount();

                                if ($usedCount != null) {
                                    echo "Feature Component Detail UsedCount EditionLimit: " . $usedCount->getEditionLimit() . PHP_EOL;
                                    echo "Feature Component Detail UsedCount Total: " . $usedCount->getTotal() . PHP_EOL;
                                }
                            }

                            echo "Feature FeatureLabel : " . $feature->getFeatureLabel() . PHP_EOL;
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
GetDataEnrichment::initialize();
GetDataEnrichment::getDataEnrichment();
