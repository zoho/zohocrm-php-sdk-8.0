<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class CompanyInfo implements Model
{

	private  $name;
	private  $industries;
	private  $experiences;
	private  $keyModified=array();

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
	 * The method to get the industries
	 * @return array A array representing the industries
	 */
	public function getIndustries()
	{
		return $this->industries; 

	}

	/**
	 * The method to set the value to industries
	 * @param array $industries A array
	 */
	public function setIndustries(array $industries)
	{
		$this->industries=$industries; 
		$this->keyModified['industries'] = 1; 

	}

	/**
	 * The method to get the experiences
	 * @return array A array representing the experiences
	 */
	public function getExperiences()
	{
		return $this->experiences; 

	}

	/**
	 * The method to set the value to experiences
	 * @param array $experiences A array
	 */
	public function setExperiences(array $experiences)
	{
		$this->experiences=$experiences; 
		$this->keyModified['experiences'] = 1; 

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
