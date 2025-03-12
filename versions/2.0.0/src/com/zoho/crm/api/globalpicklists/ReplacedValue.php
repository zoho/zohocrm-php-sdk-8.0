<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\util\Model;

class ReplacedValue implements Model
{

	private  $displayValue;
	private  $actualValue;
	private  $keyModified=array();

	/**
	 * The method to get the displayValue
	 * @return string A string representing the displayValue
	 */
	public function getDisplayValue()
	{
		return $this->displayValue; 

	}

	/**
	 * The method to set the value to displayValue
	 * @param string $displayValue A string
	 */
	public function setDisplayValue(string $displayValue)
	{
		$this->displayValue=$displayValue; 
		$this->keyModified['display_value'] = 1; 

	}

	/**
	 * The method to get the actualValue
	 * @return string A string representing the actualValue
	 */
	public function getActualValue()
	{
		return $this->actualValue; 

	}

	/**
	 * The method to set the value to actualValue
	 * @param string $actualValue A string
	 */
	public function setActualValue(string $actualValue)
	{
		$this->actualValue=$actualValue; 
		$this->keyModified['actual_value'] = 1; 

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
