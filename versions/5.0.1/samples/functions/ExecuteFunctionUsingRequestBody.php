<?php
namespace samples\functions;

require_once 'vendor/autoload.php';

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\functions\FunctionsOperations;
use com\zoho\crm\api\functions\APIException;
use com\zoho\crm\api\functions\SuccessResponse;
use com\zoho\crm\api\functions\BodyWrapper;

class ExecuteFunctionUsingRequestBody
{
	public static function initialize()
	{
		$environment = USDataCenter::PRODUCTION();
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

	public static function executeFunctionUsingRequestBody()
	{
		$functionName = "get_record_lead";
		$authType = "oauth";

        $arg = [];
        $arg["12223322"] = "iuubnf";

        $arguments1 = [];
        $arguments1["zoho"] = $arg;
        
		$functionsOperations = new FunctionsOperations($functionName, $authType, $arguments1);
		$bodyWrapper = new BodyWrapper();

		$requestBody = [];
        $requestBody["name"] = "PHP";
        $requestBody["version"] = "1.0.0";

        $sample = [];
        $sample["name"] = "PHP-8.0";
        $sample["version"] = "1.0.0";

        $requestBody["v8.0"] = $sample;

        $bodyWrapper->setBody($requestBody);

		$paramInstance = new ParameterMap();
		$param = [];
        $param["1221"] = "2111221";
        $param["15221"] = "21113221";
        $param["12421"] = "211341221";
        $paramInstance->add(new Param("PHP", "array"), $param);
        $headerInstance = new HeaderMap();
        $response = $functionsOperations->executeFunctionUsingRequestBody($bodyWrapper, $paramInstance, $headerInstance);
		if ($response != null) {
			echo ("Status code " . $response->getStatusCode() . "\n");
            $responseWrapper = $response->getObject();
            if ($responseWrapper instanceof SuccessResponse)
            {
                $successResponse = $responseWrapper;
                echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                echo ("Details: \n");
                foreach ($successResponse->getDetails() as $key => $value) {
                    echo ($key . " : "); print_r($value); echo "\n";
                }
                echo ("Message: " . $successResponse->getMessage()->getValue()) . "\n";
            }
            else if ($responseWrapper instanceof APIException)
            {
                $exception = $responseWrapper;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                echo ("Details: ");
                foreach ($exception->getDetails() as $key => $value) {
                    echo ($key . " : " . $value . "\n");
                }
                echo "Message : " . $exception->getMessage()->getValue() . "\n";
            }
		}
	}
}

ExecuteFunctionUsingRequestBody::initialize();
ExecuteFunctionUsingRequestBody::executeFunctionUsingRequestBody();
