<?php 
namespace com\zoho\crm\api\recordshareemail;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class RecordShareEmailOperations
{

	private  $moduleAPIName;

	/**
	 * Creates an instance of RecordShareEmailOperations with the given parameters
	 * @param string $moduleAPIName A string
	 */
	public function __Construct(string $moduleAPIName)
	{
		$this->moduleAPIName=$moduleAPIName; 

	}

	/**
	 * The method to share emails
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function shareEmails(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/share_emails'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to unshare emails
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function unshareEmails(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/unshare_emails'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to share bulk emails
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function shareBulkEmails(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/actions/share_emails'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to unshare bulk emails
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function unshareBulkEmails(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/actions/unshare_emails'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
