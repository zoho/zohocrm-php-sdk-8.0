<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Param;

class GetRelatedRecordParam
{

	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordParam'); 

	}
} 
