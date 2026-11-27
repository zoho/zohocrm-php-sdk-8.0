<?php
namespace samples\callpreferences;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\callpreferences\APIException;
use com\zoho\crm\api\callpreferences\ActionWrapper;
use com\zoho\crm\api\callpreferences\CallPreferencesOperations;
use com\zoho\crm\api\callpreferences\BodyWrapper;
use com\zoho\crm\api\callpreferences\CallPreferences;
use com\zoho\crm\api\callpreferences\SuccessResponse;

require_once "vendor/autoload.php";

class UpdateCallPreference
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

	public static function updateCallPreference()
	{
		$callPreferencesOperations = new CallPreferencesOperations();
		$bodyWrapper = new BodyWrapper();
		$callPreferences = new CallPreferences();
		$callPreferences->setShowFromNumber(true);
		$callPreferences->setShowToNumber(true);
		$bodyWrapper->setCallPreferences($callPreferences);
		$response = $callPreferencesOperations->updateCallPreference($bodyWrapper);
		if ($response != null) {
			echo "Status Code: " . $response->getStatusCode();
			if ($response->isExpected()) {
				$actionHandler = $response->getObject();
				if ($actionHandler instanceof ActionWrapper) {
					$actionWrapper = $actionHandler;
					$actionResponse = $actionWrapper->getCallPreferences();
					if ($actionResponse instanceof SuccessResponse) {
						$successResponse = $actionResponse;
						echo "Status: " . $successResponse->getStatus()->getValue() . PHP_EOL;
						echo "Code: " . $successResponse->getCode()->getValue() . PHP_EOL;
						echo "Details: " . PHP_EOL;
						foreach ($successResponse->getDetails() as $key => $value) {
							echo $key . ": " . $value . PHP_EOL;
						}
						echo "Message: " . $successResponse->getMessage() . PHP_EOL;
					} elseif ($actionResponse instanceof APIException) {
						$exception = $actionResponse;
						echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
						echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
						echo "Details: " . PHP_EOL;
						foreach ($exception->getDetails() as $key => $value) {
							echo $key . ": " . $value . PHP_EOL;
						}
						echo "Message: " . $exception->getMessage() . PHP_EOL;
					}
				} elseif ($actionHandler instanceof APIException) {
					$exception = $actionHandler;
					echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
					echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
					echo "Details: " . PHP_EOL;
					foreach ($exception->getDetails() as $key => $value) {
						echo $key . ": " . $value . PHP_EOL;
					}
					echo "Message: " . $exception->getMessage() . PHP_EOL;
				}
			}
		}
	}
}

UpdateCallPreference::initialize();
UpdateCallPreference::updateCallPreference();