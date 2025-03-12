<?php 
namespace com\zoho\crm\api\emailtemplates;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $emailTemplates;
	private  $info;
	private  $keyModified=array();

	/**
	 * The method to get the emailTemplates
	 * @return array A array representing the emailTemplates
	 */
	public function getEmailTemplates()
	{
		return $this->emailTemplates; 

	}

	/**
	 * The method to set the value to emailTemplates
	 * @param array $emailTemplates A array
	 */
	public function setEmailTemplates(array $emailTemplates)
	{
		$this->emailTemplates=$emailTemplates; 
		$this->keyModified['email_templates'] = 1; 

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
