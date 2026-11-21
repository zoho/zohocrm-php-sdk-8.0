<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\Param;

class GetGlobalPicklistParam
{

	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.GlobalPicklists.GetGlobalPicklistParam'); 

	}
	public static final function includeInnerDetails()
	{
		return new Param('include_inner_details', 'com.zoho.crm.api.GlobalPicklists.GetGlobalPicklistParam'); 

	}
} 
