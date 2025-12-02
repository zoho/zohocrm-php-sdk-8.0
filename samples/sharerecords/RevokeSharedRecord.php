<?php
namespace samples\src\com\zoho\crm\api\sharerecords;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\sharerecords\ShareRecordsOperations;
use com\zoho\crm\api\sharerecords\DeleteActionWrapper;
use com\zoho\crm\api\sharerecords\APIException;
use com\zoho\crm\api\sharerecords\SuccessResponse;

require_once "vendor/autoload.php";

class RevokeSharedRecord
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
	public static function revokeSharedRecord(string $moduleAPIName, string $recordId)
	{
		$shareRecordsOperations = new ShareRecordsOperations($recordId, $moduleAPIName);
		$response = $shareRecordsOperations->revokeSharedRecord();
		
		if($response != null)
		{
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			$deleteActionHandler = $response->getObject();
			
			if($deleteActionHandler instanceof DeleteActionWrapper)
			{
				$deleteActionWrapper = $deleteActionHandler;
				$deleteActionResponse = $deleteActionWrapper->getShare();
				
				if($deleteActionResponse instanceof SuccessResponse)
				{
					$successResponse = $deleteActionResponse;
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
				else if($deleteActionResponse instanceof APIException)
				{
					$exception = $deleteActionResponse;
					echo("Status: " . $exception->getStatus()->getValue() . "\n");
					echo("Code: " . $exception->getCode()->getValue() . "\n");
					echo("Message: " . $exception->getMessage() . "\n");
				}
			}
			else if($deleteActionHandler instanceof APIException)
			{
				$exception = $deleteActionHandler;
				echo("Status: " . $exception->getStatus()->getValue() . "\n");
				echo("Code: " . $exception->getCode()->getValue() . "\n");
				echo("Message: " . $exception->getMessage()->getValue() . "\n");
			}
		}
	}
}
RevokeSharedRecord::initialize();
RevokeSharedRecord::revokeSharedRecord("Leads", "1055806000028448051");
?>