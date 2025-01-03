<?php 
namespace com\zoho\crm\api\findandmerge;

use com\zoho\crm\api\Param;

class GetRecordMergeParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.FindAndMerge.GetRecordMergeParam'); 

	}
} 
