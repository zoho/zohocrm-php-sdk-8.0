<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\Param;

class GetGroupedCountsParam
{

	public static final function groupBy()
	{
		return new Param('group_by', 'com.zoho.crm.api.UserGroups.GetGroupedCountsParam'); 

	}
} 
