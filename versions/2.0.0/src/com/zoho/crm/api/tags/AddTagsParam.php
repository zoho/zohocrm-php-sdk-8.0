<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\Param;

class AddTagsParam
{

	public static final function overWrite()
	{
		return new Param('over_write', 'com.zoho.crm.api.Tags.AddTagsParam'); 

	}
} 
