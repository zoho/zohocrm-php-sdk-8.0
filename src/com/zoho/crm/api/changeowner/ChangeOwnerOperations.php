<?php 
namespace com\zoho\crm\api\changeowner;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class ChangeOwnerOperations
{

	private  $module;

	/**
	 * Creates an instance of ChangeOwnerOperations with the given parameters
	 * @param string $module A string
	 */
	public function __Construct(string $module)
	{
		$this->module=$module; 

	}

	/**
	 * The method to single update
	 * @param string $id A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function singleUpdate(string $id, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/change_owner'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to mass update
	 * @param MassWrapper $request An instance of MassWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function massUpdate(MassWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/actions/change_owner'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
