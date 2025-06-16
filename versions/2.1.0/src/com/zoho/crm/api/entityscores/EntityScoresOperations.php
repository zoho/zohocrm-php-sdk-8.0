<?php 
namespace com\zoho\crm\api\entityscores;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class EntityScoresOperations
{

	private  $fields;
	private  $cvid;

	/**
	 * Creates an instance of EntityScoresOperations with the given parameters
	 * @param string $fields A string
	 * @param string $cvid A string
	 */
	public function __Construct(string $fields=null, string $cvid=null)
	{
		$this->fields=$fields; 
		$this->cvid=$cvid; 

	}

	/**
	 * The method to get entity score
	 * @param string $recordId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getEntityScore(string $recordId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Entity_Scores__s/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('fields', 'com.zoho.crm.api.EntityScores.GetEntityScoreParam'), $this->fields); 
		$handlerInstance->addParam(new Param('cvid', 'com.zoho.crm.api.EntityScores.GetEntityScoreParam'), $this->cvid); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to get entity scores
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getEntityScores(ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/Entity_Scores__s'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('fields', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'), $this->fields); 
		$handlerInstance->addParam(new Param('cvid', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'), $this->cvid); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
