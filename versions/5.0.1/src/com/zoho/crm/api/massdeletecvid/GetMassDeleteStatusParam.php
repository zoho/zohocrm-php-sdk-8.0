<?php 
namespace com\zoho\crm\api\massdeletecvid;

use com\zoho\crm\api\Param;

class GetMassDeleteStatusParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.MassDeleteCvid.GetMassDeleteStatusParam'); 

	}
} 
