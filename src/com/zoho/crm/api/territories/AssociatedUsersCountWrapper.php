<?php 
namespace com\zoho\crm\api\territories;

use com\zoho\crm\api\util\Model;

class AssociatedUsersCountWrapper implements Model, ResponseHandler
{

	private  $associatedUsersCount;
	private  $info;
	private  $keyModified=array();

	/**
	 * The method to get the associatedUsersCount
	 * @return array A array representing the associatedUsersCount
	 */
	public function getAssociatedUsersCount()
	{
		return $this->associatedUsersCount; 

	}

	/**
	 * The method to set the value to associatedUsersCount
	 * @param array $associatedUsersCount A array
	 */
	public function setAssociatedUsersCount(array $associatedUsersCount)
	{
		$this->associatedUsersCount=$associatedUsersCount; 
		$this->keyModified['associated_users_count'] = 1; 

	}

	/**
	 * The method to get the info
	 * @return Info An instance of Info
	 */
	public function getInfo()
	{
		return $this->info; 

	}

	/**
	 * The method to set the value to info
	 * @param Info $info An instance of Info
	 */
	public function setInfo(Info $info)
	{
		$this->info=$info; 
		$this->keyModified['info'] = 1; 

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
