<?php 
namespace com\zoho\crm\api\holidays;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class GetHolidaysParam
{

	public static final function year()
	{
		return new Param('year', 'com.zoho.crm.api.Holidays.GetHolidaysParam'); 

	}
	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.Holidays.GetHolidaysParam'); 

	}
	public static final function shiftId()
	{
		return new Param('shift_id', 'com.zoho.crm.api.Holidays.GetHolidaysParam'); 

	}
} 
