<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\Param;

class GetModulesParam
{

	public static final function status()
	{
		return new Param('status', 'com.zoho.crm.api.Modules.GetModulesParam'); 

	}
} 
