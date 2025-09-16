<?php 
namespace com\zoho\crm\api\territories;

use com\zoho\crm\api\Param;

class GetTerritoriesParam
{

	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.Territories.GetTerritoriesParam'); 

	}
	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.Territories.GetTerritoriesParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Territories.GetTerritoriesParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Territories.GetTerritoriesParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Territories.GetTerritoriesParam'); 

	}
} 
