<?php
namespace samples\src\com\zoho\crm\api\role;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\roles\DeleteRoleParam;
use com\zoho\crm\api\roles\RolesOperations;
use com\zoho\crm\api\roles\ActionWrapper;
use com\zoho\crm\api\roles\APIException;
use com\zoho\crm\api\roles\SuccessResponse;

require_once "vendor/autoload.php";

class DeleteRole
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

	public static function deleteRole(string $roleId)
	{
		$rolesOperations = new RolesOperations();
		$paramInstance = new ParameterMap();
		$paramInstance->add(DeleteRoleParam::transferToId(), "34770610001199001");
		
		$response = $rolesOperations->deleteRole($roleId, $paramInstance);
		
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