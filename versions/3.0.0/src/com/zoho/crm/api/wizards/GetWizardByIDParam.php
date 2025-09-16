<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\Param;

class GetWizardByIDParam
{

	public static final function layoutId()
	{
		return new Param('layout_id', 'com.zoho.crm.api.Wizards.GetWizardByIDParam'); 

	}
} 
