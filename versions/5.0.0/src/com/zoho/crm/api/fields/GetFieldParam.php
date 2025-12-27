<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\Param;

class GetFieldParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Fields.GetFieldParam'); 

	}
	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.Fields.GetFieldParam'); 

	}
} 
