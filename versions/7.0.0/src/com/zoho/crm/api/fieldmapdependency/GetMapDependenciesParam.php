<?php 
namespace com\zoho\crm\api\fieldmapdependency;

use com\zoho\crm\api\Param;

class GetMapDependenciesParam
{

	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.FieldMapDependency.GetMapDependenciesParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.FieldMapDependency.GetMapDependenciesParam'); 

	}
	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.FieldMapDependency.GetMapDependenciesParam'); 

	}
} 
