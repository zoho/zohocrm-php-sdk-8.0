<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\Header;

class ExecuteFunctionUsingParametersHeader
{

	public static final function getCustomFunctionsHeader()
	{
		return new Header('get_custom_functions_header', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingParametersHeader'); 

	}
} 
