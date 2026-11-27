<?php 
namespace com\zoho\crm\api\downloadinlineimages;

use com\zoho\crm\api\Param;

class GetDownloadInlineImagesParam
{

	public static final function userId()
	{
		return new Param('user_id', 'com.zoho.crm.api.DownloadInlineImages.GetDownloadInlineImagesParam'); 

	}
	public static final function messageId()
	{
		return new Param('message_id', 'com.zoho.crm.api.DownloadInlineImages.GetDownloadInlineImagesParam'); 

	}
	public static final function id()
	{
		return new Param('id', 'com.zoho.crm.api.DownloadInlineImages.GetDownloadInlineImagesParam'); 

	}
} 
