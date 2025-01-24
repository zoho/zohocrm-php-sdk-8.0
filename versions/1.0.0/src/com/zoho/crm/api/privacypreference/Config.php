<?php 
namespace com\zoho\crm\api\privacypreference;

use com\zoho\crm\api\util\Model;

class Config implements Model
{

	private  $tpt;
	private  $section;
	private  $zohoInteg;
	private  $keyModified=array();

	/**
	 * The method to get the tpt
	 * @return array A array representing the tpt
	 */
	public function getTpt()
	{
		return $this->tpt; 

	}

	/**
	 * The method to set the value to tpt
	 * @param array $tpt A array
	 */
	public function setTpt(array $tpt)
	{
		$this->tpt=$tpt; 
		$this->keyModified['tpt'] = 1; 

	}

	/**
	 * The method to get the section
	 * @return array A array representing the section
	 */
	public function getSection()
	{
		return $this->section; 

	}

	/**
	 * The method to set the value to section
	 * @param array $section A array
	 */
	public function setSection(array $section)
	{
		$this->section=$section; 
		$this->keyModified['section'] = 1; 

	}

	/**
	 * The method to get the zohoInteg
	 * @return array A array representing the zohoInteg
	 */
	public function getZohoInteg()
	{
		return $this->zohoInteg; 

	}

	/**
	 * The method to set the value to zohoInteg
	 * @param array $zohoInteg A array
	 */
	public function setZohoInteg(array $zohoInteg)
	{
		$this->zohoInteg=$zohoInteg; 
		$this->keyModified['zoho_integ'] = 1; 

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
