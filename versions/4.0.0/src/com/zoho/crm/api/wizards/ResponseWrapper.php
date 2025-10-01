<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $wizards;
	private  $keyModified=array();

	/**
	 * The method to get the wizards
	 * @return array A array representing the wizards
	 */
	public function getWizards()
	{
		return $this->wizards; 

	}

	/**
	 * The method to set the value to wizards
	 * @param array $wizards A array
	 */
	public function setWizards(array $wizards)
	{
		$this->wizards=$wizards; 
		$this->keyModified['wizards'] = 1; 

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
