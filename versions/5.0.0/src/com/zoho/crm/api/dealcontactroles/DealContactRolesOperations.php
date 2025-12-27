<?php 
namespace com\zoho\crm\api\dealcontactroles;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class DealContactRolesOperations
{

	/**
	 * The method to get associated contact roles
	 * @param string $deal A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getAssociatedContactRoles(string $deal, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Deals/'); 
		$apiPath=$apiPath.(strval($deal)); 
		$apiPath=$apiPath.('/Contact_Roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setModuleAPIName("Contacts"); 
		Utility::getFields("Contacts", $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete associated contact roles
	 * @param string $deal A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteAssociatedContactRoles(string $deal, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Deals/'); 
		$apiPath=$apiPath.(strval($deal)); 
		$apiPath=$apiPath.('/Contact_Roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get associated contact roles specific to contact
	 * @param string $contact A string
	 * @param string $deal A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getAssociatedContactRolesSpecificToContact(string $contact, string $deal)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Deals/'); 
		$apiPath=$apiPath.(strval($deal)); 
		$apiPath=$apiPath.('/Contact_Roles/'); 
		$apiPath=$apiPath.(strval($contact)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setModuleAPIName("Contacts"); 
		Utility::getFields("Contacts", $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to associate contact role to deal
	 * @param string $contact A string
	 * @param string $deal A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function associateContactRoleToDeal(string $contact, string $deal, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Deals/'); 
		$apiPath=$apiPath.(strval($deal)); 
		$apiPath=$apiPath.('/Contact_Roles/'); 
		$apiPath=$apiPath.(strval($contact)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete contact role relation
	 * @param string $contact A string
	 * @param string $deal A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteContactRoleRelation(string $contact, string $deal)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Deals/'); 
		$apiPath=$apiPath.(strval($deal)); 
		$apiPath=$apiPath.('/Contact_Roles/'); 
		$apiPath=$apiPath.(strval($contact)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
