<?php 
namespace com\zoho\crm\api\recordlockingconfiguration;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $recordLockingConfigurations;
	private  $keyModified=array();

	/**
	 * The method to get the recordLockingConfigurations
	 * @return array A array representing the recordLockingConfigurations
	 */
	public function getRecordLockingConfigurations()
	{
		return $this->recordLockingConfigurations; 

	}

	/**
	 * The method to set the value to recordLockingConfigurations
	 * @param array $recordLockingConfigurations A array
	 */
	public function setRecordLockingConfigurations(array $recordLockingConfigurations)
	{
		$this->recordLockingConfigurations=$recordLockingConfigurations; 
		$this->keyModified['record_locking_configurations'] = 1; 

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
