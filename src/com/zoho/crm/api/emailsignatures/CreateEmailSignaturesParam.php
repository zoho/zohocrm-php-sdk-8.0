<?php 
namespace com\zoho\crm\api\emailsignatures;

use com\zoho\crm\api\Param;

class CreateEmailSignaturesParam
{

	public static final function userId()
	{
		return new Param('user_id', 'com.zoho.crm.api.EmailSignatures.CreateEmailSignaturesParam'); 

	}
} 
