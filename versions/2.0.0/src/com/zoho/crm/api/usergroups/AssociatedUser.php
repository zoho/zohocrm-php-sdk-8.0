<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class AssociatedUser implements Model
{

	private  $userGroup;
	private  $count;
	private  $keyModified=array();

	/**
	 * The method to get the userGroup
	 * @return UserGroup An instance of UserGroup
	 */
	public function getUserGroup()
	{
		return $this->userGroup; 

	}

	/**
	 * The method to set the value to userGroup
	 * @param UserGroup $userGroup An instance of UserGroup
	 */
	public function setUserGroup(UserGroup $userGroup)
	{
		$this->userGroup=$userGroup; 
		$this->keyModified['user_group'] = 1; 

	}

	/**
	 * The method to get the count
	 * @return int A int representing the count
	 */
	public function getCount()
	{
		return $this->count; 

	}

	/**
	 * The method to set the value to count
	 * @param int $count A int
	 */
	public function setCount(int $count)
	{
		$this->count=$count; 
		$this->keyModified['count'] = 1; 

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
