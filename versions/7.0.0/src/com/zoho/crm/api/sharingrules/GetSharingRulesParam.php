<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\Param;

class GetSharingRulesParam
{

	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.SharingRules.GetSharingRulesParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.SharingRules.GetSharingRulesParam'); 

	}
} 
