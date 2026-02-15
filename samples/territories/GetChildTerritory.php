<?php
namespace samples\territories;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\territories\APIException;
use com\zoho\crm\api\territories\ResponseWrapper;
use com\zoho\crm\api\territories\TerritoriesOperations;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetChildTerritory
{
    public static function initialize()
    {
        $environment = USDataCenter::PRODUCTION();
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
     * <h3> Get Child Territory </h3>
     * This method is used to get child territories and print the response.
     * @param territoryId - The ID of the parent Territory
     * @throws Exception
     */
    public static function getChildTerritory(string $territoryId)
    {
        $territoriesOperations = new TerritoriesOperations();
        $paramInstance = new ParameterMap();
        
        $response = $territoriesOperations->getChildTerritory($territoryId, $paramInstance);
        
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
                $territoryList = $responseWrapper->getTerritories();

                if($territoryList != null)
                {
                    foreach($territoryList as $territory)
                    {
                        echo("Child Territory ID: " . $territory->getId() . "\n");
                        echo("Child Territory Name: " . $territory->getName() . "\n");
                        echo("Child Territory Parent ID: " . $territory->getParentId() . "\n");
                        echo("Child Territory Description: " . $territory->getDescription() . "\n");
                        
                        $manager = $territory->getManager();
                        if($manager != null)
                        {
                            echo("Territory Manager User-Name: " . $manager->getName() . "\n");
                        }
                    }
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                foreach($exception->getDetails() as $key => $value)
                {
                    echo($key . " : " . $value . "\n");
                }
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}
GetChildTerritory::initialize();
GetChildTerritory::getChildTerritory("3477061000001004801");