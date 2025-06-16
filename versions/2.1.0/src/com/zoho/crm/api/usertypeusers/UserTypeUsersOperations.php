<?php 
namespace com\zoho\crm\api\usertypeusers;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class UserTypeUsersOperations
{

	private  $portalName;
	private  $userTypeId;

	/**
	 * Creates an instance of UserTypeUsersOperations with the given parameters
	 * @param string $userTypeId A string
	 * @param string $portalName A string
	 */
	public function __Construct(string $userTypeId, string $portalName)
	{
		$this->userTypeId=$userTypeId; 
		$this->portalName=$portalName; 

	}

	/**
	 * The method to get users of user type
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getUsersOfUserType(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/portals/'); 
		$apiPath=$apiPath.(strval($this->portalName)); 
		$apiPath=$apiPath.('/user_type/'); 
		$apiPath=$apiPath.(strval($this->userTypeId)); 
		$apiPath=$apiPath.('/users'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete user from the portal
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteUserFromThePortal(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/portals/'); 
		$apiPath=$apiPath.(strval($this->portalName)); 
		$apiPath=$apiPath.('/user_type/'); 
		$apiPath=$apiPath.(strval($this->userTypeId)); 
		$apiPath=$apiPath.('/users'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to transfer users of a user type
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function transferUsersOfAUserType(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/portals/'); 
		$apiPath=$apiPath.(strval($this->portalName)); 
		$apiPath=$apiPath.('/user_type/'); 
		$apiPath=$apiPath.(strval($this->userTypeId)); 
		$apiPath=$apiPath.('/users/action/transfer'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to change users status
	 * @param string $userId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function changeUsersStatus(string $userId, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/portals/'); 
		$apiPath=$apiPath.(strval($this->portalName)); 
		$apiPath=$apiPath.('/user_type/'); 
		$apiPath=$apiPath.(strval($this->userTypeId)); 
		$apiPath=$apiPath.('/users/'); 
		$apiPath=$apiPath.(strval($userId)); 
		$apiPath=$apiPath.('/actions/change_status'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(StatusActionHandler::class, 'application/json'); 

	}
} 
