<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\tags\NewTagRequestWrapper;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\RecordActionWrapper;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\RecordSuccessResponse;

require_once "vendor/autoload.php";

class AddTags
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
	public static function addTags(string $moduleAPIName, string $recordId)
	{
		$tagsOperations = new TagsOperations();
		$request = new NewTagRequestWrapper();
		
		$tagList = array();
		$tag = new Tag();
		$tag->setName("Record Tag");
		array_push($tagList, $tag);
		$request->setTags($tagList);
		$request->setOverWrite(false);
		$paramInstance = new ParameterMap();
		
		$response = $tagsOperations->addTags($moduleAPIName, $recordId, $request, $paramInstance);
		
		if($response != null)
		{
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			$recordActionHandler = $response->getObject();
			
			if($recordActionHandler instanceof RecordActionWrapper)
			{
				$recordActionWrapper = $recordActionHandler;
				$recordActionResponses = $recordActionWrapper->getData();
				
				foreach($recordActionResponses as $recordActionResponse)
				{
					if($recordActionResponse instanceof RecordSuccessResponse)
					{
						$successResponse = $recordActionResponse;
						echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
						echo("Code: " . $successResponse->getCode()->getValue() . "\n");
						echo("Message: " . $successResponse->getMessage() . "\n");
						echo("Message: " . print_r($successResponse->getDetails()) . "\n");
					}
					else if($recordActionResponse instanceof APIException)
					{
						$exception = $recordActionResponse;
						echo("Status: " . $exception->getStatus()->getValue() . "\n");
						echo("Code: " . $exception->getCode()->getValue() . "\n");
						echo("Message: " . $exception->getMessage() . "\n");
						echo("Message: " . print_r($exception->getDetails()) . "\n");
					}
				}
			}
		}
	}
}
AddTags::initialize();
$moduleAPIName = "Leads";
$recordId = "1055806000028448052";
AddTags::addTags($moduleAPIName, $recordId);
?>