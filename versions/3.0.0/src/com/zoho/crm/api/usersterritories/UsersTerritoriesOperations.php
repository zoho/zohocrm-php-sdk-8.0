<?php 
namespace com\zoho\crm\api\usersterritories;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class UsersTerritoriesOperations
{

	private  $user;

	/**
	 * Creates an instance of UsersTerritoriesOperations with the given parameters
	 * @param string $user A string
	 */
	public function __Construct(string $user)
	{
		$this->user=$user; 

	}

	/**
	 * The method to get territories of user
	 * @return APIResponse An instance of APIResponse
	 */
	public function getTerritoriesOfUser()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/users/'); 
		$apiPath=$apiPath.(strval($this->user)); 
		$apiPath=$apiPath.('/territories'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to associate territories to user
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function associateTerritoriesToUser(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/users/'); 
		$apiPath=$apiPath.(strval($this->user)); 
		$apiPath=$apiPath.('/territories'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to remove territories from user
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function removeTerritoriesFromUser(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/users/'); 
		$apiPath=$apiPath.(strval($this->user)); 
		$apiPath=$apiPath.('/territories'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get territory of user
	 * @param string $territory A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getTerritoryOfUser(string $territory)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/users/'); 
		$apiPath=$apiPath.(strval($this->user)); 
		$apiPath=$apiPath.('/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to remove territory from user
	 * @param string $territory A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function removeTerritoryFromUser(string $territory)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/users/'); 
		$apiPath=$apiPath.(strval($this->user)); 
		$apiPath=$apiPath.('/territories/'); 
		$apiPath=$apiPath.(strval($territory)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
