<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class SharingRulesOperations
{

	private  $module;

	/**
	 * Creates an instance of SharingRulesOperations with the given parameters
	 * @param string $module A string
	 */
	public function __Construct(string $module=null)
	{
		$this->module=$module; 

	}

	/**
	 * The method to get sharing rules
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getSharingRules(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.GetSharingRulesParam'), $this->module); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to create sharing rules
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function createSharingRules(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.CreateSharingRulesParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update sharing rules
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateSharingRules(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.UpdateSharingRulesParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get sharing rule
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getSharingRule(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.GetSharingRuleParam'), $this->module); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update sharing rule
	 * @param string $id A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateSharingRule(string $id, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.UpdateSharingRuleParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete sharing rule
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteSharingRule(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.DeleteSharingRuleParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to search sharing rules
	 * @param FiltersBody $request An instance of FiltersBody
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function searchSharingRules(FiltersBody $request, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/search'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.SearchSharingRulesParam'), $this->module); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to deactivate sharing rule
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deactivateSharingRule(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/activate'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.DeactivateSharingRuleParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to activate sharing rule
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function activateSharingRule(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/activate'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.ActivateSharingRuleParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get sharing rule summary
	 * @return APIResponse An instance of APIResponse
	 */
	public function getSharingRuleSummary()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/actions/summary'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.GetSharingRuleSummaryParam'), $this->module); 
		return $handlerInstance->apiCall(SummaryResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to search sharing rules summary
	 * @param FiltersBody $request An instance of FiltersBody
	 * @return APIResponse An instance of APIResponse
	 */
	public function searchSharingRulesSummary(FiltersBody $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/actions/summary'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.SearchSharingRulesSummaryParam'), $this->module); 
		return $handlerInstance->apiCall(SummaryResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to rerun sharing rules
	 * @return APIResponse An instance of APIResponse
	 */
	public function rerunSharingRules()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/data_sharing/rules/actions/run'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.SharingRules.RerunSharingRulesParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
