<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetTimelinesParam
{

	public static final function includeInnerDetails()
	{
		return new Param('include_inner_details', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function includeTimelineType()
	{
		return new Param('include_timeline_type', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function filters()
	{
		return new Param('filters', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
	public static final function pageToken()
	{
		return new Param('page_token', 'com.zoho.crm.api.Timelines.GetTimelinesParam'); 

	}
} 
