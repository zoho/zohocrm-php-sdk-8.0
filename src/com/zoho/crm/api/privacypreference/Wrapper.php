<?php 
namespace com\zoho\crm\api\privacypreference;

use com\zoho\crm\api\util\Model;

class Wrapper implements Model
{

	private  $privacypreference;
	private  $keyModified=array();

	/**
	 * The method to get the privacypreference
	 * @return array A array representing the privacypreference
	 */
	public function getPrivacypreference()
	{
		return $this->privacypreference; 

	}

	/**
	 * The method to set the value to privacypreference
	 * @param array $privacypreference A array
	 */
	public function setPrivacypreference(array $privacypreference)
	{
		$this->privacypreference=$privacypreference; 
		$this->keyModified['privacyPreference'] = 1; 

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
