<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\Param;

class CreateTagsParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Tags.CreateTagsParam'); 

	}
	public static final function colorCode()
	{
		return new Param('color_code', 'com.zoho.crm.api.Tags.CreateTagsParam'); 

	}
} 
