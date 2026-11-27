<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\Param;

class ExecuteFunctionUsingParametersParam
{

	public static final function getCustomFunctionsParam()
	{
		return new Param('get_custom_functions_param', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingParametersParam'); 

	}
} 
