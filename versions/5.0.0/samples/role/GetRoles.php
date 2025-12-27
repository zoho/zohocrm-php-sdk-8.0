<?php
namespace samples\src\com\zoho\crm\api\role;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\roles\APIException;
use com\zoho\crm\api\roles\ResponseWrapper;
use com\zoho\crm\api\roles\RolesOperations;

require_once "vendor/autoload.php";

class GetRoles
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
	public static function getRoles()
	{
		$rolesOperations = new RolesOperations();
		$response = $rolesOperations->getRoles();
		
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
				$roles = $responseWrapper->getRoles();
				
				foreach($roles as $role)
				{
					echo("Role DisplayLabel: " . $role->getDisplayLabel() . "\n");
					echo("Role Name: " . $role->getName() . "\n");
					echo("Role ID: " . $role->getId() . "\n");
					echo("Role AdminUser: " . $role->getAdminUser() . "\n");
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
GetRoles::initialize();
GetRoles::getRoles();
?>