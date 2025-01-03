<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\ActionWrapper;
use com\zoho\crm\api\record\BodyWrapper;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\SuccessResponse;
use com\zoho\crm\api\record\{Leads};
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\record\Record;

require_once "vendor/autoload.php";

class UpsertRecords
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

    public static function upsertRecords(string $moduleAPIName)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $request = new BodyWrapper();
        $records = array();
        $record1 = new Record();
        /*
         * Call addFieldValue method that takes two arguments
         * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
         * 2 -> Value
         */
        $record1->addFieldValue(Leads::City(), "City");
        $record1->addFieldValue(Leads::LastName(), "Last Name");
        $record1->addFieldValue(Leads::FirstName(), "First Name");
        $record1->addFieldValue(Leads::Company(), "Company1");
        /*
         * Call addKeyValue method that takes two arguments
         * 1 -> A string that is the Field's API Name
         * 2 -> Value
         */
        $record1->addKeyValue("Custom_field", "Value");
        $record1->addKeyValue("Custom_field_2", "value");
        //Add Record instance to the list
        array_push($records, $record1);
        $record2 = new Record();
        /*
         * Call addFieldValue method that takes two arguments
         * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
         * 2 -> Value
         */
        $record2->addFieldValue(Leads::City(), "City");
        $record2->addFieldValue(Leads::LastName(), "Last Name");
        $record2->addFieldValue(Leads::FirstName(), "First Name");
        $record2->addFieldValue(Leads::Company(), "Company12");
        /*
         * Call addKeyValue method that takes two arguments
         * 1 -> A string that is the Field's API Name
         * 2 -> Value
         */
        $record2->addKeyValue("Custom_field", "Value");
        $record2->addKeyValue("Custom_field_2", "value");
        $record2->addKeyValue("External", "External1");
        //Add Record instance to the list
        array_push($records, $record2);
        $duplicateCheckFields = array("City", "Last_Name", "First_Name");
        $request->setDuplicateCheckFields($duplicateCheckFields);
        $request->setData($records);
        $headerInstance = new HeaderMap();
        // $headerInstance->add(UpsertRecordsHeader::XEXTERNAL(), "Leads.External");
        //Call UpsertRecordsHeader method that takes BodyWrapper instance as parameter.
        $response = $recordOperations->upsertRecords($request, $headerInstance);
        if ($response != null) {
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            if ($response->isExpected()) {
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getData();
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
                            echo ("Message: " . ($successResponse->getMessage() instanceof Choice ? $successResponse->getMessage()->getValue() : $successResponse->getMessage()) . "\n");
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
$moduleAPIName = "leads";
UpsertRecords::initialize();
UpsertRecords::upsertRecords($moduleAPIName);
