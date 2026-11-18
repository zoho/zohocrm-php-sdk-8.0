<?php
namespace samples\territories;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\territories\APIException;
use com\zoho\crm\api\territories\ActionWrapper;
use com\zoho\crm\api\territories\TerritoriesOperations;
use com\zoho\crm\api\territories\BodyWrapper;
use com\zoho\crm\api\territories\SuccessResponse;
use com\zoho\crm\api\territories\Territories;

require_once "vendor/autoload.php";

class UpdateTerritory
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
     * <h3> Update Territory </h3>
     * This method is used to update a single territory and print the response.
     * @param territoryId - The ID of the Territory to be updated
     * @throws Exception
     */
    public static function updateTerritory(string $territoryId)
    {
        $territoriesOperations = new TerritoriesOperations();
        
        $bodyWrapper = new BodyWrapper();
        $territories = array();
        
        $territory = new Territories();
        $territory->setName("Updated Territory");
        $territory->setDescription("Updated via single territory API");
        
        array_push($territories, $territory);
        $bodyWrapper->setTerritories($territories);
        
        $response = $territoriesOperations->updateTerritory($territoryId, $bodyWrapper);
        
        if($response != null)
        {
            echo("Status code " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if($actionHandler instanceof ActionWrapper)
            {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getTerritories();
                
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
                        echo("Details: ");
                        foreach($exception->getDetails() as $key => $value)
                        {
                            echo($key . " : " . $value . "\n");
                        }
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            }
            else if($actionHandler instanceof APIException)
            {
                $exception = $actionHandler;
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
UpdateTerritory::initialize();
UpdateTerritory::updateTerritory("3477061000001004801");