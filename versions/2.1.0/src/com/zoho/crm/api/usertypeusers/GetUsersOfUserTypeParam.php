<?php 
namespace com\zoho\crm\api\usertypeusers;

use com\zoho\crm\api\Param;

class GetUsersOfUserTypeParam
{

	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.UserTypeUsers.GetUsersOfUserTypeParam'); 

	}
	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.UserTypeUsers.GetUsersOfUserTypeParam'); 

	}
} 
