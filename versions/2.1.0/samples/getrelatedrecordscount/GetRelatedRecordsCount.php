<?php
namespace samples\getrelatedrecordscount;

require_once 'vendor/autoload.php';

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\getrelatedrecordscount\GetRelatedRecordsCountOperations;
use com\zoho\crm\api\getrelatedrecordscount\APIException;
use com\zoho\crm\api\getrelatedrecordscount\ActionWrapper;
use com\zoho\crm\api\getrelatedrecordscount\RelatedList;
use com\zoho\crm\api\getrelatedrecordscount\BodyWrapper;
use com\zoho\crm\api\getrelatedrecordscount\GetRelatedRecordCount;
use com\zoho\crm\api\getrelatedrecordscount\SuccessResponse;

class GetRelatedRecordsCount
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

	public static function getRelatedRecordsCount($recordId, $moduleAPIName)
	{
		$getRelatedRecordsCountOperations = new GetRelatedRecordsCountOperations($recordId, $moduleAPIName);
		$request = new BodyWrapper();
		$getRelatedRecordsCount = [];
		$getRelatedRecordsCount1 = new GetRelatedRecordCount();
		$relatedList = new RelatedList();
		$relatedList->setAPIName("Notes");
		$relatedList->setId("34770602197");
		$getRelatedRecordsCount1->setRelatedList($relatedList);
		array_push($getRelatedRecordsCount, $getRelatedRecordsCount1);
		$request->setGetRelatedRecordsCount($getRelatedRecordsCount);
		$response = $getRelatedRecordsCountOperations->getRelatedRecordsCount($request);
		if ($response != null) {
			echo "Status Code: " . $response->getStatusCode() . PHP_EOL;
			if ($response->isExpected()) {
				$actionHandler = $response->getObject();
				if ($actionHandler instanceof ActionWrapper) {
					$actionWrapper = $actionHandler;
					$actionResponses = $actionWrapper->getGetRelatedRecordsCount();
					foreach ($actionResponses as $actionResponse) {
						if ($actionResponse instanceof SuccessResponse) {
							$successResponse = $actionResponse;
							echo "Count: " . $successResponse->getCount() . PHP_EOL;
							$relatedList = $successResponse->getRelatedList();
							if ($relatedList != null) {
								echo "RelatedList APIName: " . $relatedList->getAPIName() . PHP_EOL;
								echo "RelatedList Id: " . $relatedList->getId() . PHP_EOL;
							}
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

GetRelatedRecordsCount::initialize();
$recordId = "34772175";
$moduleAPIName = "Leads";
GetRelatedRecordsCount::getRelatedRecordsCount($recordId, $moduleAPIName);
