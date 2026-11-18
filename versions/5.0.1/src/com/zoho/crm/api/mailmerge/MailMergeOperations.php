<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class MailMergeOperations
{

	private  $id;
	private  $module;

	/**
	 * Creates an instance of MailMergeOperations with the given parameters
	 * @param string $module A string
	 * @param string $id A string
	 */
	public function __Construct(string $module, string $id)
	{
		$this->module=$module; 
		$this->id=$id; 

	}

	/**
	 * The method to send mail merge
	 * @param MailMergeWrapper $request An instance of MailMergeWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function sendMailMerge(MailMergeWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->id)); 
		$apiPath=$apiPath.('/actions/send_mail_merge'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to download mail merge
	 * @param DownloadMailMergeWrapper $request An instance of DownloadMailMergeWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function downloadMailMerge(DownloadMailMergeWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->id)); 
		$apiPath=$apiPath.('/actions/download_mail_merge'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(DownloadResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to sign mail merge
	 * @param SignMailMergeWrapper $request An instance of SignMailMergeWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function signMailMerge(SignMailMergeWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->id)); 
		$apiPath=$apiPath.('/actions/sign_mail_merge'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(SignActionHandler::class, 'application/json'); 

	}
} 
