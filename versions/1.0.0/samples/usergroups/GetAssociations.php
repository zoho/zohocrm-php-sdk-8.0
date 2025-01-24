<?php
namespace samples\usergroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\usergroups\APIException;
use com\zoho\crm\api\usergroups\AssociationWrapper;
use com\zoho\crm\api\usergroups\UserGroupsOperations;

require_once "vendor/autoload.php";

class GetAssociations
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

	public static function getAssociations(string $groupId)
	{
		$userGroupsOperations = new UserGroupsOperations();
		$response = $userGroupsOperations->getAssociations($groupId);
		if ($response != null) {
			echo ("Status code " . $response->getStatusCode() . "\n");
			if (in_array($response->getStatusCode(), array(204, 304))) {
				echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
				return;
			}
			$responseHandler = $response->getObject();
			if ($responseHandler instanceof AssociationWrapper) {
				$assoicationWrapper = $responseHandler;
				$associations = $assoicationWrapper->getAssociations();
				if ($associations != null) {
					foreach ($associations as $associationResponse) {
						echo ("Associations Type : " . $associationResponse->getType() . "\n");
						$resource = $associationResponse->getResource();
						if ($resource != null) {
							echo ("Associations Resource Id : " . $resource->getId() . "\n");
							echo ("Associations Resource Name : " . $resource->getName() . "\n");
						}
						$detail = $associationResponse->getDetail();
						if ($detail != null) {
							$module = $detail->getModule();
							if ($module != null) {
								echo ("Associations Module Id : " . $module->getId() . "\n");
								echo ("Associations Module Id : " . $module->getAPIName() . "\n");
								echo ("Associations Module Id : " . $module->getModule() . "\n");
							}
						}
					}
				}
			} else if ($responseHandler instanceof APIException) {
				$exception = $responseHandler;
				echo ("Status: " . $exception->getStatus()->getValue() . "\n");
				echo ("Code: " . $exception->getCode()->getValue() . "\n");
				echo ("Details: ");
				foreach ($exception->getDetails() as $key => $value) {
					echo ($key . ": " . $value . "\n");
				}
				echo ("Message : " . $exception->getMessage());
			}
		}
	}
}
$groupId = "347706117236002";
GetAssociations::initialize();
GetAssociations::getAssociations($groupId);
