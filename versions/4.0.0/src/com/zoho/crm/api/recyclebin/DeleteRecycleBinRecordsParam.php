<?php 
namespace com\zoho\crm\api\recyclebin;

use com\zoho\crm\api\Param;

class DeleteRecycleBinRecordsParam
{

	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.RecycleBin.DeleteRecycleBinRecordsParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.RecycleBin.DeleteRecycleBinRecordsParam'); 

	}
} 
