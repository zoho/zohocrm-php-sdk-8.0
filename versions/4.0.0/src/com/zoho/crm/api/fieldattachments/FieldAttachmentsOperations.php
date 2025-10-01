<?php 
namespace com\zoho\crm\api\fieldattachments;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class FieldAttachmentsOperations
{

	private  $fieldsAttachmentId;
	private  $recordId;
	private  $moduleAPIName;

	/**
	 * Creates an instance of FieldAttachmentsOperations with the given parameters
	 * @param string $moduleAPIName A string
	 * @param string $recordId A string
	 * @param string $fieldsAttachmentId A string
	 */
	public function __Construct(string $moduleAPIName, string $recordId, string $fieldsAttachmentId=null)
	{
		$this->moduleAPIName=$moduleAPIName; 
		$this->recordId=$recordId; 
		$this->fieldsAttachmentId=$fieldsAttachmentId; 

	}

	/**
	 * The method to get field attachments
	 * @return APIResponse An instance of APIResponse
	 */
	public function getFieldAttachments()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/actions/download_fields_attachment'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('fields_attachment_id', 'com.zoho.crm.api.FieldAttachments.GetFieldAttachmentsParam'), $this->fieldsAttachmentId); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/x-download'); 

	}
} 
