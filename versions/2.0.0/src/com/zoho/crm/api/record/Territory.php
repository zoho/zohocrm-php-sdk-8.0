<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class Territory implements Model
{

	private  $assigned;
	private  $name;
	private  $id;
	private  $assignedTime;
	private  $assignedBy;
	private  $keyModified=array();

	/**
	 * The method to get the assigned
	 * @return string A string representing the assigned
	 */
	public function getAssigned()
	{
		return $this->assigned; 

	}

	/**
	 * The method to set the value to assigned
	 * @param string $assigned A string
	 */
	public function setAssigned(string $assigned)
	{
		$this->assigned=$assigned; 
		$this->keyModified['$assigned'] = 1; 

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
		$this->keyModified['Name'] = 1; 

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
	 * The method to get the assignedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getAssignedTime()
	{
		return $this->assignedTime; 

	}

	/**
	 * The method to set the value to assignedTime
	 * @param \DateTime $assignedTime An instance of \DateTime
	 */
	public function setAssignedTime(\DateTime $assignedTime)
	{
		$this->assignedTime=$assignedTime; 
		$this->keyModified['$assigned_time'] = 1; 

	}

	/**
	 * The method to get the assignedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getAssignedBy()
	{
		return $this->assignedBy; 

	}

	/**
	 * The method to set the value to assignedBy
	 * @param MinifiedUser $assignedBy An instance of MinifiedUser
	 */
	public function setAssignedBy(MinifiedUser $assignedBy)
	{
		$this->assignedBy=$assignedBy; 
		$this->keyModified['$assigned_by'] = 1; 

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
