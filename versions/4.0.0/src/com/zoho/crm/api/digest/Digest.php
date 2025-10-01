<?php 
namespace com\zoho\crm\api\digest;

use com\zoho\crm\api\util\Model;

class Digest implements Model
{

	private  $recordId;
	private  $type;
	private  $module;
	private  $keyModified=array();

	/**
	 * The method to get the recordId
	 * @return string A string representing the recordId
	 */
	public function getRecordId()
	{
		return $this->recordId; 

	}

	/**
	 * The method to set the value to recordId
	 * @param string $recordId A string
	 */
	public function setRecordId(string $recordId)
	{
		$this->recordId=$recordId; 
		$this->keyModified['record_id'] = 1; 

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
	 * The method to get the module
	 * @return string A string representing the module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param string $module A string
	 */
	public function setModule(string $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
