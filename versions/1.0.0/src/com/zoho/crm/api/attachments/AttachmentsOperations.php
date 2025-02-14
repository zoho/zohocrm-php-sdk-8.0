<?php 
namespace com\zoho\crm\api\attachments;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class AttachmentsOperations
{

	/**
	 * The method to upload attachments
	 * @param string $recordId A string
	 * @param string $module A string
	 * @param FileBodyWrapper $request An instance of FileBodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function uploadAttachments(string $recordId, string $module, FileBodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/Attachments'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('multipart/form-data'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get attachments
	 * @param string $recordId A string
	 * @param string $module A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getAttachments(string $recordId, string $module, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/Attachments'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to upload url attachments
	 * @param string $recordId A string
	 * @param string $module A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function uploadUrlAttachments(string $recordId, string $module, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/Attachments'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete attachments
	 * @param string $recordId A string
	 * @param string $module A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteAttachments(string $recordId, string $module, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/Attachments'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get attachment
	 * @param string $id A string
	 * @param string $recordId A string
	 * @param string $module A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getAttachment(string $id, string $recordId, string $module)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/Attachments/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'image/png'); 

	}

	/**
	 * The method to delete attachment
	 * @param string $id A string
	 * @param string $recordId A string
	 * @param string $module A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteAttachment(string $id, string $recordId, string $module)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/Attachments/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
