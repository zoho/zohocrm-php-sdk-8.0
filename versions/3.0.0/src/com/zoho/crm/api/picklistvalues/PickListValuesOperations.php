<?php 
namespace com\zoho\crm\api\picklistvalues;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class PickListValuesOperations
{

	private  $fieldId;
	private  $module;

	/**
	 * Creates an instance of PickListValuesOperations with the given parameters
	 * @param string $fieldId A string
	 * @param string $module A string
	 */
	public function __Construct(string $fieldId, string $module=null)
	{
		$this->fieldId=$fieldId; 
		$this->module=$module; 

	}

	/**
	 * The method to get pick list values
	 * @return APIResponse An instance of APIResponse
	 */
	public function getPickListValues()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/fields/'); 
		$apiPath=$apiPath.(strval($this->fieldId)); 
		$apiPath=$apiPath.('/pick_list_values'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.PickListValues.GetPickListValuesParam'), $this->module); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
