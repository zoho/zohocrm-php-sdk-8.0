<?php 
namespace com\zoho\crm\api\dealcontactroles;

use com\zoho\crm\api\Param;

class GetAssociatedContactRolesParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.DealContactRoles.GetAssociatedContactRolesParam'); 

	}
	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.DealContactRoles.GetAssociatedContactRolesParam'); 

	}
} 
