<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class Users implements Model
{

	private  $inactive;
	private  $deleted;
	private  $active;
	private  $keyModified=array();

	/**
	 * The method to get the inactive
	 * @return int A int representing the inactive
	 */
	public function getInactive()
	{
		return $this->inactive; 

	}

	/**
	 * The method to set the value to inactive
	 * @param int $inactive A int
	 */
	public function setInactive(int $inactive)
	{
		$this->inactive=$inactive; 
		$this->keyModified['inactive'] = 1; 

	}

	/**
	 * The method to get the deleted
	 * @return int A int representing the deleted
	 */
	public function getDeleted()
	{
		return $this->deleted; 

	}

	/**
	 * The method to set the value to deleted
	 * @param int $deleted A int
	 */
	public function setDeleted(int $deleted)
	{
		$this->deleted=$deleted; 
		$this->keyModified['deleted'] = 1; 

	}

	/**
	 * The method to get the active
	 * @return int A int representing the active
	 */
	public function getActive()
	{
		return $this->active; 

	}

	/**
	 * The method to set the value to active
	 * @param int $active A int
	 */
	public function setActive(int $active)
	{
		$this->active=$active; 
		$this->keyModified['active'] = 1; 

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
