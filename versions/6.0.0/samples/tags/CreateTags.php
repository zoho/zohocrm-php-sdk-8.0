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
use com\zoho\crm\api\tags\CreateTagsParam;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class CreateTags
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
	public static function createTags(string $moduleAPIName)
	{
		$tagsOperations = new TagsOperations();
		$request = new BodyWrapper();
		$paramInstance = new ParameterMap();
		$paramInstance->add(CreateTagsParam::module(), $moduleAPIName);
		
		$tagList = array();
		$tag1 = new Tag();
		$tag1->setName("Sample Tag");
		$tag1->setColorCode("#D297EE");
		array_push($tagList, $tag1);
		
		$request->setTags($tagList);
		
		$response = $tagsOperations->createTags($request, $paramInstance);
		
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
						
						if($successResponse->getDetails() != null)
						{
							foreach($successResponse->getDetails() as $key => $value)
							{
								echo($key . ": " . $value . "\n");
							}
						}
					}
					else if($actionResponse instanceof APIException)
					{
						$exception = $actionResponse;
						echo("Status: " . $exception->getStatus()->getValue() . "\n");
						echo("Code: " . $exception->getCode()->getValue() . "\n");
						echo("Message: " . $exception->getMessage()->getValue() . "\n");
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
				echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()));
			}
		}
	}
}
CreateTags::initialize();
CreateTags::createTags("Leads");
?>