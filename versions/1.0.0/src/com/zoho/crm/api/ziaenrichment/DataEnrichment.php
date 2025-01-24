<?php 
namespace com\zoho\crm\api\ziaenrichment;

use com\zoho\crm\api\util\Model;

class DataEnrichment implements Model
{

	private  $module;
	private  $type;
	private  $outputDataFieldMapping;
	private  $inputDataFieldMapping;
	private  $id;
	private  $status;
	private  $createdTime;
	private  $createdBy;
	private  $modifiedTime;
	private  $modifiedBy;
	private  $keyModified=array();

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
	public function setModule(Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
	public function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the outputDataFieldMapping
	 * @return array A array representing the outputDataFieldMapping
	 */
	public function getOutputDataFieldMapping()
	{
		return $this->outputDataFieldMapping; 

	}

	/**
	 * The method to set the value to outputDataFieldMapping
	 * @param array $outputDataFieldMapping A array
	 */
	public function setOutputDataFieldMapping(array $outputDataFieldMapping)
	{
		$this->outputDataFieldMapping=$outputDataFieldMapping; 
		$this->keyModified['output_data_field_mapping'] = 1; 

	}

	/**
	 * The method to get the inputDataFieldMapping
	 * @return array A array representing the inputDataFieldMapping
	 */
	public function getInputDataFieldMapping()
	{
		return $this->inputDataFieldMapping; 

	}

	/**
	 * The method to set the value to inputDataFieldMapping
	 * @param array $inputDataFieldMapping A array
	 */
	public function setInputDataFieldMapping(array $inputDataFieldMapping)
	{
		$this->inputDataFieldMapping=$inputDataFieldMapping; 
		$this->keyModified['input_data_field_mapping'] = 1; 

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
	 * The method to get the status
	 * @return bool A bool representing the status
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param bool $status A bool
	 */
	public function setStatus(bool $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

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
	public function setCreatedBy(User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

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
	public function setModifiedBy(User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

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
