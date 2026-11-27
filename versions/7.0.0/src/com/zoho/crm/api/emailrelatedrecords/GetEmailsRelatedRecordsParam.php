<?php 
namespace com\zoho\crm\api\emailrelatedrecords;

use com\zoho\crm\api\Param;

class GetEmailsRelatedRecordsParam
{

	public static final function filter()
	{
		return new Param('filter', 'com.zoho.crm.api.EmailRelatedRecords.GetEmailsRelatedRecordsParam'); 

	}
	public static final function index()
	{
		return new Param('index', 'com.zoho.crm.api.EmailRelatedRecords.GetEmailsRelatedRecordsParam'); 

	}
} 
