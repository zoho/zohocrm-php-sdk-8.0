<?php 
namespace com\zoho\crm\api\apis;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class APIsOperations
{

	private  $filters;

	/**
	 * Creates an instance of ApisOperations with the given parameters
	 * @param string $filters A string
	 */
	public function __Construct(string $filters=null)
	{
		$this->filters=$filters; 

	}

	/**
	 * The method to get supported api
	 * @return APIResponse An instance of APIResponse
	 */
	public function getSupportedAPI()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/__apis'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('filters', 'com.zoho.crm.api.Apis.GetSupportedAPIParam'), $this->filters); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
