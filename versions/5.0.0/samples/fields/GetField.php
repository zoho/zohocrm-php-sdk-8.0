<?php
namespace samples\fields;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\fields\FieldsOperations;
use com\zoho\crm\api\fields\GetFieldParam;
use com\zoho\crm\api\fields\ResponseWrapper;
use com\zoho\crm\api\fields\APIException;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetField
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

    public static function getField(string $fieldId)
    {
        self::initialize();
        
        $fieldsOperations = new FieldsOperations();
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetFieldParam::module(), "Leads");
        
        $response = $fieldsOperations->getField($fieldId, $paramInstance);
        
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
                    
                    $associationDetails = $field->getAssociationDetails();
                    
                    if ($associationDetails != null) {
                        $lookupField = $associationDetails->getLookupField();
                        if ($lookupField != null) {
                            echo("AssociationDetails LookupField ID: " . $lookupField->getId() . "\n");
                            echo("AssociationDetails LookupField Name: " . $lookupField->getName() . "\n");
                        }
                        
                        $relatedField = $associationDetails->getRelatedField();
                        if ($relatedField != null) {
                            echo("AssociationDetails RelatedField ID: " . $relatedField->getId() . "\n");
                            echo("AssociationDetails RelatedField Name: " . $relatedField->getName() . "\n");
                        }
                    }
                    
                    if ($field->getQuickSequenceNumber() != null) {
                        echo("Field QuickSequenceNumber: " . $field->getQuickSequenceNumber() . "\n");
                    }
                    
                    echo("Field BusinesscardSupported: " . $field->getBusinesscardSupported() . "\n");
                    
                    $multiModuleLookup = $field->getMultiModuleLookup();
                    
                    if ($multiModuleLookup != null) {
                        echo("Field MultiModuleLookup: " . json_encode($multiModuleLookup) . "\n");
                    }
                    
                    $currency = $field->getCurrency();
                    
                    if ($currency != null) {
                        echo("Field Currency RoundingOption: " . $currency->getRoundingOption() . "\n");
                        echo("Field Currency Precision: " . $currency->getPrecision() . "\n");
                    }
                    
                    echo("Field ID: " . $field->getId() . "\n");
                    
                    if ($field->getCustomField() != null) {
                        echo("Field CustomField: " . $field->getCustomField() . "\n");
                    }
                    
                    $lookup = $field->getLookup();
                    
                    if ($lookup != null) {
                        echo("Field Lookup Module: " . $lookup->getModule() . "\n");
                        echo("Field Lookup ID: " . $lookup->getId() . "\n");
                    }
                    
                    if ($field->getVisible() != null) {
                        echo("Field Visible: " . $field->getVisible() . "\n");
                    }
                    
                    if ($field->getLength() != null) {
                        echo("Field Length: " . $field->getLength() . "\n");
                    }
                    
                    $viewType = $field->getViewType();
                    
                    if ($viewType != null) {
                        echo("Field ViewType View: " . $viewType->getView() . "\n");
                        echo("Field ViewType Edit: " . $viewType->getEdit() . "\n");
                        echo("Field ViewType Create: " . $viewType->getCreate() . "\n");
                        echo("Field ViewType QuickCreate: " . $viewType->getQuickCreate() . "\n");
                    }
                    
                    echo("Field APIName: " . $field->getAPIName() . "\n");
                    
                    $unique = $field->getUnique();
                    
                    if ($unique != null) {
                        echo("Field Unique Casesensitive: " . $unique->getCasesensitive() . "\n");
                    }
                    
                    if ($field->getHistoryTracking() != null) {
                        echo("Field HistoryTracking: " . $field->getHistoryTracking() . "\n");
                    }
                    
                    echo("Field DataType: " . $field->getDataType() . "\n");
                    
                    $formula = $field->getFormula();
                    
                    if ($formula != null) {
                        echo("Field Formula ReturnType: " . $formula->getReturnType() . "\n");
                        echo("Field Formula Expression: " . $formula->getExpression() . "\n");
                    }
                    
                    if ($field->getDecimalPlace() != null) {
                        echo("Field DecimalPlace: " . $field->getDecimalPlace() . "\n");
                    }
                    
                    echo("Field MassUpdate: " . $field->getMassUpdate() . "\n");
                    
                    if ($field->getBlueprintSupported() != null) {
                        echo("Field BlueprintSupported: " . $field->getBlueprintSupported() . "\n");
                    }
                    
                    $multiselectlookup = $field->getMultiselectlookup();
                    
                    if ($multiselectlookup != null) {
                        echo("Field Multiselectlookup Module: " . $multiselectlookup->getModule() . "\n");
                        echo("Field Multiselectlookup ID: " . $multiselectlookup->getId() . "\n");
                    }
                    
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
                    
                    if ($field->getDefaultValue() != null) {
                        echo("Field DefaultValue: " . $field->getDefaultValue() . "\n");
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

GetField::getField("1055806000000002609");
