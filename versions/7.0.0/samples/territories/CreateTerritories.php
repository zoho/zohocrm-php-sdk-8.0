<?php
namespace samples\territories;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\territories\APIException;
use com\zoho\crm\api\territories\ActionWrapper;
use com\zoho\crm\api\territories\TerritoriesOperations;
use com\zoho\crm\api\territories\BodyWrapper;
use com\zoho\crm\api\territories\Territories;
use com\zoho\crm\api\territories\SuccessResponse;

require_once "vendor/autoload.php";

class CreateTerritories
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
     * <h3> Create Territories </h3>
     * This method is used to create territories and print the response.
     * @throws Exception
     */
    public static function createTerritories()
    {
        $territoriesOperations = new TerritoriesOperations();
        
        $bodyWrapper = new BodyWrapper();
        $territories = array();
        
        $territory = new Territories();
        $territory->setName("New Territory");
        $territory->setDescription("Territory created via API");
        
        array_push($territories, $territory);
        $bodyWrapper->setTerritories($territories);
        
        $response = $territoriesOperations->createTerritories($bodyWrapper);
        
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
CreateTerritories::initialize();
CreateTerritories::createTerritories();