<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class GetUnassignBodyWrapper implements Model
{

	private  $getUnassigned;
	private  $keyModified=array();

	/**
	 * The method to get the getUnassigned
	 * @return Assign An instance of Assign
	 */
	public function getGetUnassigned()
	{
		return $this->getUnassigned; 

	}

	/**
	 * The method to set the value to getUnassigned
	 * @param Assign $getUnassigned An instance of Assign
	 */
	public function setGetUnassigned(Assign $getUnassigned)
	{
		$this->getUnassigned=$getUnassigned; 
		$this->keyModified['get_unassigned'] = 1; 

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
