<?php 
namespace com\zoho\crm\api\org;

use com\zoho\crm\api\util\Model;

class CheckinPreferences implements Model
{

	private  $restrictedEventTypes;
	private  $keyModified=array();

	/**
	 * The method to get the restrictedEventTypes
	 * @return string A string representing the restrictedEventTypes
	 */
	public function getRestrictedEventTypes()
	{
		return $this->restrictedEventTypes; 

	}

	/**
	 * The method to set the value to restrictedEventTypes
	 * @param string $restrictedEventTypes A string
	 */
	public function setRestrictedEventTypes(string $restrictedEventTypes)
	{
		$this->restrictedEventTypes=$restrictedEventTypes; 
		$this->keyModified['restricted_event_types'] = 1; 

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
