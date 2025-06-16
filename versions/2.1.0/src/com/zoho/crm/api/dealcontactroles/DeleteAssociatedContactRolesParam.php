<?php 
namespace com\zoho\crm\api\dealcontactroles;

use com\zoho\crm\api\Param;

class DeleteAssociatedContactRolesParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.DealContactRoles.DeleteAssociatedContactRolesParam'); 

	}
} 
