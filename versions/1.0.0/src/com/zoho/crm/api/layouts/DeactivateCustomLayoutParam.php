<?php 
namespace com\zoho\crm\api\layouts;

use com\zoho\crm\api\Param;

class DeactivateCustomLayoutParam
{

	public static final function transferTo()
	{
		return new Param('transfer_to', 'com.zoho.crm.api.Layouts.DeactivateCustomLayoutParam'); 

	}
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Layouts.DeactivateCustomLayoutParam'); 

	}
} 
