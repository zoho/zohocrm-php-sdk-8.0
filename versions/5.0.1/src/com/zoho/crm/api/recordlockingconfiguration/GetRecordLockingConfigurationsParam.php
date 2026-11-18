<?php 
namespace com\zoho\crm\api\recordlockingconfiguration;

use com\zoho\crm\api\Param;

class GetRecordLockingConfigurationsParam
{

	public static final function featureType()
	{
		return new Param('feature_type', 'com.zoho.crm.api.RecordLockingConfiguration.GetRecordLockingConfigurationsParam'); 

	}
} 
