<?php 
namespace com\zoho\crm\api\recyclebin;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class RestoreAllRecords implements Model
{

	private  $restoreAllRecords;
	private  $keyModified=array();

	/**
	 * The method to get the restoreAllRecords
	 * @return Choice An instance of Choice
	 */
	public function getRestoreAllRecords()
	{
		return $this->restoreAllRecords; 

	}

	/**
	 * The method to set the value to restoreAllRecords
	 * @param Choice $restoreAllRecords An instance of Choice
	 */
	public function setRestoreAllRecords(Choice $restoreAllRecords)
	{
		$this->restoreAllRecords=$restoreAllRecords; 
		$this->keyModified['restore_all_records'] = 1; 

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
