<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class UsersCountParam
{

	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.Users.UsersCountParam'); 

	}
} 
