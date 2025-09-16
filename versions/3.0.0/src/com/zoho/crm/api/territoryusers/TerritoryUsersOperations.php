<?php 
namespace com\zoho\crm\api\territoryusers;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class TerritoryUsersOperations
{

	/**
	 * The method to get territory users
	 * @param string $territory A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getTerritoryUsers(string $territory)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$apiPath=$apiPath.('/users'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update territory users
	 * @param string $territory A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateTerritoryUsers(string $territory, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$apiPath=$apiPath.('/users'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to deassociate territory users
	 * @param string $territory A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function deassociateTerritoryUsers(string $territory, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$apiPath=$apiPath.('/users'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get territory user
	 * @param string $user A string
	 * @param string $territory A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getTerritoryUser(string $user, string $territory)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$apiPath=$apiPath.('/users/'); 
		$apiPath=$apiPath.(strval($user)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update territory user
	 * @param string $user A string
	 * @param string $territory A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateTerritoryUser(string $user, string $territory)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$apiPath=$apiPath.('/users/'); 
		$apiPath=$apiPath.(strval($user)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to deassociate territory user
	 * @param string $user A string
	 * @param string $territory A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deassociateTerritoryUser(string $user, string $territory)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$apiPath=$apiPath.('/users/'); 
		$apiPath=$apiPath.(strval($user)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
