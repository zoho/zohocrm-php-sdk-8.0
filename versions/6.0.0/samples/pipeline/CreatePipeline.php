<?php
namespace samples\pipeline;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\pipeline\PipelineOperations;
use com\zoho\crm\api\pipeline\APIException;
use com\zoho\crm\api\pipeline\ActionWrapper;
use com\zoho\crm\api\pipeline\BodyWrapper;
use com\zoho\crm\api\pipeline\Pipeline;
use com\zoho\crm\api\pipeline\Maps;
use com\zoho\crm\api\pipeline\SuccessResponse;

require_once "vendor/autoload.php";

class CreatePipeline
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

    public static function createPipeline($layoutId)
    {
        $pipelineOperations = new PipelineOperations($layoutId);
        $bodyWrapper = new BodyWrapper();
        $pipelines = array();
        
        $pipeline = new Pipeline();
        $pipeline->setDisplayValue("New Sales Pipeline V8");
        $pipeline->setDefault(true);
        
        // Add maps/stages to the pipeline
        $maps = array();
        $map1 = new Maps();
        $map1->setSequenceNumber(3);
        $map1->setId("1055806000000006815");
        $map1->setDisplayValue("Closed Won");
        array_push($maps, $map1);
        
        $pipeline->setMaps($maps);
        
        array_push($pipelines, $pipeline);
        $bodyWrapper->setPipeline($pipelines);
        
        $response = $pipelineOperations->createPipeline($bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getPipeline();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        
                        if ($successResponse->getDetails() != null) {
                            echo("Details: \n");
                            foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                                echo($keyName . " : ");
                                print_r($keyValue);
                                echo("\n");
                            }
                        }
                        echo("Message: " . ($successResponse->getMessage()) . "\n");
                    }
                    else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        
                        if ($exception->getDetails() != null) {
                            echo("Details: \n");
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo($keyName . ": " . $keyValue . "\n");
                            }
                        }
                        echo("Message: " . ($exception->getMessage()->getValue() ?? $exception->getMessage()) . "\n");
                    }
                }
            }
            else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
                echo("Message: " . ($exception->getMessage()->getValue() ?? $exception->getMessage()) . "\n");
            }
        }
    }
}

CreatePipeline::initialize();
$layoutId = "1055806000000091023";
CreatePipeline::createPipeline($layoutId);