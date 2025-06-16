<?php 
namespace com\zoho\crm\api\portalusertype;

use com\zoho\crm\api\Param;

class GetUserTypesParam
{

	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.PortalUserType.GetUserTypesParam'); 

	}
} 
