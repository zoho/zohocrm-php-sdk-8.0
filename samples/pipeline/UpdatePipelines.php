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
use com\zoho\crm\api\pipeline\SuccessResponse;

require_once "vendor/autoload.php";

class UpdatePipelines
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

    public static function updatePipelines($layoutId)
    {
        $pipelineOperations = new PipelineOperations($layoutId);
        $bodyWrapper = new BodyWrapper();
        $pipelines = array();
        
        $pipeline = new Pipeline();
        $pipeline->setId("1055806000012019001");
        $pipeline->setDisplayValue("Updated Sales Pipeline - V8");
        $pipeline->setDefault(true);
        
        array_push($pipelines, $pipeline);
        $bodyWrapper->setPipeline($pipelines);
        
        $response = $pipelineOperations->updatePipelines($bodyWrapper);
        
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

UpdatePipelines::initialize();
$layoutId = "1055806000000091023";
UpdatePipelines::updatePipelines($layoutId);