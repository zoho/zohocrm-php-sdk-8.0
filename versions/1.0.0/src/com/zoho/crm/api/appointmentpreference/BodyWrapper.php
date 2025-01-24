<?php 
namespace com\zoho\crm\api\appointmentpreference;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $appointmentPreferences;
	private  $keyModified=array();

	/**
	 * The method to get the appointmentPreferences
	 * @return AppointmentPreference An instance of AppointmentPreference
	 */
	public function getAppointmentPreferences()
	{
		return $this->appointmentPreferences; 

	}

	/**
	 * The method to set the value to appointmentPreferences
	 * @param AppointmentPreference $appointmentPreferences An instance of AppointmentPreference
	 */
	public function setAppointmentPreferences(AppointmentPreference $appointmentPreferences)
	{
		$this->appointmentPreferences=$appointmentPreferences; 
		$this->keyModified['appointment_preferences'] = 1; 

	}

	/**
	 * The method to check if the user has modified the given key
	 * @param string $key A string
	 * @return int A int representing the modification
	 */
	public function isKeyModified(string $key)
	{
		if(((array_key_exists($key, $this->keyModified))))
		{
			return $this->keyModified[$key]; 

		}
		return null; 

	}

	/**
	 * The method to mark the given key as modified
	 * @param string $key A string
	 * @param int $modification A int
	 */
	public function setKeyModified(string $key, int $modification)
	{
		$this->keyModified[$key] = $modification; 

	}
} 
