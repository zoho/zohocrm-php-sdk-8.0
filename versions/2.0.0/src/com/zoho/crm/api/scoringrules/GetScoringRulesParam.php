<?php 
namespace com\zoho\crm\api\scoringrules;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetScoringRulesParam
{

	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.ScoringRules.GetScoringRulesParam'); 

	}
	public static final function layoutId()
	{
		return new Param('layout_id', 'com.zoho.crm.api.ScoringRules.GetScoringRulesParam'); 

	}
	public static final function active()
	{
		return new Param('active', 'com.zoho.crm.api.ScoringRules.GetScoringRulesParam'); 

	}
	public static final function name()
	{
		return new Param('name', 'com.zoho.crm.api.ScoringRules.GetScoringRulesParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.ScoringRules.GetScoringRulesParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.ScoringRules.GetScoringRulesParam'); 

	}
} 
