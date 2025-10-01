<?php 
namespace com\zoho\crm\api\inventorytemplates;

use com\zoho\crm\api\Param;

class GetInventoryTemplatesParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.InventoryTemplates.GetInventoryTemplatesParam'); 

	}
	public static final function category()
	{
		return new Param('category', 'com.zoho.crm.api.InventoryTemplates.GetInventoryTemplatesParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.InventoryTemplates.GetInventoryTemplatesParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.InventoryTemplates.GetInventoryTemplatesParam'); 

	}
	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.InventoryTemplates.GetInventoryTemplatesParam'); 

	}
} 
