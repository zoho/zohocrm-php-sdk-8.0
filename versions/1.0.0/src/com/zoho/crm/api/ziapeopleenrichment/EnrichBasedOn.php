<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class EnrichBasedOn implements Model
{

	private  $social;
	private  $name;
	private  $company;
	private  $email;
	private  $keyModified=array();

	/**
	 * The method to get the social
	 * @return Social An instance of Social
	 */
	public function getSocial()
	{
		return $this->social; 

	}

	/**
	 * The method to set the value to social
	 * @param Social $social An instance of Social
	 */
	public function setSocial(Social $social)
	{
		$this->social=$social; 
		$this->keyModified['social'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the company
	 * @return Company An instance of Company
	 */
	public function getCompany()
	{
		return $this->company; 

	}

	/**
	 * The method to set the value to company
	 * @param Company $company An instance of Company
	 */
	public function setCompany(Company $company)
	{
		$this->company=$company; 
		$this->keyModified['company'] = 1; 

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
