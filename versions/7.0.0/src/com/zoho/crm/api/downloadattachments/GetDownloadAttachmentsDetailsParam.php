<?php 
namespace com\zoho\crm\api\downloadattachments;

use com\zoho\crm\api\Param;

class GetDownloadAttachmentsDetailsParam
{

	public static final function userId()
	{
		return new Param('user_id', 'com.zoho.crm.api.DownloadAttachments.GetDownloadAttachmentsDetailsParam'); 

	}
	public static final function messageId()
	{
		return new Param('message_id', 'com.zoho.crm.api.DownloadAttachments.GetDownloadAttachmentsDetailsParam'); 

	}
	public static final function id()
	{
		return new Param('id', 'com.zoho.crm.api.DownloadAttachments.GetDownloadAttachmentsDetailsParam'); 

	}
	public static final function name()
	{
		return new Param('name', 'com.zoho.crm.api.DownloadAttachments.GetDownloadAttachmentsDetailsParam'); 

	}
} 
