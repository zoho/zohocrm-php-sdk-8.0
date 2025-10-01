<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\Param;

class GetAssociatedGroupsParam
{

	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.Users.GetAssociatedGroupsParam'); 

	}
} 
