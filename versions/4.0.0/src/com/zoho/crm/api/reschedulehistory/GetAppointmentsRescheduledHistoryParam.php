<?php 
namespace com\zoho\crm\api\reschedulehistory;

use com\zoho\crm\api\Param;

class GetAppointmentsRescheduledHistoryParam
{

	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentsRescheduledHistoryParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentsRescheduledHistoryParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentsRescheduledHistoryParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentsRescheduledHistoryParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentsRescheduledHistoryParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.RescheduleHistory.GetAppointmentsRescheduledHistoryParam'); 

	}
} 
