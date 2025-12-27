<?php 
namespace com\zoho\crm\api\territories;

use com\zoho\crm\api\Param;

class DeleteTerritoriesParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Territories.DeleteTerritoriesParam'); 

	}
	public static final function deletePreviousForecasts()
	{
		return new Param('delete_previous_forecasts', 'com.zoho.crm.api.Territories.DeleteTerritoriesParam'); 

	}
} 
