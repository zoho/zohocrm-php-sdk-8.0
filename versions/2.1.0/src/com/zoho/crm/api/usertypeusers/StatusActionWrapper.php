<?php 
namespace com\zoho\crm\api\usertypeusers;

use com\zoho\crm\api\util\Model;

class StatusActionWrapper implements Model, StatusActionHandler
{

	private  $changeStatus;
	private  $keyModified=array();

	/**
	 * The method to get the changeStatus
	 * @return array A array representing the changeStatus
	 */
	public function getChangeStatus()
	{
		return $this->changeStatus; 

	}

	/**
	 * The method to set the value to changeStatus
	 * @param array $changeStatus A array
	 */
	public function setChangeStatus(array $changeStatus)
	{
		$this->changeStatus=$changeStatus; 
		$this->keyModified['change_status'] = 1; 

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
