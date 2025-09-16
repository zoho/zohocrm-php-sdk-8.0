<?php 
namespace com\zoho\crm\api\inventoryconvert;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class InventoryConvertOperations
{

	private  $moduleAPIName;
	private  $id;

	/**
	 * Creates an instance of InventoryConvertOperations with the given parameters
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 */
	public function __Construct(string $id, string $moduleAPIName)
	{
		$this->id=$id; 
		$this->moduleAPIName=$moduleAPIName; 

	}

	/**
	 * The method to convert inventory
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function convertInventory(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->id)); 
		$apiPath=$apiPath.('/actions/convert'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
