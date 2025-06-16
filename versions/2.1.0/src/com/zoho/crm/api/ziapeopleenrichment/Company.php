<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class Company implements Model
{

	private  $website;
	private  $name;
	private  $keyModified=array();

	/**
	 * The method to get the website
	 * @return string A string representing the website
	 */
	public function getWebsite()
	{
		return $this->website; 

	}

	/**
	 * The method to set the value to website
	 * @param string $website A string
	 */
	public function setWebsite(string $website)
	{
		$this->website=$website; 
		$this->keyModified['website'] = 1; 

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
