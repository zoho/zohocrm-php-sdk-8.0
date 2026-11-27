<?php 
namespace com\zoho\crm\api\sendmail;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class SendMailOperations
{

	private  $modulename;
	private  $id;

	/**
	 * Creates an instance of SendMailOperations with the given parameters
	 * @param string $id A string
	 * @param string $modulename A string
	 */
	public function __Construct(string $id, string $modulename)
	{
		$this->id=$id; 
		$this->modulename=$modulename; 

	}

	/**
	 * The method to send mail
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function sendMail(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->modulename)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->id)); 
		$apiPath=$apiPath.('/actions/send_mail'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
