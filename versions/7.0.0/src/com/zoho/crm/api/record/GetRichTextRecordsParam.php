<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Param;

class GetRichTextRecordsParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Record.GetRichTextRecordsParam'); 

	}
	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.Record.GetRichTextRecordsParam'); 

	}
} 
