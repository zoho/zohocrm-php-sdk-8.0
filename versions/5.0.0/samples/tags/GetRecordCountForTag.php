<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\tags\TagsOperations;
use com\zoho\crm\api\tags\CountResponseWrapper;
use com\zoho\crm\api\tags\APIException;
use com\zoho\crm\api\tags\GetRecordCountForTagParam;

require_once "vendor/autoload.php";

class GetRecordCountForTag
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

	public static function getRecordCountForTag(string $moduleAPIName, string $tagId)
	{
		$tagsOperations = new TagsOperations();
		$paramInstance = new ParameterMap();
		$paramInstance->add(GetRecordCountForTagParam::module(), $moduleAPIName);
		
		$response = $tagsOperations->getRecordCountForTag($tagId, $paramInstance);
		
		if($response != null)
		{
			echo("Status code " . $response->getStatusCode() . "\n");
			
			if(in_array($response->getStatusCode(), array(204, 304)))
			{
				echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
				return;
			}
			
			$countHandler = $response->getObject();
			
			if($countHandler instanceof CountResponseWrapper)
			{
				$countWrapper = $countHandler;
				echo("Record Count: " . $countWrapper->getCount() . "\n");
			}
			else if($countHandler instanceof APIException)
			{
				$exception = $countHandler;
				echo("Status: " . $exception->getStatus()->getValue() . "\n");
				echo("Code: " . $exception->getCode()->getValue() . "\n");
				echo("Message: " . $exception->getMessage() . "\n");
			}
		}
	}
}
GetRecordCountForTag::initialize();
GetRecordCountForTag::getRecordCountForTag("Leads", "1055806000010329006");
?>