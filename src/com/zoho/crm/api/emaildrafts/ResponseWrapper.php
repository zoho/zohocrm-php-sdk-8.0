<?php 
namespace com\zoho\crm\api\emaildrafts;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model
{

	private  $emailDrafts;
	private  $keyModified=array();

	/**
	 * The method to get the emailDrafts
	 * @return array A array representing the emailDrafts
	 */
	public function getEmailDrafts()
	{
		return $this->emailDrafts; 

	}

	/**
	 * The method to set the value to emailDrafts
	 * @param array $emailDrafts A array
	 */
	public function setEmailDrafts(?array $emailDrafts)
	{
		$this->emailDrafts=$emailDrafts; 
		$this->keyModified['__email_drafts'] = 1; 

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
