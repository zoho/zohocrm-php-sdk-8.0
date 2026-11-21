<?php 
namespace com\zoho\crm\api\appointmentpreference;

use com\zoho\crm\api\Param;

class GetAppointmentPreferenceParam
{

	public static final function include()
	{
		return new Param('include', 'com.zoho.crm.api.AppointmentPreference.GetAppointmentPreferenceParam'); 

	}
} 
