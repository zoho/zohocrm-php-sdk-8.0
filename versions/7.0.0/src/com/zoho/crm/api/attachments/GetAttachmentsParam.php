<?php 
namespace com\zoho\crm\api\attachments;

use com\zoho\crm\api\Param;

class GetAttachmentsParam
{

	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.Attachments.GetAttachmentsParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Attachments.GetAttachmentsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Attachments.GetAttachmentsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Attachments.GetAttachmentsParam'); 

	}
	public static final function pageToken()
	{
		return new Param('page_token', 'com.zoho.crm.api.Attachments.GetAttachmentsParam'); 

	}
} 
