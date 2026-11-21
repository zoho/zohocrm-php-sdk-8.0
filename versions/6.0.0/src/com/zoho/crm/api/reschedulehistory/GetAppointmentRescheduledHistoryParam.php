<?php 
namespace com\zoho\crm\api\reschedulehistory;

use com\zoho\crm\api\Param;

class GetAppointmentRescheduledHistoryParam
{

	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentRescheduledHistoryParam'); 

	}
} 
