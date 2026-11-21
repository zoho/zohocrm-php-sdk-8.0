<?php
namespace samples\layouts;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\layouts\LayoutsOperations;
use com\zoho\crm\api\layouts\GetLayoutsParam;
use com\zoho\crm\api\layouts\ResponseWrapper;
use com\zoho\crm\api\layouts\APIException;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetLayouts
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

    public static function getLayouts(string $moduleAPIName)
    {
        self::initialize();
        
        $layoutsOperations = new LayoutsOperations();
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetLayoutsParam::module(), $moduleAPIName);
        
        $response = $layoutsOperations->getLayouts($paramInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $layouts = $responseWrapper->getLayouts();
                
                foreach ($layouts as $layout) {
                    if ($layout->getCreatedTime() != null) {
                        echo("Layout CreatedTime: ");
                        print_r($layout->getCreatedTime());
                        echo("\n");
                    }
                    
                    if ($layout->getConvertMapping() != null) {
                        foreach ($layout->getConvertMapping() as $key => $value) {
                            echo($key . " : ");
                            print_r($value);
                            echo("\n");
                        }
                    }
                    
                    echo("Layout ModifiedTime: ");
                    print_r($layout->getModifiedTime());
                    echo("\n");
                    
                    echo("Layout Visible: " . $layout->getVisible() . "\n");
                    
                    $createdFor = $layout->getCreatedFor();
                    if ($createdFor != null) {
                        echo("Layout CreatedFor User-Name: " . $createdFor->getName() . "\n");
                        echo("Layout CreatedFor User-ID: " . $createdFor->getId() . "\n");
                    }
                    
                    echo("Layout Name: " . $layout->getName() . "\n");
                    
                    $modifiedBy = $layout->getModifiedBy();
                    if ($modifiedBy != null) {
                        echo("Layout ModifiedBy User-Name: " . $modifiedBy->getName() . "\n");
                        echo("Layout ModifiedBy User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    
                    $profiles = $layout->getProfiles();
                    if ($profiles != null) {
                        foreach ($profiles as $profile) {
                            echo("Layout Profile Default: " . $profile->getDefault() . "\n");
                            echo("Layout Profile Name: " . $profile->getName() . "\n");
                            echo("Layout Profile ID: " . $profile->getId() . "\n");
                        }
                    }
                    
                    echo("Layout ID: " . $layout->getId() . "\n");
                    
                    $createdBy = $layout->getCreatedBy();
                    if ($createdBy != null) {
                        echo("Layout CreatedBy User-Name: " . $createdBy->getName() . "\n");
                        echo("Layout CreatedBy User-ID: " . $createdBy->getId() . "\n");
                    }
                    
                    $sections = $layout->getSections();
                    if ($sections != null) {
                        foreach ($sections as $section) {
                            echo("Section DisplayLabel: " . $section->getDisplayLabel() . "\n");
                            echo("Section SequenceNumber: " . $section->getSequenceNumber() . "\n");
                            echo("Section APIName: " . $section->getAPIName() . "\n");
                            
                            $fields = $section->getFields();
                            if ($fields != null) {
                                foreach ($fields as $field) {
                                    echo("Field SystemMandatory: " . $field->getSystemMandatory() . "\n");
                                    echo("Field Webhook: " . $field->getWebhook() . "\n");
                                    echo("Field FieldLabel: " . $field->getFieldLabel() . "\n");
                                    echo("Field APIName: " . $field->getAPIName() . "\n");
                                    echo("Field DataType: " . $field->getDataType() . "\n");
                                    echo("Field ID: " . $field->getId() . "\n");
                                }
                            }
                        }
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
        }
    }
}

GetLayouts::getLayouts("Leads");
