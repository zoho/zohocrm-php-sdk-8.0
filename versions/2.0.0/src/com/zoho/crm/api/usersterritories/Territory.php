<?php 
namespace com\zoho\crm\api\usersterritories;

use com\zoho\crm\api\util\Model;

class Territory implements Model
{

	private  $id;
	private  $manager;
	private  $reportingTo;
	private  $name;
	private  $keyModified=array();

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
	 * The method to get the manager
	 * @return Manager An instance of Manager
	 */
	public function getManager()
	{
		return $this->manager; 

	}

	/**
	 * The method to set the value to manager
	 * @param Manager $manager An instance of Manager
	 */
	public function setManager(Manager $manager)
	{
		$this->manager=$manager; 
		$this->keyModified['Manager'] = 1; 

	}

	/**
	 * The method to get the reportingTo
	 * @return Manager An instance of Manager
	 */
	public function getReportingTo()
	{
		return $this->reportingTo; 

	}

	/**
	 * The method to set the value to reportingTo
	 * @param Manager $reportingTo An instance of Manager
	 */
	public function setReportingTo(Manager $reportingTo)
	{
		$this->reportingTo=$reportingTo; 
		$this->keyModified['Reporting_To'] = 1; 

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
