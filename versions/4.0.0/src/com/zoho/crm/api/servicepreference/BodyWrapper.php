<?php 
namespace com\zoho\crm\api\servicepreference;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $servicePreferences;
	private  $keyModified=array();

	/**
	 * The method to get the servicePreferences
	 * @return ServicePreference An instance of ServicePreference
	 */
	public function getServicePreferences()
	{
		return $this->servicePreferences; 

	}

	/**
	 * The method to set the value to servicePreferences
	 * @param ServicePreference $servicePreferences An instance of ServicePreference
	 */
	public function setServicePreferences(ServicePreference $servicePreferences)
	{
		$this->servicePreferences=$servicePreferences; 
		$this->keyModified['service_preferences'] = 1; 

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
