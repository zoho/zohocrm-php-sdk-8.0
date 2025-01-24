<?php 
namespace com\zoho\crm\api\attachments;

use com\zoho\crm\api\Param;

class UploadUrlAttachmentsParam
{

	public static final function attachmentUrl()
	{
		return new Param('attachmentUrl', 'com.zoho.crm.api.Attachments.UploadUrlAttachmentsParam'); 

	}
	public static final function title()
	{
		return new Param('title', 'com.zoho.crm.api.Attachments.UploadUrlAttachmentsParam'); 

	}
} 
