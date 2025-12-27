<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class GetAssignBodyWrapper implements Model
{

	private  $getAssigned;
	private  $keyModified=array();

	/**
	 * The method to get the getAssigned
	 * @return Assign An instance of Assign
	 */
	public function getGetAssigned()
	{
		return $this->getAssigned; 

	}

	/**
	 * The method to set the value to getAssigned
	 * @param Assign $getAssigned An instance of Assign
	 */
	public function setGetAssigned(?Assign $getAssigned)
	{
		$this->getAssigned=$getAssigned; 
		$this->keyModified['get_assigned'] = 1; 

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
