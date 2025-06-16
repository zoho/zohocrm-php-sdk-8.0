<?php 
namespace com\zoho\crm\api\usersunavailability;

use com\zoho\crm\api\Param;

class GetUsersUnavailabilityParam
{

	public static final function includeInnerDetails()
	{
		return new Param('include_inner_details', 'com.zoho.crm.api.UsersUnavailability.GetUsersUnavailabilityParam'); 

	}
	public static final function groupIds()
	{
		return new Param('group_ids', 'com.zoho.crm.api.UsersUnavailability.GetUsersUnavailabilityParam'); 

	}
	public static final function roleIds()
	{
		return new Param('role_ids', 'com.zoho.crm.api.UsersUnavailability.GetUsersUnavailabilityParam'); 

	}
	public static final function territoryIds()
	{
		return new Param('territory_ids', 'com.zoho.crm.api.UsersUnavailability.GetUsersUnavailabilityParam'); 

	}
	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.UsersUnavailability.GetUsersUnavailabilityParam'); 

	}
} 
