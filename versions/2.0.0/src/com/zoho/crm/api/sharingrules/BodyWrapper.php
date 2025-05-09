<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $sharingRules;
	private  $keyModified=array();

	/**
	 * The method to get the sharingRules
	 * @return array A array representing the sharingRules
	 */
	public function getSharingRules()
	{
		return $this->sharingRules; 

	}

	/**
	 * The method to set the value to sharingRules
	 * @param array $sharingRules A array
	 */
	public function setSharingRules(array $sharingRules)
	{
		$this->sharingRules=$sharingRules; 
		$this->keyModified['sharing_rules'] = 1; 

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
