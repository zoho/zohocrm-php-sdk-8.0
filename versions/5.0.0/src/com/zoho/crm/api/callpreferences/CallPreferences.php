<?php 
namespace com\zoho\crm\api\callpreferences;

use com\zoho\crm\api\util\Model;

class CallPreferences implements Model
{

	private  $showFromNumber;
	private  $showToNumber;
	private  $keyModified=array();

	/**
	 * The method to get the showFromNumber
	 * @return bool A bool representing the showFromNumber
	 */
	public function getShowFromNumber()
	{
		return $this->showFromNumber; 

	}

	/**
	 * The method to set the value to showFromNumber
	 * @param bool $showFromNumber A bool
	 */
	public function setShowFromNumber(?bool $showFromNumber)
	{
		$this->showFromNumber=$showFromNumber; 
		$this->keyModified['show_from_number'] = 1; 

	}

	/**
	 * The method to get the showToNumber
	 * @return bool A bool representing the showToNumber
	 */
	public function getShowToNumber()
	{
		return $this->showToNumber; 

	}

	/**
	 * The method to set the value to showToNumber
	 * @param bool $showToNumber A bool
	 */
	public function setShowToNumber(?bool $showToNumber)
	{
		$this->showToNumber=$showToNumber; 
		$this->keyModified['show_to_number'] = 1; 

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
