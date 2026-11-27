<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\Param;

class GetAssociatedUsersCountParam
{

	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.UserGroups.GetAssociatedUsersCountParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.UserGroups.GetAssociatedUsersCountParam'); 

	}
	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.UserGroups.GetAssociatedUsersCountParam'); 

	}
} 
