<?php 
namespace com\zoho\crm\api\features;

use com\zoho\crm\api\util\Model;

class Detail implements Model
{

	private  $availableCount;
	private  $limits;
	private  $usedCount;
	private  $keyModified=array();

	/**
	 * The method to get the availableCount
	 * @return Limit An instance of Limit
	 */
	public function getAvailableCount()
	{
		return $this->availableCount; 

	}

	/**
	 * The method to set the value to availableCount
	 * @param Limit $availableCount An instance of Limit
	 */
	public function setAvailableCount(Limit $availableCount)
	{
		$this->availableCount=$availableCount; 
		$this->keyModified['available_count'] = 1; 

	}

	/**
	 * The method to get the limits
	 * @return Limit An instance of Limit
	 */
	public function getLimits()
	{
		return $this->limits; 

	}

	/**
	 * The method to set the value to limits
	 * @param Limit $limits An instance of Limit
	 */
	public function setLimits(Limit $limits)
	{
		$this->limits=$limits; 
		$this->keyModified['limits'] = 1; 

	}

	/**
	 * The method to get the usedCount
	 * @return Limit An instance of Limit
	 */
	public function getUsedCount()
	{
		return $this->usedCount; 

	}

	/**
	 * The method to set the value to usedCount
	 * @param Limit $usedCount An instance of Limit
	 */
	public function setUsedCount(Limit $usedCount)
	{
		$this->usedCount=$usedCount; 
		$this->keyModified['used_count'] = 1; 

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
