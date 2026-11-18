<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\Param;

class ExecuteFunctionUsingRequestBodyParam
{

	public static final function customFunctionsParam()
	{
		return new Param('custom_functions_param', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingRequestBodyParam'); 

	}
} 
