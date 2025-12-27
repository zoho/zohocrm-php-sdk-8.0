<?php 
namespace com\zoho\crm\api\territories;

use com\zoho\crm\api\Param;

class DeleteTerritoryParam
{

	public static final function deletePreviousForecasts()
	{
		return new Param('delete_previous_forecasts', 'com.zoho.crm.api.Territories.DeleteTerritoryParam'); 

	}
} 
