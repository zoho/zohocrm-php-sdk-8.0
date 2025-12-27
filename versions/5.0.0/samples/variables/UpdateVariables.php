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

require_once "vendor/autoload.php";

class UpdateVariables
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
     * <h3> Update Variables </h3>
     * This method is used to update details of variables in CRM and print the response.
     * @throws Exception
     */
    public static function updateVariables()
    {
        $variablesOperations = new VariablesOperations();
        $request = new BodyWrapper();
        $variableList = array();

        $variable1 = new Variable();
        $variable1->setId("1055806000020209025");
        $variable1->setValue("4763");
        $variable1->setAPIName("UpdatedVariable");
        
        array_push($variableList, $variable1);
        
        $variable2 = new Variable();
        $variable2->setId("1055806000028328001");
        $variable2->setAPIName("UpdatedVariable2");
        $variable2->setDescription("This is an updated description");
        
        array_push($variableList, $variable2);
        $request->setVariables($variableList);
        
        $response = $variablesOperations->updateVariables($request);
        
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
UpdateVariables::initialize();
UpdateVariables::updateVariables();
?>