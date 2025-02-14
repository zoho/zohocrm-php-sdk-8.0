<?php 
namespace com\zoho\crm\api\inventorymassconvert;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class InventoryMassConvertOperations
{

	private  $moduleAPIName;

	/**
	 * Creates an instance of InventoryMassConvertOperations with the given parameters
	 * @param string $moduleAPIName A string
	 */
	public function __Construct(string $moduleAPIName)
	{
		$this->moduleAPIName=$moduleAPIName; 

	}

	/**
	 * The method to mass inventory convert
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function massInventoryConvert(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/actions/mass_convert'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionResponse::class, 'application/json'); 

	}

	/**
	 * The method to get scheduled jobs details
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getScheduledJobsDetails(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/actions/mass_convert'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
