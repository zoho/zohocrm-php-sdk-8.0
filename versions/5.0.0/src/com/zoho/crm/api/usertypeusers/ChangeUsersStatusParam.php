<?php 
namespace com\zoho\crm\api\usertypeusers;

use com\zoho\crm\api\Param;

class ChangeUsersStatusParam
{

	public static final function active()
	{
		return new Param('active', 'com.zoho.crm.api.UserTypeUsers.ChangeUsersStatusParam'); 

	}
} 
