<?php 
namespace com\zoho\crm\api\emailsignatures;

use com\zoho\crm\api\Param;

class DeleteEmailSignaturesParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.EmailSignatures.DeleteEmailSignaturesParam'); 

	}
} 
