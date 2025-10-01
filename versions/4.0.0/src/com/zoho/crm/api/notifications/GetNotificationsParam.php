<?php 
namespace com\zoho\crm\api\notifications;

use com\zoho\crm\api\Param;

class GetNotificationsParam
{

	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Notifications.GetNotificationsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Notifications.GetNotificationsParam'); 

	}
	public static final function channelId()
	{
		return new Param('channel_id', 'com.zoho.crm.api.Notifications.GetNotificationsParam'); 

	}
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Notifications.GetNotificationsParam'); 

	}
} 
