<?php 
namespace com\zoho\crm\api\fiscalyear;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Year implements Model
{

	private  $startMonth;
	private  $displayBasedOn;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the startMonth
	 * @return Choice An instance of Choice
	 */
	public function getStartMonth()
	{
		return $this->startMonth; 

	}

	/**
	 * The method to set the value to startMonth
	 * @param Choice $startMonth An instance of Choice
	 */
	public function setStartMonth(Choice $startMonth)
	{
		$this->startMonth=$startMonth; 
		$this->keyModified['start_month'] = 1; 

	}

	/**
	 * The method to get the displayBasedOn
	 * @return Choice An instance of Choice
	 */
	public function getDisplayBasedOn()
	{
		return $this->displayBasedOn; 

	}

	/**
	 * The method to set the value to displayBasedOn
	 * @param Choice $displayBasedOn An instance of Choice
	 */
	public function setDisplayBasedOn(Choice $displayBasedOn)
	{
		$this->displayBasedOn=$displayBasedOn; 
		$this->keyModified['display_based_on'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
