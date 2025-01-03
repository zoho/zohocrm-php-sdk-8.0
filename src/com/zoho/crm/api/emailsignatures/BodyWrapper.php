<?php 
namespace com\zoho\crm\api\emailsignatures;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $emailSignatures;
	private  $keyModified=array();

	/**
	 * The method to get the emailSignatures
	 * @return array A array representing the emailSignatures
	 */
	public function getEmailSignatures()
	{
		return $this->emailSignatures; 

	}

	/**
	 * The method to set the value to emailSignatures
	 * @param array $emailSignatures A array
	 */
	public function setEmailSignatures(array $emailSignatures)
	{
		$this->emailSignatures=$emailSignatures; 
		$this->keyModified['email_signatures'] = 1; 

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
