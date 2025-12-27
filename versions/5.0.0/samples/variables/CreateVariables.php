<?php
namespace com\zoho\crm\sample\variables;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\variables\APIException;
use com\zoho\crm\api\variables\ActionWrapper;
use com\zoho\crm\api\variables\BodyWrapper;
use com\zoho\crm\api\variables\VariablesOperations;
use com\zoho\crm\api\variables\Variable;
use com\zoho\crm\api\variables\SuccessResponse;
use com\zoho\crm\api\variables\VariableGroup;

require_once "vendor/autoload.php";

class CreateVariables
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
     * <h3> Create Variables </h3>
     * This method is used to create a new variable in CRM and print the response.
     * @throws Exception
     */
    public static function createVariables()
    {
        $variablesOperations = new VariablesOperations();
        $request = new BodyWrapper();
        $variableList = array();

        $variable1 = new Variable();
        $variable1->setName("TestVariable");
        $variable1->setAPIName("TestVariable");
        
        $variableGroup = new VariableGroup();
        $variableGroup->setName("General");
        $variableGroup->setId("1055806000003089001");
        $variable1->setVariableGroup($variableGroup);
        
        $variable1->setType(new Choice("integer"));
        $variable1->setValue("42");
        $variable1->setDescription("This denotes test variable description");
        
        array_push($variableList, $variable1);
        $request->setVariables($variableList);
        
        $response = $variablesOperations->createVariables($request);
        
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
                        
                        echo("Details: ");
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                            echo($key . " : " . $value . "\n");
                        }
                        
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
CreateVariables::initialize();
CreateVariables::createVariables();
?>