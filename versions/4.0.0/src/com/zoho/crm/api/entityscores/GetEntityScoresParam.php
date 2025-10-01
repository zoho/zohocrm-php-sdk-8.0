<?php 
namespace com\zoho\crm\api\entityscores;

use com\zoho\crm\api\Param;

class GetEntityScoresParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'); 

	}
	public static final function pageToken()
	{
		return new Param('page_token', 'com.zoho.crm.api.EntityScores.GetEntityScoresParam'); 

	}
} 
