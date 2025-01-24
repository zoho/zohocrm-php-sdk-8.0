<?php 
namespace com\zoho\crm\api\profiles;

use com\zoho\crm\api\Param;

class GetProfilesParam
{

	public static final function includeLiteProfile()
	{
		return new Param('include_lite_profile', 'com.zoho.crm.api.Profiles.GetProfilesParam'); 

	}
} 
