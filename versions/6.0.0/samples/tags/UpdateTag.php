<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\tags\BodyWrapper;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\ActionWrapper;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\SuccessResponse;
use com\zoho\crm\api\tags\UpdateTagParam;

require_once "vendor/autoload.php";

class UpdateTag
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

	public static function updateTag(string $moduleAPIName, string $tagId)
	{
		$tagsOperations = new TagsOperations();
		$request = new BodyWrapper();
		$paramInstance = new ParameterMap();
		$paramInstance->add(UpdateTagParam::module(), $moduleAPIName);
		
		$tagList = array();
		$tag1 = new Tag();
		$tag1->setName("Updated Single Tag");
		$tag1->setColorCode("#A8C026");
		array_push($tagList, $tag1);
		
		$request->setTags($tagList);
		
		$response = $tagsOperations->updateTag($tagId, $request, $paramInstance);
		
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
UpdateTag::initialize();
UpdateTag::updateTag("Leads", "1055806000010550007");
?>