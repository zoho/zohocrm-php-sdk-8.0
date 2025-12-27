<?php
namespace com\zoho\crm\sample\variables;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\variables\APIException;
use com\zoho\crm\api\variables\ResponseWrapper;
use com\zoho\crm\api\variables\VariablesOperations;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\variables\GetVariableByIDParam;

require_once "vendor/autoload.php";

class GetVariableById
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
     * <h3> Get Variable By Id </h3>
     * This method is used to get the details of any specific variable.
     * @param variableId - The ID of the Variable to be obtained
     * @throws Exception
     */
    public static function getVariableById(string $variableId)
    {
        $variablesOperations = new VariablesOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetVariableByIDParam::group(), "1055806000003089001");
        
        $response = $variablesOperations->getVariableById($variableId, $paramInstance);
        
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
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}
GetVariableById::initialize();
GetVariableById::getVariableById("1055806000012448011");
?>