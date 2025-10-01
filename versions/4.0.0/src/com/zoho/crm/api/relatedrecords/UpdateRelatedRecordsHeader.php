<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Header;

class UpdateRelatedRecordsHeader
{

	public static final function XEXTERNAL()
	{
		return new Header('X-EXTERNAL', 'com.zoho.crm.api.RelatedRecords.UpdateRelatedRecordsHeader'); 

	}
} 
