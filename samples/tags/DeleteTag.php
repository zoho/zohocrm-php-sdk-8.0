<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\ActionWrapper;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\SuccessResponse;

require_once "vendor/autoload.php";

class DeleteTag
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

	public static function deleteTag(string $tagId)
	{
		$tagsOperations = new TagsOperations();
		$response = $tagsOperations->deleteTag($tagId);
		
		if($response != null)
		{
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			$actionHandler = $response->getObject();
			
			if($actionHandler instanceof ActionWrapper)
			{
				$actionWrapper = $actionHandler;
				$actionResponses = $actionWrapper->getTags();
				
				foreach($actionResponses as $actionResponse)
				{
					if($actionResponse instanceof SuccessResponse)
					{
						$successResponse = $actionResponse;
						echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
						echo("Code: " . $successResponse->getCode()->getValue() . "\n");
						echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						echo("Details: " . print_r($successResponse->getDetails()) . "\n");
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
			else if ($actionHandler instanceof APIException) {
				$exception = $actionHandler;
				echo ("Status: " . $exception->getStatus()->getValue() . "\n");
				echo ("Code: " . $exception->getCode()->getValue() . "\n");
				echo ("Details: ");
				foreach ($exception->getDetails() as $key => $value) {
					echo ($key . " : " . $value . "\n");
				}
				echo ("Message : " . ($exception->getMessage()->getValue()));
			}
		}
	}
}
DeleteTag::initialize();
$tagId = "1055806000010328008";
DeleteTag::deleteTag($tagId);
?>