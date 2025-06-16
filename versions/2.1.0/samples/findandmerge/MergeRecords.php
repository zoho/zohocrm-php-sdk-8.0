<?php

namespace samples\findandmerge;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\findandmerge\FindAndMergeOperations;
use com\zoho\crm\api\findandmerge\BodyWrapper;
use com\zoho\crm\api\findandmerge\Merge;
use com\zoho\crm\api\findandmerge\MergeData;
use com\zoho\crm\api\findandmerge\DataFields;
use com\zoho\crm\api\findandmerge\MasterRecordFields;
use com\zoho\crm\api\findandmerge\ActionHandler;
use com\zoho\crm\api\findandmerge\ActionWrapper;
use com\zoho\crm\api\findandmerge\SuccessResponse;
use com\zoho\crm\api\findandmerge\APIException;

require_once "vendor/autoload.php";

class MergeRecords
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
    public static function mergeRecords(string $module, int $masterRecordId)
    {
        $findAndMergeOperations = new FindAndMergeOperations($module, $masterRecordId);
        $request = new BodyWrapper();
        $mergeList = [];
        $merge = new Merge();
        $data = [];
        $data1 = new MergeData();
        $data1->setId(8075972001);
        $fields = [];
        $field = new DataFields();
        $field->setAPIName("Last_Name");
        $fields[] = $field;
        $data1->setFields($fields);
        $data[] = $data1;
        $merge->setData($data);
        $masterRecordFields = [];
        $masterField = new MasterRecordFields();
        $masterField->setAPIName("Company");
        $masterRecordFields[] = $masterField;
        $merge->setMasterRecordFields($masterRecordFields);
        $mergeList[] = $merge;
        $request->setMerge($mergeList);
        $response = $findAndMergeOperations->mergeRecords($request);

        if ($response !== null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if ($response->isExpected()) {
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionResponses = $actionHandler->getMerge();
                    foreach ($actionResponses as $actionResponse) {
                        if ($actionResponse instanceof SuccessResponse) {
                            echo "Status: " . $actionResponse->getStatus()->getValue() . "\n";
                            echo "Code: " . $actionResponse->getCode()->getValue() . "\n";
                            echo "Details:" . "\n";
                            foreach ($actionResponse->getDetails() as $key => $value) {
                                echo $key . ": " . $value . "\n";
                            }
                            echo "Message: " . $actionResponse->getMessage(). "\n";
                        }
                        elseif ($actionResponse instanceof APIException)
                        {
                            echo "Status: " . $actionResponse->getStatus()->getValue() . "\n";
                            echo "Code: " . $actionResponse->getCode()->getValue() . "\n";
                            echo "Details:" . "\n";
                            foreach ($actionResponse->getDetails() as $key => $value) {
                                echo $key . ": " . $value . "\n";
                            }
                            echo "Message: " . $actionResponse->getMessage() . "\n";
                        }
                    }
                } elseif ($actionHandler instanceof APIException) {
                    echo "Status: " . $actionHandler->getStatus()->getValue() . "\n";
                    echo "Code: " . $actionHandler->getCode()->getValue() . "\n";
                    echo "Details:" . "\n";
                    foreach ($actionHandler->getDetails() as $key => $value) {
                        echo $key . ": " . $value . "\n";
                    }
                    echo "Message: " . $actionHandler->getMessage() . "\n";
                }
            }
        }
    }
}

$module = "Leads";
$masterRecordId = 807597597001;
MergeRecords::initialize();;
MergeRecords::mergeRecords($module, $masterRecordId);