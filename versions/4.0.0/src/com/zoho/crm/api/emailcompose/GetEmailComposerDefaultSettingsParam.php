<?php 
namespace com\zoho\crm\api\emailcompose;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetEmailComposerDefaultSettingsParam
{

	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.EmailCompose.GetEmailComposerDefaultSettingsParam'); 

	}
} 
