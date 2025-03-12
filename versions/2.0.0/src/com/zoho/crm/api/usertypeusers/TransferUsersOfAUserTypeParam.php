<?php 
namespace com\zoho\crm\api\usertypeusers;

use com\zoho\crm\api\Param;

class TransferUsersOfAUserTypeParam
{

	public static final function personalityIds()
	{
		return new Param('personality_ids', 'com.zoho.crm.api.UserTypeUsers.TransferUsersOfAUserTypeParam'); 

	}
	public static final function transferTo()
	{
		return new Param('transfer_To', 'com.zoho.crm.api.UserTypeUsers.TransferUsersOfAUserTypeParam'); 

	}
} 
