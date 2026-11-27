<?php
namespace samples\duplicatecheckpreference;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\duplicatecheckpreference\APIException;
use com\zoho\crm\api\duplicatecheckpreference\DuplicateCheckPreferenceOperations;
use com\zoho\crm\api\duplicatecheckpreference\ResponseWrapper;

class GetDuplicateCheckPreference
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

    public static function getDuplicateCheckPreference($moduleAPIName)
    {
        $duplicateCheckPreferenceOperations = new DuplicateCheckPreferenceOperations($moduleAPIName);
        $response = $duplicateCheckPreferenceOperations->getDuplicateCheckPreference();

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
                    $duplicateCheckPreference = $responseWrapper->getDuplicateCheckPreference();

                    echo "DuplicateCheckPreference Type: " . $duplicateCheckPreference->getType()->getValue() . "\n";
                    $typeConfigurations = $duplicateCheckPreference->getTypeConfigurations();

                    if ($typeConfigurations != null) {
                        foreach ($typeConfigurations as $typeConfiguration) {
                            $mappedModule = $typeConfiguration->getMappedModule();
                            if ($mappedModule != null) {
                                echo "DuplicateCheckPreference TypeConfiguration MappedModule Id: " . $mappedModule->getId() . "\n";
                                echo "DuplicateCheckPreference TypeConfiguration MappedModule Name: " . $mappedModule->getName() . "\n";
                                echo "DuplicateCheckPreference TypeConfiguration MappedModule APIName: " . $mappedModule->getAPIName() . "\n";
                            }

                            $fieldMappings = $typeConfiguration->getFieldMappings();
                            if ($fieldMappings != null) {
                                foreach ($fieldMappings as $fieldMapping) {
                                    $currentField = $fieldMapping->getCurrentField();
                                    if ($currentField != null) {
                                        echo "DuplicateCheckPreference TypeConfiguration FieldMappings CurrentField Id: " . $currentField->getId() . "\n";
                                        echo "DuplicateCheckPreference TypeConfiguration FieldMappings CurrentField Name: " . $currentField->getName() . "\n";
                                        echo "DuplicateCheckPreference TypeConfiguration FieldMappings CurrentField APIName: " . $currentField->getAPIName() . "\n";
                                    }

                                    $mappedField = $fieldMapping->getMappedField();
                                    if ($mappedField != null) {
                                        echo "DuplicateCheckPreference TypeConfiguration FieldMappings MappedField Id: " . $mappedField->getId() . "\n";
                                        echo "DuplicateCheckPreference TypeConfiguration FieldMappings MappedField Name: " . $mappedField->getName() . "\n";
                                        echo "DuplicateCheckPreference TypeConfiguration FieldMappings MappedField APIName: " . $mappedField->getAPIName() . "\n";
                                    }
                                }
                            }
                        }
                    }
                } elseif ($responseHandler instanceof APIException) {
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

GetDuplicateCheckPreference::initialize();
$moduleAPIName = "Leads";
GetDuplicateCheckPreference::getDuplicateCheckPreference($moduleAPIName);
