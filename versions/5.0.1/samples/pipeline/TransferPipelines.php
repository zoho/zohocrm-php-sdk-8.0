<?php
namespace samples\pipeline;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\pipeline\PipelineOperations;
use com\zoho\crm\api\pipeline\APIException;
use com\zoho\crm\api\pipeline\TransferPipelineActionWrapper;
use com\zoho\crm\api\pipeline\TransferPipelineWrapper;
use com\zoho\crm\api\pipeline\TransferPipeline;
use com\zoho\crm\api\pipeline\TPipeline;
use com\zoho\crm\api\pipeline\Stages;
use com\zoho\crm\api\pipeline\TransferPipelineSuccessResponse;

require_once "vendor/autoload.php";

class TransferPipelines
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

    public static function transferPipelines($layoutId)
    {
        $pipelineOperations = new PipelineOperations($layoutId);
        $transferPipelineWrapper = new TransferPipelineWrapper();
        $transferPipelines = array();
        
        $transferPipeline = new TransferPipeline();
        
        $tPipeline = new TPipeline();
        $tPipeline->setFrom("1055806000012019001");
        $tPipeline->setTo("1055806000012232003");
        $transferPipeline->setPipeline($tPipeline);
        
        $stages = array();
        $stage = new Stages();
        $stage->setFrom("1055806000010158002");
        $stage->setTo("1055806000012019001");
        array_push($stages, $stage);
        $transferPipeline->setStages($stages);
        
        array_push($transferPipelines, $transferPipeline);
        $transferPipelineWrapper->setTransferPipeline($transferPipelines);
        
        $response = $pipelineOperations->transferPipelines($transferPipelineWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof TransferPipelineActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getTransferPipeline();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof TransferPipelineSuccessResponse) {
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

TransferPipelines::initialize();
$layoutId = "1055806000000091023";
TransferPipelines::transferPipelines($layoutId);