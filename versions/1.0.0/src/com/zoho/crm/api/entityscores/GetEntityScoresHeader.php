<?php 
namespace com\zoho\crm\api\entityscores;

use com\zoho\crm\api\Header;

class GetEntityScoresHeader
{

	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.EntityScores.GetEntityScoresHeader'); 

	}
} 
