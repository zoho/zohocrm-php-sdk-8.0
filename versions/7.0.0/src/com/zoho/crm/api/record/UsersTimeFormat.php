<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Choice;

class UsersTimeFormat
{

	public static function HHmm()
	{
		return new Choice('HH:mm'); 

	}
	public static function hhmma()
	{
		return new Choice('hh:mm a'); 

	}
} 
