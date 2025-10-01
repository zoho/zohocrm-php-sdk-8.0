<?php 
namespace com\zoho\crm\api\fromaddresses;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class FromAddressesOperations
{

	private  $userId;

	/**
	 * Creates an instance of FromAddressesOperations with the given parameters
	 * @param string $userId A string
	 */
	public function __Construct(string $userId=null)
	{
		$this->userId=$userId; 

	}

	/**
	 * The method to get from addresses
	 * @return APIResponse An instance of APIResponse
	 */
	public function getFromAddresses()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v8/settings/emails/actions/from_addresses'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('user_id', 'com.zoho.crm.api.FromAddresses.GetFromAddressesParam'), $this->userId); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
