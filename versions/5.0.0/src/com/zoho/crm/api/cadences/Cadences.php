<?php 
namespace com\zoho\crm\api\cadences;

use com\zoho\crm\api\util\Model;

class Cadences implements Model
{

	private  $summary;
	private  $createdTime;
	private  $module;
	private  $active;
	private  $executionDetails;
	private  $published;
	private  $type;
	private  $createdBy;
	private  $modifiedTime;
	private  $name;
	private  $modifiedBy;
	private  $id;
	private  $customView;
	private  $status;
	private  $keyModified=array();

	/**
	 * The method to get the summary
	 * @return Summary An instance of Summary
	 */
	public function getSummary()
	{
		return $this->summary; 

	}

	/**
	 * The method to set the value to summary
	 * @param Summary $summary An instance of Summary
	 */
	public function setSummary(?Summary $summary)
	{
		$this->summary=$summary; 
		$this->keyModified['summary'] = 1; 

	}

	/**
	 * The method to get the createdTime
	 * @return string A string representing the createdTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param string $createdTime A string
	 */
	public function setCreatedTime(?string $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return Module An instance of Module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Module $module An instance of Module
	 */
	public function setModule(?Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the active
	 * @return bool A bool representing the active
	 */
	public function getActive()
	{
		return $this->active; 

	}

	/**
	 * The method to set the value to active
	 * @param bool $active A bool
	 */
	public function setActive(?bool $active)
	{
		$this->active=$active; 
		$this->keyModified['active'] = 1; 

	}

	/**
	 * The method to get the executionDetails
	 * @return ExecutionDetail An instance of ExecutionDetail
	 */
	public function getExecutionDetails()
	{
		return $this->executionDetails; 

	}

	/**
	 * The method to set the value to executionDetails
	 * @param ExecutionDetail $executionDetails An instance of ExecutionDetail
	 */
	public function setExecutionDetails(?ExecutionDetail $executionDetails)
	{
		$this->executionDetails=$executionDetails; 
		$this->keyModified['execution_details'] = 1; 

	}

	/**
	 * The method to get the published
	 * @return bool A bool representing the published
	 */
	public function getPublished()
	{
		return $this->published; 

	}

	/**
	 * The method to set the value to published
	 * @param bool $published A bool
	 */
	public function setPublished(?bool $published)
	{
		$this->published=$published; 
		$this->keyModified['published'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(?string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public function setCreatedBy(?User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return string A string representing the modifiedTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param string $modifiedTime A string
	 */
	public function setModifiedTime(?string $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

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
	public function setName(?string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public function setModifiedBy(?User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

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
	public function setId(?string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the customView
	 * @return CustomView An instance of CustomView
	 */
	public function getCustomView()
	{
		return $this->customView; 

	}

	/**
	 * The method to set the value to customView
	 * @param CustomView $customView An instance of CustomView
	 */
	public function setCustomView(?CustomView $customView)
	{
		$this->customView=$customView; 
		$this->keyModified['custom_view'] = 1; 

	}

	/**
	 * The method to get the status
	 * @return string A string representing the status
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param string $status A string
	 */
	public function setStatus(?string $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

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
