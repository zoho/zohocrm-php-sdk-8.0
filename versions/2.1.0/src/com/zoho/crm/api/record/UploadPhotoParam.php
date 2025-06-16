<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Param;

class UploadPhotoParam
{

	public static final function restrictTriggers()
	{
		return new Param('restrict_triggers', 'com.zoho.crm.api.Record.UploadPhotoParam'); 

	}
} 
