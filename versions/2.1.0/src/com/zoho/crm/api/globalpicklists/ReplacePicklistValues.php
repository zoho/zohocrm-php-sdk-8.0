<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\util\Model;

class ReplacePicklistValues implements Model
{

	private  $newValue;
	private  $oldValue;
	private  $keyModified=array();

	/**
	 * The method to get the newValue
	 * @return ReplacePicklistValue An instance of ReplacePicklistValue
	 */
	public function getNewValue()
	{
		return $this->newValue; 

	}

	/**
	 * The method to set the value to newValue
	 * @param ReplacePicklistValue $newValue An instance of ReplacePicklistValue
	 */
	public function setNewValue(ReplacePicklistValue $newValue)
	{
		$this->newValue=$newValue; 
		$this->keyModified['new_value'] = 1; 

	}

	/**
	 * The method to get the oldValue
	 * @return ReplacePicklistValue An instance of ReplacePicklistValue
	 */
	public function getOldValue()
	{
		return $this->oldValue; 

	}

	/**
	 * The method to set the value to oldValue
	 * @param ReplacePicklistValue $oldValue An instance of ReplacePicklistValue
	 */
	public function setOldValue(ReplacePicklistValue $oldValue)
	{
		$this->oldValue=$oldValue; 
		$this->keyModified['old_value'] = 1; 

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
