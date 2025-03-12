<?php 
namespace com\zoho\crm\api\appointmentpreference;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $appointmentPreferences;
	private  $keyModified=array();

	/**
	 * The method to get the appointmentPreferences
	 * @return ActionResponse An instance of ActionResponse
	 */
	public function getAppointmentPreferences()
	{
		return $this->appointmentPreferences; 

	}

	/**
	 * The method to set the value to appointmentPreferences
	 * @param ActionResponse $appointmentPreferences An instance of ActionResponse
	 */
	public function setAppointmentPreferences(ActionResponse $appointmentPreferences)
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
