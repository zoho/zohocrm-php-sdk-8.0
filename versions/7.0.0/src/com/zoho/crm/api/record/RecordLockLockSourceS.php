<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Choice;

class RecordLockLockSourceS
{

	public static function Manual()
	{
		return new Choice('Manual'); 

	}
	public static function Automatic()
	{
		return new Choice('Automatic'); 

	}
} 
