<?php 
namespace com\zoho\crm\api\duplicatecheckpreference;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $duplicateCheckPreference;
	private  $keyModified=array();

	/**
	 * The method to get the duplicateCheckPreference
	 * @return ActionResponse An instance of ActionResponse
	 */
	public function getDuplicateCheckPreference()
	{
		return $this->duplicateCheckPreference; 

	}

	/**
	 * The method to set the value to duplicateCheckPreference
	 * @param ActionResponse $duplicateCheckPreference An instance of ActionResponse
	 */
	public function setDuplicateCheckPreference(?ActionResponse $duplicateCheckPreference)
	{
		$this->duplicateCheckPreference=$duplicateCheckPreference; 
		$this->keyModified['duplicate_check_preference'] = 1; 

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
