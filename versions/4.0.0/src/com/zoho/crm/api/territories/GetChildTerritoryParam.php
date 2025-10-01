<?php 
namespace com\zoho\crm\api\territories;

use com\zoho\crm\api\Param;

class GetChildTerritoryParam
{

	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.Territories.GetChildTerritoryParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Territories.GetChildTerritoryParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Territories.GetChildTerritoryParam'); 

	}
} 
