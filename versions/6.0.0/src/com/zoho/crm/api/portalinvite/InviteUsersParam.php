<?php 
namespace com\zoho\crm\api\portalinvite;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\util\Choice;

class InviteUsersParam
{

	public static final function userTypeId()
	{
		return new Param('user_type_id', 'com.zoho.crm.api.PortalInvite.InviteUsersParam'); 

	}
	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.PortalInvite.InviteUsersParam'); 

	}
	public static final function language()
	{
		return new Param('language', 'com.zoho.crm.api.PortalInvite.InviteUsersParam'); 

	}
} 
