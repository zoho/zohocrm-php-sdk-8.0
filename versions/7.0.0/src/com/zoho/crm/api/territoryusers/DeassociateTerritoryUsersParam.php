<?php 
namespace com\zoho\crm\api\territoryusers;

use com\zoho\crm\api\Param;

class DeassociateTerritoryUsersParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.TerritoryUsers.DeassociateTerritoryUsersParam'); 

	}
} 
