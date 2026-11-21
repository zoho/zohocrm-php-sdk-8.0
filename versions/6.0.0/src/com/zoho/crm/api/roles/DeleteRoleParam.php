<?php 
namespace com\zoho\crm\api\roles;

use com\zoho\crm\api\Param;

class DeleteRoleParam
{

	public static final function transferToId()
	{
		return new Param('transfer_to_id', 'com.zoho.crm.api.Roles.DeleteRoleParam'); 

	}
} 
