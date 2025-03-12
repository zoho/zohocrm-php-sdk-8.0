<?php 
namespace com\zoho\crm\api\emailsharingdetails;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class EmailSharingDetailsOperations
{

	private  $module;
	private  $recordId;

	/**
	 * Creates an instance of EmailSharingDetailsOperations with the given parameters
	 * @param string $recordId A string
	 * @param string $module A string
	 */
	public function __Construct(string $recordId, string $module)
	{
		$this->recordId=$recordId; 
		$this->module=$module; 

	}

	/**
	 * The method to get email sharing details
	 * @return APIResponse An instance of APIResponse
	 */
	public function getEmailSharingDetails()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->module)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/__emails_sharing_details'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
