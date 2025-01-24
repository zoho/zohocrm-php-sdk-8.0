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
use com\zoho\crm\api\functions\FileBodyWrapper;
use com\zoho\crm\api\util\StreamWrapper;

class ExecuteFunctionUsingFile
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

	public static function executeFunctionUsingFile()
	{
		$functionName = "get_record_lead";
		$authType = "oauth";

		$functionsOperations = new FunctionsOperations($functionName, $authType, null);
		$fileBodyWrapper = new FileBodyWrapper();
        $streamWrapper = new StreamWrapper(null, null, "./sample.txt");
        $fileBodyWrapper->setInputfile($streamWrapper);

		$paramInstance = new ParameterMap();
		$param = [];
        $param["1221"] = "2111221";
        $param["15221"] = "21113221";
        $param["12421"] = "211341221";
        $paramInstance->add(new Param("PHP", "array"), $param);
        $headerInstance = new HeaderMap();
        $response = $functionsOperations->executeFunctionUsingFile($fileBodyWrapper, $paramInstance, $headerInstance);
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

ExecuteFunctionUsingFile::initialize();
ExecuteFunctionUsingFile::executeFunctionUsingFile();
