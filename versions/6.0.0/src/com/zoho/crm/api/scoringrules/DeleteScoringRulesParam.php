<?php 
namespace com\zoho\crm\api\scoringrules;

use com\zoho\crm\api\Param;

class DeleteScoringRulesParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.ScoringRules.DeleteScoringRulesParam'); 

	}
} 
