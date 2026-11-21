<?php 
namespace com\zoho\crm\api\notifications;

use com\zoho\crm\api\Param;

class DeleteNotificationParam
{

	public static final function channelIds()
	{
		return new Param('channel_ids', 'com.zoho.crm.api.Notifications.DeleteNotificationParam'); 

	}
} 
