<?php 
namespace com\zoho\crm\api\masschangeowner;

use com\zoho\crm\api\Param;

class CheckStatusParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.MassChangeOwner.CheckStatusParam'); 

	}
} 
