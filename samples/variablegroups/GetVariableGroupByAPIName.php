<?php
namespace com\zoho\crm\sample\variablegroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\variablegroups\APIException;
use com\zoho\crm\api\variablegroups\ResponseWrapper;
use com\zoho\crm\api\variablegroups\VariableGroupsOperations;

require_once "vendor/autoload.php";

class GetVariableGroupByAPIName
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
     * <h3> Get Variable Group By APIName </h3>
     * This method is used to get the details of variable group by API name and print the response.
     * @param variableGroupName - The API name of the VariableGroup to be obtained
     * @throws Exception
     */
    public static function getVariableGroupByAPIName(string $variableGroupName)
    {
        $variableGroupsOperations = new VariableGroupsOperations();
        $response = $variableGroupsOperations->getVariableGroupByAPIName($variableGroupName);
        
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
                $variableGroups = $responseWrapper->getVariableGroups();

                if($variableGroups != null)
                {
                    foreach($variableGroups as $variableGroup)
                    {	
                        echo("VariableGroup DisplayLabel: " . $variableGroup->getDisplayLabel() . "\n");
                        echo("VariableGroup APIName: " . $variableGroup->getAPIName() . "\n");
                        echo("VariableGroup Name: " . $variableGroup->getName() . "\n");
                        echo("VariableGroup Description: " . $variableGroup->getDescription() . "\n");
                        echo("VariableGroup ID: " . $variableGroup->getId() . "\n");
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
GetVariableGroupByAPIName::initialize();
GetVariableGroupByAPIName::getVariableGroupByAPIName("General");