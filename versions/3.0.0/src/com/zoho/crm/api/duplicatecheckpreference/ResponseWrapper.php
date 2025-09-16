<?php 
namespace com\zoho\crm\api\duplicatecheckpreference;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $duplicateCheckPreference;
	private  $keyModified=array();

	/**
	 * The method to get the duplicateCheckPreference
	 * @return DuplicateCheckPreference An instance of DuplicateCheckPreference
	 */
	public function getDuplicateCheckPreference()
	{
		return $this->duplicateCheckPreference; 

	}

	/**
	 * The method to set the value to duplicateCheckPreference
	 * @param DuplicateCheckPreference $duplicateCheckPreference An instance of DuplicateCheckPreference
	 */
	public function setDuplicateCheckPreference(DuplicateCheckPreference $duplicateCheckPreference)
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
