<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetModulesParam
{

	public static final function status()
	{
		return new Param('status', 'com.zoho.crm.api.Modules.GetModulesParam'); 

	}
} 
