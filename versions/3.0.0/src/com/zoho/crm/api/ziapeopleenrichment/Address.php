<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class Address implements Model
{

	private  $continent;
	private  $country;
	private  $name;
	private  $region;
	private  $primary;
	private  $keyModified=array();

	/**
	 * The method to get the continent
	 * @return string A string representing the continent
	 */
	public function getContinent()
	{
		return $this->continent; 

	}

	/**
	 * The method to set the value to continent
	 * @param string $continent A string
	 */
	public function setContinent(string $continent)
	{
		$this->continent=$continent; 
		$this->keyModified['continent'] = 1; 

	}

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
	public function setCountry(string $country)
	{
		$this->country=$country; 
		$this->keyModified['country'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the region
	 * @return string A string representing the region
	 */
	public function getRegion()
	{
		return $this->region; 

	}

	/**
	 * The method to set the value to region
	 * @param string $region A string
	 */
	public function setRegion(string $region)
	{
		$this->region=$region; 
		$this->keyModified['region'] = 1; 

	}

	/**
	 * The method to get the primary
	 * @return bool A bool representing the primary
	 */
	public function getPrimary()
	{
		return $this->primary; 

	}

	/**
	 * The method to set the value to primary
	 * @param bool $primary A bool
	 */
	public function setPrimary(bool $primary)
	{
		$this->primary=$primary; 
		$this->keyModified['primary'] = 1; 

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
