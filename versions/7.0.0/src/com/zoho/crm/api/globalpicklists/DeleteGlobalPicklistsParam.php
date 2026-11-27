<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\Param;

class DeleteGlobalPicklistsParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.GlobalPicklists.DeleteGlobalPicklistsParam'); 

	}
} 
