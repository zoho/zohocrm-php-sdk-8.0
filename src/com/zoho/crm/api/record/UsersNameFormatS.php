<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Choice;

class UsersNameFormatS
{

	public static function SalutationFirstNameLastName()
	{
		return new Choice('Salutation,First Name,Last Name'); 

	}
	public static function SaluationLastNameFirstName()
	{
		return new Choice('Saluation,Last Name,First Name'); 

	}
	public static function FirstNameLastNameSaluation()
	{
		return new Choice('First Name,Last Name,Saluation'); 

	}
} 
