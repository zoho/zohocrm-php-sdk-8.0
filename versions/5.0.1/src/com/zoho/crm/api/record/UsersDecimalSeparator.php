<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Choice;

class UsersDecimalSeparator
{

	public static function Comma()
	{
		return new Choice('Comma'); 

	}
	public static function Period()
	{
		return new Choice('Period'); 

	}
} 
