<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class FunctionsOperations
{

	private  $authType;
	private  $functionName;
	private  $arguments;

	/**
	 * Creates an instance of FunctionsOperations with the given parameters
	 * @param string $functionName A string
	 * @param string $authType A string
	 * @param array $arguments A array
	 */
	public function __Construct(string $functionName, string $authType=null, array $arguments=null)
	{
		$this->functionName=$functionName; 
		$this->authType=$authType; 
		$this->arguments=$arguments; 

	}

	/**
	 * The method to execute function using request body
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function executeFunctionUsingRequestBody(BodyWrapper $request, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/functions/'); 
		$apiPath=$apiPath.(strval($this->functionName)); 
		$apiPath=$apiPath.('/actions/execute'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addParam(new Param('auth_type', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingRequestBodyParam'), $this->authType); 
		$handlerInstance->addParam(new Param('arguments', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingRequestBodyParam'), $this->arguments); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		return $handlerInstance->apiCall(ResponseWrapper::class, 'application/json'); 

	}

	/**
	 * The method to execute function using parameters
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function executeFunctionUsingParameters(ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/functions/'); 
		$apiPath=$apiPath.(strval($this->functionName)); 
		$apiPath=$apiPath.('/actions/execute'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('auth_type', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingParametersParam'), $this->authType); 
		$handlerInstance->addParam(new Param('arguments', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingParametersParam'), $this->arguments); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		return $handlerInstance->apiCall(ResponseWrapper::class, 'application/json'); 

	}

	/**
	 * The method to execute function using file
	 * @param FileBodyWrapper $request An instance of FileBodyWrapper
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function executeFunctionUsingFile(FileBodyWrapper $request, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/functions/'); 
		$apiPath=$apiPath.(strval($this->functionName)); 
		$apiPath=$apiPath.('/actions/execute'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('multipart/form-data'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addParam(new Param('auth_type', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingFileParam'), $this->authType); 
		$handlerInstance->addParam(new Param('arguments', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingFileParam'), $this->arguments); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		return $handlerInstance->apiCall(ResponseWrapper::class, 'application/json'); 

	}
} 
