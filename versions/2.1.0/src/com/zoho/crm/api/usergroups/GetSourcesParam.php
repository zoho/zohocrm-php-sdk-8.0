<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\Param;

class GetSourcesParam
{

	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.UserGroups.GetSourcesParam'); 

	}
	public static final function userType()
	{
		return new Param('user_type', 'com.zoho.crm.api.UserGroups.GetSourcesParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.UserGroups.GetSourcesParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.UserGroups.GetSourcesParam'); 

	}
} 
