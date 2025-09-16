<?php 
namespace com\zoho\crm\api\emailsharingdetails;

use com\zoho\crm\api\util\Model;

class EmailSharings implements Model
{

	private  $shareFromUsers;
	private  $availableTypes;
	private  $keyModified=array();

	/**
	 * The method to get the shareFromUsers
	 * @return array A array representing the shareFromUsers
	 */
	public function getShareFromUsers()
	{
		return $this->shareFromUsers; 

	}

	/**
	 * The method to set the value to shareFromUsers
	 * @param array $shareFromUsers A array
	 */
	public function setShareFromUsers(array $shareFromUsers)
	{
		$this->shareFromUsers=$shareFromUsers; 
		$this->keyModified['share_from_users'] = 1; 

	}

	/**
	 * The method to get the availableTypes
	 * @return array A array representing the availableTypes
	 */
	public function getAvailableTypes()
	{
		return $this->availableTypes; 

	}

	/**
	 * The method to set the value to availableTypes
	 * @param array $availableTypes A array
	 */
	public function setAvailableTypes(array $availableTypes)
	{
		$this->availableTypes=$availableTypes; 
		$this->keyModified['available_types'] = 1; 

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
