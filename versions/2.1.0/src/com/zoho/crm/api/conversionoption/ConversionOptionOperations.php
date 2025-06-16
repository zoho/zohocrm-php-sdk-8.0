<?php 
namespace com\zoho\crm\api\conversionoption;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class ConversionOptionOperations
{

	private  $leadId;

	/**
	 * Creates an instance of ConversionOptionOperations with the given parameters
	 * @param string $leadId A string
	 */
	public function __Construct(string $leadId)
	{
		$this->leadId=$leadId; 

	}

	/**
	 * The method to lead conversion options
	 * @return APIResponse An instance of APIResponse
	 */
	public function leadConversionOptions()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Leads/'); 
		$apiPath=$apiPath.(strval($this->leadId)); 
		$apiPath=$apiPath.('/__conversion_options'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setModuleAPIName("Leads"); 
		Utility::getFields("Leads,Contacts,Deals,Accounts", $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
