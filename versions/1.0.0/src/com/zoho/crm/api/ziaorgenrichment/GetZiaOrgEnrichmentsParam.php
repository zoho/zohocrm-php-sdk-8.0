<?php 
namespace com\zoho\crm\api\ziaorgenrichment;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetZiaOrgEnrichmentsParam
{

	public static final function status()
	{
		return new Param('status', 'com.zoho.crm.api.ZiaOrgEnrichment.GetZiaOrgEnrichmentsParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.ZiaOrgEnrichment.GetZiaOrgEnrichmentsParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.ZiaOrgEnrichment.GetZiaOrgEnrichmentsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.ZiaOrgEnrichment.GetZiaOrgEnrichmentsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.ZiaOrgEnrichment.GetZiaOrgEnrichmentsParam'); 

	}
} 
