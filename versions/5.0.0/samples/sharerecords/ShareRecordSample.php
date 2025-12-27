<?php
namespace samples\src\com\zoho\crm\api\sharerecords;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\sharerecords\BodyWrapper;
use com\zoho\crm\api\sharerecords\ShareRecordsOperations;
use com\zoho\crm\api\sharerecords\ActionWrapper;
use com\zoho\crm\api\sharerecords\APIException;
use com\zoho\crm\api\sharerecords\SuccessResponse;
use com\zoho\crm\api\users\Users;
use com\zoho\crm\api\sharerecords\ShareRecord;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class ShareRecordSample
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
	public static function shareRecord(string $moduleAPIName, string $recordId)
	{
		$shareRecordsOperations = new ShareRecordsOperations($recordId, $moduleAPIName);
		$request = new BodyWrapper();
		$shareList = array();
		
		$share1 = new ShareRecord();
		$share1->setShareRelatedRecords(true);
		$share1->setPermission("read_write");
		// $user = new Users();
		// $user->setId("1055806000000173021");
		// $share1->setUser($user);
		$sharedWith = new Users();
		$sharedWith->setId("1055806000014792002");
		$sharedWith->addKeyValue("type", "roles");
		$share1->setSharedWith($sharedWith);
		$share1->setType(new Choice("private"));
		array_push($shareList, $share1);
		$request->setShare($shareList);
		$request->setNotify(true);
		$response = $shareRecordsOperations->shareRecord($request);
		
		if($response != null)
		{
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			$actionHandler = $response->getObject();
			
			if($actionHandler instanceof ActionWrapper)
			{
				$actionWrapper = $actionHandler;
				$actionResponses = $actionWrapper->getShare();
				
				foreach($actionResponses as $actionResponse)
				{
					if($actionResponse instanceof SuccessResponse)
					{
						$successResponse = $actionResponse;
						echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
						echo("Code: " . $successResponse->getCode()->getValue() . "\n");
						echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						
						if($successResponse->getDetails() != null)
						{
							foreach($successResponse->getDetails() as $key => $value)
							{
								echo($key . " : " . $value . "\n");
							}
						}
					}
					else if($actionResponse instanceof APIException)
					{
						$exception = $actionResponse;
						echo("Status: " . $exception->getStatus()->getValue() . "\n");
						echo("Code: " . $exception->getCode()->getValue() . "\n");
						echo("Message: " . $exception->getMessage()->getValue() . "\n");
						echo("Details: " . print_r($exception->getDetails()) . "\n");
					}
				}
			}
			else if($actionHandler instanceof APIException)
			{
				$exception = $actionHandler;
				echo("Status: " . $exception->getStatus()->getValue() . "\n");
				echo("Code: " . $exception->getCode()->getValue() . "\n");
				echo("Message: " . $exception->getMessage() . "\n");
			}
		}
	}
}
ShareRecordSample::initialize();
ShareRecordSample::shareRecord("Leads", "1055806000028448051");
?>