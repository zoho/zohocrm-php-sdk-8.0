<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Param;

class GetDeletedParentRecordsRelatedRecordParam
{

	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.RelatedRecords.GetDeletedParentRecordsRelatedRecordParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.RelatedRecords.GetDeletedParentRecordsRelatedRecordParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.RelatedRecords.GetDeletedParentRecordsRelatedRecordParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.RelatedRecords.GetDeletedParentRecordsRelatedRecordParam'); 

	}
} 
