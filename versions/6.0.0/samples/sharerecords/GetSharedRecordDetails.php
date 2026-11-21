<?php
namespace samples\src\com\zoho\crm\api\sharerecords;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\sharerecords\APIException;
use com\zoho\crm\api\sharerecords\ResponseWrapper;
use com\zoho\crm\api\sharerecords\ShareRecordsOperations;
use com\zoho\crm\api\sharerecords\GetSharedRecordDetailsParam;

require_once "vendor/autoload.php";

class GetSharedRecordDetails
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
	public static function getSharedRecordDetails(string $moduleAPIName, string $recordId)
	{
		$shareRecordsOperations = new ShareRecordsOperations($recordId, $moduleAPIName);
		$paramInstance = new ParameterMap();
		$paramInstance->add(GetSharedRecordDetailsParam::view(), "summary");
		$response = $shareRecordsOperations->getSharedRecordDetails($paramInstance);
		
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
				$shareRecords = $responseWrapper->getShare();
				
				if($shareRecords != null)
				{
					foreach($shareRecords as $shareRecord)
					{
						echo("ShareRecord ShareRelatedRecords: " . $shareRecord->getShareRelatedRecords() . "\n");
						echo("ShareRecord Permission: " . $shareRecord->getPermission() . "\n");
						
						$sharedThrough = $shareRecord->getSharedThrough();
						if($sharedThrough != null)
						{
							$module = $sharedThrough->getModule();
							if($module != null)
							{
								echo("SharedThrough Module ID: " . $module->getId() . "\n");
								echo("SharedThrough Module Name: " . $module->getName() . "\n");
							}
							echo("SharedThrough ID: " . $sharedThrough->getId() . "\n");
						}
						
						$user = $shareRecord->getUser();
						if($user != null)
						{
							echo("ShareRecord User-ID: " . $user->getId() . "\n");
							echo("ShareRecord User-FullName: " . $user->getFullName() . "\n");
							echo("ShareRecord User-Zuid: " . $user->getZuid() . "\n");
						}
					}
				}
				
				if($responseWrapper->getShareableUser() != null)
				{
					$shareableUsers = $responseWrapper->getShareableUser();
					foreach($shareableUsers as $shareableUser)
					{
						echo("ShareableUser ID: " . $shareableUser->getId() . "\n");
						echo("ShareableUser FullName: " . $shareableUser->getFullName() . "\n");
						echo("ShareableUser Zuid: " . $shareableUser->getZuid() . "\n");
					}
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
GetSharedRecordDetails::initialize();
GetSharedRecordDetails::getSharedRecordDetails("Leads", "1055806000028448051");
?>