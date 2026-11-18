<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\Param;

class GetPickListValueAssociationsParam
{

	public static final function picklistValueId()
	{
		return new Param('picklist_value_id', 'com.zoho.crm.api.GlobalPicklists.GetPickListValueAssociationsParam'); 

	}
} 
