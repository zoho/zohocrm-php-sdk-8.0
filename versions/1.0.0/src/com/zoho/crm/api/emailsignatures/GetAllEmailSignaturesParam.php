<?php 
namespace com\zoho\crm\api\emailsignatures;

use com\zoho\crm\api\Param;

class GetAllEmailSignaturesParam
{

	public static final function userId()
	{
		return new Param('user_id', 'com.zoho.crm.api.EmailSignatures.GetAllEmailSignaturesParam'); 

	}
} 
