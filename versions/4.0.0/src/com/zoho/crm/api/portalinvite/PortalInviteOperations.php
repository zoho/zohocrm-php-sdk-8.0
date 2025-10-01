<?php 
namespace com\zoho\crm\api\portalinvite;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class PortalInviteOperations
{

	private  $module;

	/**
	 * Creates an instance of PortalInviteOperations with the given parameters
	 * @param string $module A string
	 */
	public function __Construct(string $module)
	{
		$this->module=$module; 

	}

	/**
	 * The method to invite users
	 * @param string $record A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function inviteUsers(string $record, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($record)); 
		$apiPath=$apiPath.('/actions/portal_invite'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
