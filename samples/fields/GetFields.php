<?php
namespace samples\fields;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\fields\FieldsOperations;
use com\zoho\crm\api\fields\GetFieldsParam;
use com\zoho\crm\api\fields\ResponseWrapper;
use com\zoho\crm\api\fields\APIException;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetFields
{
    public static function initialize()
    {
        $environment = INDataCenter::PRODUCTION();
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

    public static function getFields()
    {
        self::initialize();
        
        $fieldsOperations = new FieldsOperations();
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetFieldsParam::module(), "Leads");
        
        $response = $fieldsOperations->getFields($paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $fields = $responseWrapper->getFields();
                
                if ($fields != null) {
                    foreach ($fields as $field) {
                        echo("Field SystemMandatory: ");
                        print_r($field->getSystemMandatory());
                        echo("\n");
                        
                        echo("Field Webhook: " . $field->getWebhook() . "\n");
                        echo("Field JsonType: " . $field->getJsonType() . "\n");
                        
                        $privateInfo = $field->getPrivate();
                        
                        if ($privateInfo != null) {
                            echo("Private Details\n");
                            echo("Field Private Type: " . $privateInfo->getType() . "\n");
                            echo("Field Private Export: " . $privateInfo->getExport() . "\n");
                            echo("Field Private Restricted: " . $privateInfo->getRestricted() . "\n");
                        }
                        
                        $crypt = $field->getCrypt();
                        
                        if ($crypt != null) {
                            echo("Field Crypt Mode: " . $crypt->getMode() . "\n");
                            echo("Field Crypt Column: " . $crypt->getColumn() . "\n");
                            echo("Field Crypt Table: " . $crypt->getTable() . "\n");
                            echo("Field Crypt Status: " . $crypt->getStatus() . "\n");
                        }
                        
                        echo("Field FieldLabel: " . $field->getFieldLabel() . "\n");
                        
                        $tooltip = $field->getTooltip();
                        
                        if ($tooltip != null) {
                            echo("Field ToolTip Name: " . $tooltip->getName() . "\n");
                            echo("Field ToolTip Value: " . $tooltip->getValue() . "\n");
                        }
                        
                        echo("Field CreatedSource: " . $field->getCreatedSource() . "\n");
                        echo("Field FieldReadOnly: " . $field->getFieldReadOnly() . "\n");
                        echo("Field DisplayLabel: " . $field->getDisplayLabel() . "\n");
                        echo("Field ReadOnly: " . $field->getReadOnly() . "\n");
                        
                        echo("Field BusinesscardSupported: " . $field->getBusinesscardSupported() . "\n");
                        echo("Field ID: " . $field->getId() . "\n");
                        
                        if ($field->getCustomField() != null) {
                            echo("Field CustomField: " . $field->getCustomField() . "\n");
                        }
                        
                        $lookup = $field->getLookup();
                        
                        if ($lookup != null) {
                            $module = $lookup->getModule();
							if ($module != null)
							{
								echo("Field ModuleLookup Module APIName: " . $module->getAPIName() . "\n");
								echo("Field ModuleLookup Module Id: " . $module->getId() . "\n");
							}
                            echo("Field Lookup ID: " . $lookup->getId() . "\n");
                        }
                        
                        if ($field->getVisible() != null) {
                            echo("Field Visible: " . $field->getVisible() . "\n");
                        }
                        
                        if ($field->getLength() != null) {
                            echo("Field Length: " . $field->getLength() . "\n");
                        }
                        
                        echo("Field APIName: " . $field->getAPIName() . "\n");
                        echo("Field DataType: " . $field->getDataType() . "\n");
                        
                        if ($field->getDecimalPlace() != null) {
                            echo("Field DecimalPlace: " . $field->getDecimalPlace() . "\n");
                        }
                        
                        echo("Field MassUpdate: " . $field->getMassUpdate() . "\n");
                        
                        $pickListValues = $field->getPickListValues();
                        
                        if ($pickListValues != null) {
                            foreach ($pickListValues as $pickListValue) {
                                echo("Field PickListValue DisplayValue: " . $pickListValue->getDisplayValue() . "\n");
                                echo("Field PickListValue SequenceNumber: " . $pickListValue->getSequenceNumber() . "\n");
                                echo("Field PickListValue ActualValue: " . $pickListValue->getActualValue() . "\n");
                            }
                        }
                        
                        $autoNumber = $field->getAutoNumber();
                        
                        if ($autoNumber != null) {
                            echo("Field AutoNumber Prefix: " . $autoNumber->getPrefix() . "\n");
                            echo("Field AutoNumber Suffix: " . $autoNumber->getSuffix() . "\n");
                            echo("Field AutoNumber StartNumber: " . $autoNumber->getStartNumber() . "\n");
                        }
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                
                foreach ($exception->getDetails() as $key => $value) {
                    echo($key . ": " . $value . "\n");
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetFields::getFields();
