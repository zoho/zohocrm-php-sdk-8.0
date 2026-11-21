<?php 
namespace com\zoho\crm\api\recordlocking;

use com\zoho\crm\api\Param;

class GetRecordLockingInformationParam
{

	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.RecordLocking.GetRecordLockingInformationParam'); 

	}
} 
