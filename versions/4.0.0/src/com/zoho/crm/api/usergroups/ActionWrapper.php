<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $userGroups;
	private  $keyModified=array();

	/**
	 * The method to get the userGroups
	 * @return array A array representing the userGroups
	 */
	public function getUserGroups()
	{
		return $this->userGroups; 

	}

	/**
	 * The method to set the value to userGroups
	 * @param array $userGroups A array
	 */
	public function setUserGroups(array $userGroups)
	{
		$this->userGroups=$userGroups; 
		$this->keyModified['user_groups'] = 1; 

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
