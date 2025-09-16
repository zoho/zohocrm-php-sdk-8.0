<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class SharingProperties implements Model
{

	private  $schedulerStatus;
	private  $sharePreferenceEnabled;
	private  $sharePermission;
	private  $keyModified=array();

	/**
	 * The method to get the schedulerStatus
	 * @return string A string representing the schedulerStatus
	 */
	public function getSchedulerStatus()
	{
		return $this->schedulerStatus; 

	}

	/**
	 * The method to set the value to schedulerStatus
	 * @param string $schedulerStatus A string
	 */
	public function setSchedulerStatus(string $schedulerStatus)
	{
		$this->schedulerStatus=$schedulerStatus; 
		$this->keyModified['scheduler_status'] = 1; 

	}

	/**
	 * The method to get the sharePreferenceEnabled
	 * @return bool A bool representing the sharePreferenceEnabled
	 */
	public function getSharePreferenceEnabled()
	{
		return $this->sharePreferenceEnabled; 

	}

	/**
	 * The method to set the value to sharePreferenceEnabled
	 * @param bool $sharePreferenceEnabled A bool
	 */
	public function setSharePreferenceEnabled(bool $sharePreferenceEnabled)
	{
		$this->sharePreferenceEnabled=$sharePreferenceEnabled; 
		$this->keyModified['share_preference_enabled'] = 1; 

	}

	/**
	 * The method to get the sharePermission
	 * @return Choice An instance of Choice
	 */
	public function getSharePermission()
	{
		return $this->sharePermission; 

	}

	/**
	 * The method to set the value to sharePermission
	 * @param Choice $sharePermission An instance of Choice
	 */
	public function setSharePermission(Choice $sharePermission)
	{
		$this->sharePermission=$sharePermission; 
		$this->keyModified['share_permission'] = 1; 

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
