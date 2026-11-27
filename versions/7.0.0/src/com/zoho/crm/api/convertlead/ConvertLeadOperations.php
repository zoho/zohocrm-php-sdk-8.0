<?php 
namespace com\zoho\crm\api\convertlead;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class ConvertLeadOperations
{

	private  $leadId;

	/**
	 * Creates an instance of ConvertLeadOperations with the given parameters
	 * @param string $leadId A string
	 */
	public function __Construct(string $leadId)
	{
		$this->leadId=$leadId; 

	}

	/**
	 * The method to convert lead
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function convertLead(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Leads/'); 
		$apiPath=$apiPath.(strval($this->leadId)); 
		$apiPath=$apiPath.('/actions/convert'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setModuleAPIName("Deals"); 
		Utility::getFields("Deals", $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
