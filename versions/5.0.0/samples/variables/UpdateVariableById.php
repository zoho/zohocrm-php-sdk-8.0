<?php
namespace com\zoho\crm\sample\variables;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\variables\APIException;
use com\zoho\crm\api\variables\ActionWrapper;
use com\zoho\crm\api\variables\BodyWrapper;
use com\zoho\crm\api\variables\VariablesOperations;
use com\zoho\crm\api\variables\Variable;
use com\zoho\crm\api\variables\SuccessResponse;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class UpdateVariableById
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

    /**
     * <h3> Update Variable By Id </h3>
     * This method is used to update details of a specific variable in CRM and print the response.
     * @param variableId - The ID of the Variable to be updated
     * @throws Exception
     */
    public static function updateVariableById(string $variableId)
    {
        $variablesOperations = new VariablesOperations();
        $request = new BodyWrapper();
        $variableList = array();
        $paramInstance = new ParameterMap();

        $variable1 = new Variable();
        $variable1->setAPIName("UpdatedTestAPIName");
        
        array_push($variableList, $variable1);
        $request->setVariables($variableList);
        
        $response = $variablesOperations->updateVariableById($variableId, $request, $paramInstance);
        
        if($response != null)
        {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if($actionHandler instanceof ActionWrapper)
            {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getVariables();
                
                foreach($actionResponses as $actionResponse)
                {
                    if($actionResponse instanceof SuccessResponse)
                    {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Message: " . $successResponse->getMessage() . "\n");
                    }
                    else if($actionResponse instanceof APIException)
                    {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            }
            else if($actionHandler instanceof APIException)
            {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}
UpdateVariableById::initialize();
UpdateVariableById::updateVariableById("1055806000028328001");