<?php 
namespace com\zoho\crm\api\ziaorgenrichment;

use com\zoho\crm\api\util\Model;

class Address implements Model
{

	private  $country;
	private  $city;
	private  $pinCode;
	private  $state;
	private  $fillAddress;
	private  $keyModified=array();

	/**
	 * The method to get the country
	 * @return string A string representing the country
	 */
	public function getCountry()
	{
		return $this->country; 

	}

	/**
	 * The method to set the value to country
	 * @param string $country A string
	 */
	public function setCountry(?string $country)
	{
		$this->country=$country; 
		$this->keyModified['country'] = 1; 

	}

	/**
	 * The method to get the city
	 * @return string A string representing the city
	 */
	public function getCity()
	{
		return $this->city; 

	}

	/**
	 * The method to set the value to city
	 * @param string $city A string
	 */
	public function setCity(?string $city)
	{
		$this->city=$city; 
		$this->keyModified['city'] = 1; 

	}

	/**
	 * The method to get the pinCode
	 * @return string A string representing the pinCode
	 */
	public function getPinCode()
	{
		return $this->pinCode; 

	}

	/**
	 * The method to set the value to pinCode
	 * @param string $pinCode A string
	 */
	public function setPinCode(?string $pinCode)
	{
		$this->pinCode=$pinCode; 
		$this->keyModified['pin_code'] = 1; 

	}

	/**
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public function setState(?string $state)
	{
		$this->state=$state; 
		$this->keyModified['state'] = 1; 

	}

	/**
	 * The method to get the fillAddress
	 * @return string A string representing the fillAddress
	 */
	public function getFillAddress()
	{
		return $this->fillAddress; 

	}

	/**
	 * The method to set the value to fillAddress
	 * @param string $fillAddress A string
	 */
	public function setFillAddress(?string $fillAddress)
	{
		$this->fillAddress=$fillAddress; 
		$this->keyModified['fill_address'] = 1; 

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
