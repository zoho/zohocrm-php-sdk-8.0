<?php 
namespace com\zoho\crm\api\emailcompose;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $emailCompose;
	private  $keyModified=array();

	/**
	 * The method to get the emailCompose
	 * @return array A array representing the emailCompose
	 */
	public function getEmailCompose()
	{
		return $this->emailCompose; 

	}

	/**
	 * The method to set the value to emailCompose
	 * @param array $emailCompose A array
	 */
	public function setEmailCompose(?array $emailCompose)
	{
		$this->emailCompose=$emailCompose; 
		$this->keyModified['email_compose'] = 1; 

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
