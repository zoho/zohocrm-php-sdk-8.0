<?php 
namespace com\zoho\crm\api\massconvert;

use com\zoho\crm\api\Param;

class GetJobStatusParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.MassConvert.GetJobStatusParam'); 

	}
} 
