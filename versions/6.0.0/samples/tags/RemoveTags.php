<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\tags\ExistingTagRequestWrapper;
use com\zoho\crm\api\tags\ExistingTag;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\RecordActionWrapper;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\RecordSuccessResponse;

require_once "vendor/autoload.php";

class RemoveTags
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

	public static function removeTags(string $moduleAPIName, string $recordId)
	{
		$tagsOperations = new TagsOperations();
		$request = new ExistingTagRequestWrapper();
		
		$tagList = array();
		$tag = new ExistingTag();
		$tag->setName("Record Tag");
		array_push($tagList, $tag);
		
		$request->setTags($tagList);
		
		$response = $tagsOperations->removeTags($moduleAPIName, $recordId, $request);
		
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
						echo("Details: " . print_r($successResponse->getDetails()) . "\n");
					}
					else if($recordActionResponse instanceof APIException)
					{
						$exception = $recordActionResponse;
						echo("Status: " . $exception->getStatus()->getValue() . "\n");
						echo("Code: " . $exception->getCode()->getValue() . "\n");
						echo("Message: " . $exception->getMessage() . "\n");
						echo("Details: " . print_r($exception->getDetails()) . "\n");
					}
				}
			}
		}
	}
}
RemoveTags::initialize();
$moduleAPIName = "Leads";
$recordId = "1055806000028448051";
RemoveTags::removeTags($moduleAPIName, $recordId);
?>