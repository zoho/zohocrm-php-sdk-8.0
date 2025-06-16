<?php 
namespace com\zoho\crm\api\digest;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $digest;
	private  $keyModified=array();

	/**
	 * The method to get the digest
	 * @return array A array representing the digest
	 */
	public function getDigest()
	{
		return $this->digest; 

	}

	/**
	 * The method to set the value to digest
	 * @param array $digest A array
	 */
	public function setDigest(array $digest)
	{
		$this->digest=$digest; 
		$this->keyModified['__digest'] = 1; 

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
