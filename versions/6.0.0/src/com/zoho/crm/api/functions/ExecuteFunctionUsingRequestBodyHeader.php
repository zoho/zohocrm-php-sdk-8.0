<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\Header;

class ExecuteFunctionUsingRequestBodyHeader
{

	public static final function customFunctionsHeader()
	{
		return new Header('custom_functions_header', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingRequestBodyHeader'); 

	}
} 
