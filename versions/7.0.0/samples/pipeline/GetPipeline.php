<?php
namespace samples\pipeline;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\pipeline\PipelineOperations;
use com\zoho\crm\api\pipeline\APIException;
use com\zoho\crm\api\pipeline\ResponseWrapper;

require_once "vendor/autoload.php";

class GetPipeline
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

    public static function getPipeline($layoutId, $pipelineId)
    {
        $pipelineOperations = new PipelineOperations($layoutId);
        $response = $pipelineOperations->getPipeline($pipelineId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $pipelines = $responseWrapper->getPipeline();
                
                foreach ($pipelines as $pipeline) {
                    echo("Pipeline DisplayValue: " . $pipeline->getDisplayValue() . "\n");
                    echo("Pipeline ActualValue: " . $pipeline->getActualValue() . "\n");
                    echo("Pipeline Id: " . $pipeline->getId() . "\n");
                    echo("Pipeline Default: ");
                    print_r($pipeline->getDefault());
                    echo("\n");
                    echo("Pipeline Child Available: ");
                    print_r($pipeline->getChildAvailable());
                    echo("\n");
                    
                    $parent = $pipeline->getParent();
                    if ($parent != null) {
                        echo("Pipeline Parent Id: " . $parent->getId() . "\n");
                    }
                    
                    $maps = $pipeline->getMaps();
                    if ($maps != null) {
                        foreach ($maps as $map) {
                            echo("Map DisplayValue: " . $map->getDisplayValue() . "\n");
                            echo("Map ActualValue: " . $map->getActualValue() . "\n");
                            echo("Map Id: " . $map->getId() . "\n");
                            echo("Map SequenceNumber: " . $map->getSequenceNumber() . "\n");
                            
                            $forecastCategory = $map->getForecastCategory();
                            if ($forecastCategory != null) {
                                echo("Map ForecastCategory Name: " . $forecastCategory->getName() . "\n");
                                echo("Map ForecastCategory Id: " . $forecastCategory->getId() . "\n");
                            }
                        }
                    }
                }
            }
            else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
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

GetPipeline::initialize();
$layoutId = "1055806000000091023";
$pipelineId = "1055806000029044005";
GetPipeline::getPipeline($layoutId, $pipelineId);