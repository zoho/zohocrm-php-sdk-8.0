<?php 
namespace com\zoho\crm\api\massdeletetags;

use com\zoho\crm\api\Param;

class GetStatusParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.MassDeleteTags.GetStatusParam'); 

	}
} 
