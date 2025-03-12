<?php 
namespace com\zoho\crm\api\servicepreference;

use com\zoho\crm\api\util\Model;

class ServicePreference implements Model
{

	private  $jobSheetEnabled;
	private  $keyModified=array();

	/**
	 * The method to get the jobSheetEnabled
	 * @return bool A bool representing the jobSheetEnabled
	 */
	public function getJobSheetEnabled()
	{
		return $this->jobSheetEnabled; 

	}

	/**
	 * The method to set the value to jobSheetEnabled
	 * @param bool $jobSheetEnabled A bool
	 */
	public function setJobSheetEnabled(bool $jobSheetEnabled)
	{
		$this->jobSheetEnabled=$jobSheetEnabled; 
		$this->keyModified['job_sheet_enabled'] = 1; 

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
