<?php 
namespace com\zoho\crm\api\holidays;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class HolidaysOperations
{

	private  $xCrmOrg;

	/**
	 * Creates an instance of HolidaysOperations with the given parameters
	 * @param string $xCrmOrg A string
	 */
	public function __Construct(string $xCrmOrg=null)
	{
		$this->xCrmOrg=$xCrmOrg; 

	}

	/**
	 * The method to get holidays
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getHolidays(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/holidays'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.Holidays.GetHolidaysHeader'), $this->xCrmOrg); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to create holidays
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function createHolidays(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/holidays'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.Holidays.CreateHolidaysHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update holidays
	 * @param Holidays $request An instance of Holidays
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateHolidays(Holidays $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/holidays'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.Holidays.UpdateHolidaysHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update holiday
	 * @param string $holidayId A string
	 * @param Holidays $request An instance of Holidays
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateHoliday(string $holidayId, Holidays $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/holidays/'); 
		$apiPath=$apiPath.(strval($holidayId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.Holidays.UpdateHolidayHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get holiday
	 * @param string $holidayId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getHoliday(string $holidayId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/holidays/'); 
		$apiPath=$apiPath.(strval($holidayId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.Holidays.GetHolidayHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete holiday
	 * @param string $holidayId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteHoliday(string $holidayId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/holidays/'); 
		$apiPath=$apiPath.(strval($holidayId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->addHeader(new Header('X-CRM-ORG', 'com.zoho.crm.api.Holidays.DeleteHolidayHeader'), $this->xCrmOrg); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
