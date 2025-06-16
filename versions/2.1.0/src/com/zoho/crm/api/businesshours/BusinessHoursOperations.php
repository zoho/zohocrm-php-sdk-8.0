<?php 
namespace com\zoho\crm\api\businesshours;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class BusinessHoursOperations
{

	private  $xCrmOrg;

	/**
	 * Creates an instance of BusinessHoursOperations with the given parameters
	 * @param string $xCrmOrg A string
	 */
	public function __Construct(string $xCrmOrg=null)
	{
		$this->xCrmOrg=$xCrmOrg; 

	}

	/**
	 * The method to create business hours
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function createBusinessHours(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/business_hours'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.BusinessHours.CreateBusinessHoursHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update business hours
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateBusinessHours(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/business_hours'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.BusinessHours.UpdateBusinessHoursHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get business hours
	 * @return APIResponse An instance of APIResponse
	 */
	public function getBusinessHours()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/business_hours'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.BusinessHours.GetBusinessHoursHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
