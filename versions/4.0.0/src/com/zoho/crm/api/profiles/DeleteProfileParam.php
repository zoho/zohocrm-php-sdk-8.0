<?php 
namespace com\zoho\crm\api\profiles;

use com\zoho\crm\api\Param;

class DeleteProfileParam
{

	public static final function transferTo()
	{
		return new Param('transfer_to', 'com.zoho.crm.api.Profiles.DeleteProfileParam'); 

	}
} 
