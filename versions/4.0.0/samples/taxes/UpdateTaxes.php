<?php
namespace samples\taxes;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\taxes\ActionWrapper;
use com\zoho\crm\api\taxes\APIException;
use com\zoho\crm\api\taxes\BodyWrapper;
use com\zoho\crm\api\taxes\OrgTax;
use com\zoho\crm\api\taxes\Preference;
use com\zoho\crm\api\taxes\TaxesOperations;
use com\zoho\crm\api\taxes\Tax;
use com\zoho\crm\api\taxes\SuccessResponse;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class UpdateTaxes
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

    public static function updateTaxes()
    {
        $taxesOperations = new TaxesOperations();
        $request = new BodyWrapper();
        $orgTax = new OrgTax();
        //List of Tax instances
        $taxList = array();

        /** update tax */
        $tax1 = new Tax();
        $tax1->setId("3477779001");
        $tax1->setName("MyTax435");
        $tax1->setSequenceNumber(1);
        $tax1->setValue(15.0);
        array_push($taxList, $tax1);

        /** create tax */
        $tax2 = new Tax();
        $tax2->setName("New Tax");
        $tax2->setSequenceNumber(1);
        $tax2->setValue(15.0);
        array_push($taxList, $tax2);

        /** delete tax */
        $tax3 = new Tax();
        $tax3->setId("34770619001");
        $tax3->setDelete(null);
        array_push($taxList, $tax3);

        $orgTax->setTaxes($taxList);
        $preference = new Preference();
        $preference->setAutoPopulateTax(false);
        $preference->setModifyTaxRates(false);
        $orgTax->setPreference($preference);
        $request->setOrgTaxes($orgTax);
        //Call updateTaxes method that takes BodyWrapper instance as parameter
        $response = $taxesOperations->updateTaxes($request);
        if ($response != null) {
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            $actionHandler = $response->getObject();
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponse = $actionWrapper->getOrgTaxes();
                if ($actionResponse instanceof SuccessResponse) {
                    $successResponse = $actionResponse;
                    echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");
                    echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                    if ($successResponse->getDetails() != null) {
                        echo ("Details: ");
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo ($key . " : ");
                            print_r($value);
                            echo ("\n");
                        }
                    }
                    echo ("Message: " . ($successResponse->getMessage() instanceof Choice ? $successResponse->getMessage()->getValue() : $successResponse->getMessage()) . "\n");
                } else if ($actionResponse instanceof APIException) {
                    $exception = $actionResponse;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo ($key . " : ");
                        print_r($value);
                        echo ("\n");
                    }
                    echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                echo ("Details: ");
                foreach ($exception->getDetails() as $key => $value) {
                    echo ($key . " : " . $value . "\n");
                }
                echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()));
            }
        }
    }
}
UpdateTaxes::initialize();
UpdateTaxes::updateTaxes();
