<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetFieldsParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
	public static final function dataType()
	{
		return new Param('data_type', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
	public static final function featureName()
	{
		return new Param('feature_name', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
	public static final function component()
	{
		return new Param('component', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
	public static final function layoutId()
	{
		return new Param('layout_id', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}
} 
