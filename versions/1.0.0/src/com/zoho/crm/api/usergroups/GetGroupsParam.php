<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\Param;

class GetGroupsParam
{

	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.UserGroups.GetGroupsParam'); 

	}
	public static final function name()
	{
		return new Param('name', 'com.zoho.crm.api.UserGroups.GetGroupsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.UserGroups.GetGroupsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.UserGroups.GetGroupsParam'); 

	}
	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.UserGroups.GetGroupsParam'); 

	}
} 
