<?php 
namespace com\zoho\crm\api\userstransferdelete;

use com\zoho\crm\api\util\Model;

class Transfer implements Model
{

	private  $records;
	private  $assignment;
	private  $criteria;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the records
	 * @return bool A bool representing the records
	 */
	public function getRecords()
	{
		return $this->records; 

	}

	/**
	 * The method to set the value to records
	 * @param bool $records A bool
	 */
	public function setRecords(bool $records)
	{
		$this->records=$records; 
		$this->keyModified['records'] = 1; 

	}

	/**
	 * The method to get the assignment
	 * @return bool A bool representing the assignment
	 */
	public function getAssignment()
	{
		return $this->assignment; 

	}

	/**
	 * The method to set the value to assignment
	 * @param bool $assignment A bool
	 */
	public function setAssignment(bool $assignment)
	{
		$this->assignment=$assignment; 
		$this->keyModified['assignment'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return bool A bool representing the criteria
	 */
	public function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param bool $criteria A bool
	 */
	public function setCriteria(bool $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

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
