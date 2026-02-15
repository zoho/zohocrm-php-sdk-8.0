<?php
namespace samples\inventorytemplates;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\inventorytemplates\InventoryTemplatesOperations;
use com\zoho\crm\api\inventorytemplates\ResponseWrapper;
use com\zoho\crm\api\inventorytemplates\APIException;

require_once "vendor/autoload.php";

class GetInventoryTemplate
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

    public static function getInventoryTemplate(string $templateId)
    {
        $inventoryTemplatesOperations = new InventoryTemplatesOperations();
        $response = $inventoryTemplatesOperations->getInventoryTemplate($templateId);
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
                $inventoryTemplates = $responseWrapper->getInventoryTemplates();
                foreach($inventoryTemplates as $inventoryTemplate)
                {
                    echo("InventoryTemplate ID: " . $inventoryTemplate->getId() . "\n");
                    echo("InventoryTemplate Name: " . $inventoryTemplate->getName() . "\n");
                    echo("InventoryTemplate CreatedTime: "); print_r($inventoryTemplate->getCreatedTime()); echo("\n");
                    echo("InventoryTemplate ModifiedTime: "); print_r($inventoryTemplate->getModifiedTime()); echo("\n");
                    echo("InventoryTemplate LastUsageTime: "); print_r($inventoryTemplate->getLastUsageTime()); echo("\n");
                    echo("InventoryTemplate EditorMode: " . $inventoryTemplate->getEditorMode() . "\n");
                    echo("InventoryTemplate Category: " . $inventoryTemplate->getCategory() . "\n");
                    echo("InventoryTemplate Active: "); print_r($inventoryTemplate->getActive()); echo("\n");
                    echo("InventoryTemplate Favorite: "); print_r($inventoryTemplate->getFavorite()); echo("\n");
                    echo("InventoryTemplate Content: " . $inventoryTemplate->getContent() . "\n");
                    echo("InventoryTemplate MailContent: " . $inventoryTemplate->getMailContent() . "\n");
                    
                    $folder = $inventoryTemplate->getFolder();
                    if($folder != null)
                    {
                        echo("InventoryTemplate Folder Id: " . $folder->getId(). "\n");
                        echo("InventoryTemplate Folder Name: " . $folder->getName(). "\n");
                    }
                    
                    $module = $inventoryTemplate->getModule();
                    if($module != null)
                    {
                        echo("InventoryTemplate Module Name : " . $module->getAPIName() . "\n");
                        echo("InventoryTemplate Module Id : " . $module->getId() . "\n");
                    }
                    
                    $createdBy = $inventoryTemplate->getCreatedBy();
                    if($createdBy != null)
                    {
                        echo("InventoryTemplate Created By User-ID: " . $createdBy->getId(). "\n");
                        echo("InventoryTemplate Created By User-Name: " . $createdBy->getName(). "\n");
                    }
                    
                    $modifiedBy = $inventoryTemplate->getModifiedBy();
                    if($modifiedBy != null)
                    {
                        echo("InventoryTemplate Modified By User-ID: " . $modifiedBy->getId(). "\n");
                        echo("InventoryTemplate Modified By User-Name: " . $modifiedBy->getName(). "\n");
                    }
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: " );
                if($exception->getDetails() != null)
                {
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

GetInventoryTemplate::initialize();
$templateId = "1055806000000174003"; // Replace with actual template ID
GetInventoryTemplate::getInventoryTemplate($templateId);