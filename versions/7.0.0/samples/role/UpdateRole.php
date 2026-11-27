<?php
namespace samples\src\com\zoho\crm\api\role;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\roles\BodyWrapper;
use com\zoho\crm\api\roles\Role;
use com\zoho\crm\api\roles\RolesOperations;
use com\zoho\crm\api\roles\ActionWrapper;
use com\zoho\crm\api\roles\APIException;
use com\zoho\crm\api\roles\SuccessResponse;

require_once "vendor/autoload.php";

class UpdateRole
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
	public static function updateRole(string $roleId)
	{
		$rolesOperations = new RolesOperations();
		$bodyWrapper = new BodyWrapper();
		$roles = array();
		
		$role = new Role();
		$role->setName("Updated Single Role");
		$role->setDisplayLabel("Updated Single Role Display");
		$role->setDescription("Updated single role description");
		$role->setShareWithPeers(true);
		
		array_push($roles, $role);
		$bodyWrapper->setRoles($roles);
		
		$response = $rolesOperations->updateRole($roleId, $bodyWrapper);
		
		if($response != null)
		{
			echo("Status code " . $response->getStatusCode() . "\n");
			
			$actionHandler = $response->getObject();
			
			if($actionHandler instanceof ActionWrapper)
			{
				$actionWrapper = $actionHandler;
				$actionResponses = $actionWrapper->getRoles();
				
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
		}
	}
}
?>