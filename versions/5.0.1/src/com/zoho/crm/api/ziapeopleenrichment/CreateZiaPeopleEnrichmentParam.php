<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\Param;

class CreateZiaPeopleEnrichmentParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.ZiaPeopleEnrichment.CreateZiaPeopleEnrichmentParam'); 

	}
	public static final function recordId()
	{
		return new Param('record_id', 'com.zoho.crm.api.ZiaPeopleEnrichment.CreateZiaPeopleEnrichmentParam'); 

	}
} 
