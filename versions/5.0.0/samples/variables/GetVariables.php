<?php
namespace com\zoho\crm\sample\variables;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\variables\APIException;
use com\zoho\crm\api\variables\ResponseWrapper;
use com\zoho\crm\api\variables\VariablesOperations;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\variables\GetVariablesParam;

require_once "vendor/autoload.php";

class GetVariables
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
     * <h3> Get Variables </h3>
     * This method is used to retrieve all the available variables through an API request and print the response.
     * @throws Exception
     */
    public static function getVariables()
    {
        $variablesOperations = new VariablesOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetVariablesParam::group(), "General");
        
        $response = $variablesOperations->getVariables($paramInstance);
        
        if($response != null)
        {
            echo("Status code " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $variables = $responseWrapper->getVariables();
                
                if($variables != null)
                {
                    foreach($variables as $variable)
                    {	
                        echo("Variable Name: " . $variable->getName() . "\n");
                        echo("Variable APIName: " . $variable->getAPIName() . "\n");
                        echo("Variable ID: " . $variable->getId() . "\n");
                        echo("Variable Type: " . $variable->getType()->getValue() . "\n");
                        echo("Variable Value: " . $variable->getValue() . "\n");
                        echo("Variable Description: " . $variable->getDescription() . "\n");
                        
                        $variableGroup = $variable->getVariableGroup();
                        if($variableGroup != null)
                        {
                            echo("Variable Group Name: " . $variableGroup->getName() . "\n");
                            echo("Variable Group ID: " . $variableGroup->getId() . "\n");
                        }
                    }
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if($exception->getDetails() != null)
                {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) 
                    {
                        echo($keyName . ": " . $keyValue . "\n");
                    }    
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}
GetVariables::initialize();
GetVariables::getVariables();
?>