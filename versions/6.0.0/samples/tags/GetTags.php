<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\ResponseWrapper;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\GetTagsParam;

require_once "vendor/autoload.php";

class GetTags
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

	public static function getTags(string $moduleAPIName)
	{
		$tagsOperations = new TagsOperations();
		$paramInstance = new ParameterMap();
		$paramInstance->add(GetTagsParam::module(), $moduleAPIName);
		
		$response = $tagsOperations->getTags($paramInstance);
		
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
				$tags = $responseWrapper->getTags();
				
				if($tags != null)
				{
					foreach($tags as $tag)
					{
						echo("Tag ID: " . $tag->getId() . "\n");
						echo("Tag Name: " . $tag->getName() . "\n");
						echo("Tag ColorCode: " . print_r($tag->getColorCode()) . "\n");
						echo("Tag CreatedTime: " . $tag->getCreatedTime()->format('Y-m-d H:i:s') . "\n");
						echo("Tag ModifiedTime: " . $tag->getModifiedTime()->format('Y-m-d H:i:s') . "\n");
					}
				}
				
				$info = $responseWrapper->getInfo();
				if($info != null)
				{
					echo("Tag Info Count: " . $info->getCount() . "\n");
					echo("Tag Info PerPage: " . $info->getAllowedCount() . "\n");
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
GetTags::initialize();
GetTags::getTags("Leads");
?>