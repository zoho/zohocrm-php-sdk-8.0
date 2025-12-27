<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class DoubleOptinDetails implements Model
{

	private  $emailTemplate;
	private  $confirmPageContent;
	private  $keyModified=array();

	/**
	 * The method to get the emailTemplate
	 * @return DoubleOptinEmailTemplate An instance of DoubleOptinEmailTemplate
	 */
	public function getEmailTemplate()
	{
		return $this->emailTemplate; 

	}

	/**
	 * The method to set the value to emailTemplate
	 * @param DoubleOptinEmailTemplate $emailTemplate An instance of DoubleOptinEmailTemplate
	 */
	public function setEmailTemplate(?DoubleOptinEmailTemplate $emailTemplate)
	{
		$this->emailTemplate=$emailTemplate; 
		$this->keyModified['email_template'] = 1; 

	}

	/**
	 * The method to get the confirmPageContent
	 * @return string A string representing the confirmPageContent
	 */
	public function getConfirmPageContent()
	{
		return $this->confirmPageContent; 

	}

	/**
	 * The method to set the value to confirmPageContent
	 * @param string $confirmPageContent A string
	 */
	public function setConfirmPageContent(?string $confirmPageContent)
	{
		$this->confirmPageContent=$confirmPageContent; 
		$this->keyModified['confirm_page_content'] = 1; 

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
