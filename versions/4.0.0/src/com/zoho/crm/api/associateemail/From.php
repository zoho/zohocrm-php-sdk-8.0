<?php 
namespace com\zoho\crm\api\associateemail;

use com\zoho\crm\api\util\Model;

class From implements Model
{

	private  $userName;
	private  $email;
	private  $keyModified=array();

	/**
	 * The method to get the userName
	 * @return string A string representing the userName
	 */
	public function getUserName()
	{
		return $this->userName; 

	}

	/**
	 * The method to set the value to userName
	 * @param string $userName A string
	 */
	public function setUserName(string $userName)
	{
		$this->userName=$userName; 
		$this->keyModified['user_name'] = 1; 

	}

	/**
	 * The method to get the email
	 * @return string A string representing the email
	 */
	public function getEmail()
	{
		return $this->email; 

	}

	/**
	 * The method to set the value to email
	 * @param string $email A string
	 */
	public function setEmail(string $email)
	{
		$this->email=$email; 
		$this->keyModified['email'] = 1; 

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
