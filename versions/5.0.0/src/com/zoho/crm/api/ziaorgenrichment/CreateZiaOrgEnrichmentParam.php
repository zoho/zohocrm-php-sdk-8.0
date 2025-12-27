<?php 
namespace com\zoho\crm\api\ziaorgenrichment;

use com\zoho\crm\api\Param;

class CreateZiaOrgEnrichmentParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.ZiaOrgEnrichment.CreateZiaOrgEnrichmentParam'); 

	}
	public static final function recordId()
	{
		return new Param('record_id', 'com.zoho.crm.api.ZiaOrgEnrichment.CreateZiaOrgEnrichmentParam'); 

	}
} 
