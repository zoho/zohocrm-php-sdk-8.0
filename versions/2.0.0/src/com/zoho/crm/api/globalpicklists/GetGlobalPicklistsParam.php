<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\Param;

class GetGlobalPicklistsParam
{

	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.GlobalPicklists.GetGlobalPicklistsParam'); 

	}
	public static final function includeInnerDetails()
	{
		return new Param('include_inner_details', 'com.zoho.crm.api.GlobalPicklists.GetGlobalPicklistsParam'); 

	}
} 
