<?php 
namespace com\zoho\crm\api\features;

use com\zoho\crm\api\Param;

class GetFeatureDetailsParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Features.GetFeatureDetailsParam'); 

	}
	public static final function apiNames()
	{
		return new Param('api_names', 'com.zoho.crm.api.Features.GetFeatureDetailsParam'); 

	}
} 
