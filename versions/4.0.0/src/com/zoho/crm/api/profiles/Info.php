<?php 
namespace com\zoho\crm\api\profiles;

use com\zoho\crm\api\util\Model;

class Info implements Model
{

	private  $licenseLimit;
	private  $keyModified=array();

	/**
	 * The method to get the licenseLimit
	 * @return int A int representing the licenseLimit
	 */
	public function getLicenseLimit()
	{
		return $this->licenseLimit; 

	}

	/**
	 * The method to set the value to licenseLimit
	 * @param int $licenseLimit A int
	 */
	public function setLicenseLimit(int $licenseLimit)
	{
		$this->licenseLimit=$licenseLimit; 
		$this->keyModified['license_limit'] = 1; 

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
