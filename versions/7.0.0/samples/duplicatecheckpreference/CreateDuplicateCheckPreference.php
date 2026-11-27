<?php
namespace samples\duplicatecheckpreference;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\duplicatecheckpreference\TypeConfiguration;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\duplicatecheckpreference\BodyWrapper;
use com\zoho\crm\api\duplicatecheckpreference\CurrentField;
use com\zoho\crm\api\duplicatecheckpreference\DuplicateCheckPreference;
use com\zoho\crm\api\duplicatecheckpreference\DuplicateCheckPreferenceOperations;
use com\zoho\crm\api\duplicatecheckpreference\FieldMappings;
use com\zoho\crm\api\duplicatecheckpreference\MappedField;
use com\zoho\crm\api\duplicatecheckpreference\MappedModule;
use com\zoho\crm\api\duplicatecheckpreference\ActionWrapper;
use com\zoho\crm\api\duplicatecheckpreference\SuccessResponse;
use com\zoho\crm\api\duplicatecheckpreference\APIException;
use com\zoho\crm\api\util\Choice;

class CreateDuplicateCheckPreference
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

    public static function createDuplicateCheckPreference($moduleAPIName)
    {
        $duplicateCheckPreferenceOperations = new DuplicateCheckPreferenceOperations($moduleAPIName);
        $request = new BodyWrapper();

        $duplicateCheckPreference = new DuplicateCheckPreference();
        $duplicateCheckPreference->setType(new Choice("converted_records"));

        $typeConfigurations = [];
        $typeConfiguration = new TypeConfiguration();

        $mappedModule = new MappedModule();
        $mappedModule->setId("347700002175");
        $mappedModule->setAPIName("Leads");
        $typeConfiguration->setMappedModule($mappedModule);

        $fieldMappings = [];
        $fieldMapping = new FieldMappings();

        $currentField = new CurrentField();
        $currentField->setId("34770606570001");
        $currentField->setAPIName("Email_1");
        $fieldMapping->setCurrentField($currentField);

        $mappedField = new MappedField();
        $mappedField->setId("3477023537018");
        $mappedField->setAPIName("Email_2");
        $fieldMapping->setMappedField($mappedField);

        $fieldMappings[] = $fieldMapping;
        $typeConfiguration->setFieldMappings($fieldMappings);

        $typeConfigurations[] = $typeConfiguration;
        $duplicateCheckPreference->setTypeConfigurations($typeConfigurations);

        $request->setDuplicateCheckPreference($duplicateCheckPreference);

        $response = $duplicateCheckPreferenceOperations->createDuplicateCheckPreference($request);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";

            if ($response->isExpected()) {
                $actionHandler = $response->getObject();

                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponse = $actionWrapper->getDuplicateCheckPreference();

                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo "Status: " . $successResponse->getStatus()->getValue() . "\n";
                        echo "Code: " . $successResponse->getCode()->getValue() . "\n";
                        echo "Details: \n";

                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo $key . ": " . $value . "\n";
                        }

                        echo "Message: " . $successResponse->getMessage() . "\n";
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
                } elseif ($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
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

CreateDuplicateCheckPreference::initialize();
$moduleAPIName = "Leads";
CreateDuplicateCheckPreference::createDuplicateCheckPreference($moduleAPIName);