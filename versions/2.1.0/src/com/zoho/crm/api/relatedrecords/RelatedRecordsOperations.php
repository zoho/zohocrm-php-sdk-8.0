<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class RelatedRecordsOperations
{

	private  $moduleAPIName;
	private  $relatedListAPIName;

	/**
	 * Creates an instance of RelatedRecordsOperations with the given parameters
	 * @param string $relatedListAPIName A string
	 * @param string $moduleAPIName A string
	 */
	public function __Construct(string $relatedListAPIName, string $moduleAPIName)
	{
		$this->relatedListAPIName=$relatedListAPIName; 
		$this->moduleAPIName=$moduleAPIName; 

	}

	/**
	 * The method to get related records
	 * @param string $recordId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getRelatedRecords(string $recordId, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update related records
	 * @param string $recordId A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateRelatedRecords(string $recordId, BodyWrapper $request, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delink records
	 * @param string $recordId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function delinkRecords(string $recordId, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getFields($this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get related records using external id
	 * @param string $externalValue A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getRelatedRecordsUsingExternalId(string $externalValue, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalValue)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update related records using external id
	 * @param string $externalValue A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateRelatedRecordsUsingExternalId(string $externalValue, BodyWrapper $request, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalValue)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete related records using external id
	 * @param string $externalValue A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteRelatedRecordsUsingExternalId(string $externalValue, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalValue)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get related record
	 * @param string $relatedRecordId A string
	 * @param string $recordId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getRelatedRecord(string $relatedRecordId, string $recordId, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($relatedRecordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update related record
	 * @param string $relatedRecordId A string
	 * @param string $recordId A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateRelatedRecord(string $relatedRecordId, string $recordId, BodyWrapper $request, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($relatedRecordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delink record
	 * @param string $relatedRecordId A string
	 * @param string $recordId A string
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function delinkRecord(string $relatedRecordId, string $recordId, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($relatedRecordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getFields($this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get related record using external id
	 * @param string $externalFieldValue A string
	 * @param string $externalValue A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getRelatedRecordUsingExternalId(string $externalFieldValue, string $externalValue, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalValue)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalFieldValue)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update related record using external id
	 * @param string $externalFieldValue A string
	 * @param string $externalValue A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateRelatedRecordUsingExternalId(string $externalFieldValue, string $externalValue, BodyWrapper $request, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalValue)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalFieldValue)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete related record using external id
	 * @param string $externalFieldValue A string
	 * @param string $externalValue A string
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteRelatedRecordUsingExternalId(string $externalFieldValue, string $externalValue, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalValue)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($externalFieldValue)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get deleted parent records related record
	 * @param string $recordId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getDeletedParentRecordsRelatedRecord(string $recordId, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/deleted/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
