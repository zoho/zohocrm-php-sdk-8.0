<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\Param;

class GetAssociationsParam
{

	public static final function includeInnerDetails()
	{
		return new Param('include_inner_details', 'com.zoho.crm.api.GlobalPicklists.GetAssociationsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.GlobalPicklists.GetAssociationsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.GlobalPicklists.GetAssociationsParam'); 

	}
} 
