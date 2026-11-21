<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\tags\MergeWrapper;
use com\zoho\crm\api\tags\ConflictWrapper;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\ActionWrapper;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\SuccessResponse;

require_once "vendor/autoload.php";

class MergeTags
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

	public static function mergeTags(string $tagId, string $conflictId)
	{
		$tagsOperations = new TagsOperations();
		$request = new MergeWrapper();
		
		$tags = array();
		$mergeTag = new ConflictWrapper();
		$mergeTag->setConflictId($conflictId);
		array_push($tags, $mergeTag);
		
		$request->setTags($tags);
		
		$response = $tagsOperations->mergeTags($tagId, $request);
		
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
		}
	}
}
MergeTags::initialize();
MergeTags::mergeTags("1055806000010329006", "1055806000012903003");
?>