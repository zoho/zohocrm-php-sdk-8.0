<?php 
namespace com\zoho\crm\api\fieldmapdependency;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class FieldMapDependencyOperations
{

	private  $module;
	private  $layoutId;

	/**
	 * Creates an instance of FieldMapDependencyOperations with the given parameters
	 * @param string $layoutId A string
	 * @param string $module A string
	 */
	public function __Construct(string $layoutId, string $module=null)
	{
		$this->layoutId=$layoutId; 
		$this->module=$module; 

	}

	/**
	 * The method to create map dependency
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function createMapDependency(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/layouts/'); 
		$apiPath=$apiPath.(strval($this->layoutId)); 
		$apiPath=$apiPath.('/map_dependency'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.FieldMapDependency.CreateMapDependencyParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get map dependencies
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public function getMapDependencies(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/layouts/'); 
		$apiPath=$apiPath.(strval($this->layoutId)); 
		$apiPath=$apiPath.('/map_dependency'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.FieldMapDependency.GetMapDependenciesParam'), $this->module); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update map dependency
	 * @param string $dependencyId A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public function updateMapDependency(string $dependencyId, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/layouts/'); 
		$apiPath=$apiPath.(strval($this->layoutId)); 
		$apiPath=$apiPath.('/map_dependency/'); 
		$apiPath=$apiPath.(strval($dependencyId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.FieldMapDependency.UpdateMapDependencyParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get map dependency
	 * @param string $dependencyId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function getMapDependency(string $dependencyId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/layouts/'); 
		$apiPath=$apiPath.(strval($this->layoutId)); 
		$apiPath=$apiPath.('/map_dependency/'); 
		$apiPath=$apiPath.(strval($dependencyId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.FieldMapDependency.GetMapDependencyParam'), $this->module); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete map dependency
	 * @param string $dependencyId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public function deleteMapDependency(string $dependencyId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/layouts/'); 
		$apiPath=$apiPath.(strval($this->layoutId)); 
		$apiPath=$apiPath.('/map_dependency/'); 
		$apiPath=$apiPath.(strval($dependencyId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.FieldMapDependency.DeleteMapDependencyParam'), $this->module); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
