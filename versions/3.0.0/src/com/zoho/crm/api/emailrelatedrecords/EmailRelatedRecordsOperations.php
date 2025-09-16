<?php 
namespace com\zoho\crm\api\emailrelatedrecords;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class EmailRelatedRecordsOperations
{

	private  $moduleName;
	private  $recordId;
	private  $type;
	private  $ownerId;

	/**
	 * Creates an instance of EmailRelatedRecordsOperations with the given parameters
	 * @param string $recordId A string
	 * @param string $moduleName A string
	 * @param string $type A string
	 * @param string $ownerId A string
	 */
	public function __Construct(string $recordId, string $moduleName, string $type=null, string $ownerId=null)
	{
		$this->recordId=$recordId; 
		$this->moduleName=$moduleName; 
		$this->type=$type; 
		$this->ownerId=$ownerId; 

	}

	/**
	 * The method to get emails related records
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getEmailsRelatedRecords(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Emails'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('type', 'com.zoho.crm.api.EmailRelatedRecords.GetEmailsRelatedRecordsParam'), $this->type); 
		$handlerInstance->addParam(new Param('owner_id', 'com.zoho.crm.api.EmailRelatedRecords.GetEmailsRelatedRecordsParam'), $this->ownerId); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to get emails related record
	 * @param string $messageId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getEmailsRelatedRecord(string $messageId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/Emails/'); 
		$apiPath=$apiPath.(strval($messageId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('type', 'com.zoho.crm.api.EmailRelatedRecords.GetEmailsRelatedRecordParam'), $this->type); 
		$handlerInstance->addParam(new Param('owner_id', 'com.zoho.crm.api.EmailRelatedRecords.GetEmailsRelatedRecordParam'), $this->ownerId); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
