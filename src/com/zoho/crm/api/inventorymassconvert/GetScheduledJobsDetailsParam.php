<?php 
namespace com\zoho\crm\api\inventorymassconvert;

use com\zoho\crm\api\Param;

class GetScheduledJobsDetailsParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.InventoryMassConvert.GetScheduledJobsDetailsParam'); 

	}
} 
