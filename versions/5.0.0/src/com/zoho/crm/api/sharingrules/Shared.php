<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Shared implements Model
{

	private  $resource;
	private  $subordinates;
	private  $type;
	private  $keyModified=array();

	/**
	 * The method to get the resource
	 * @return Resource An instance of Resource
	 */
	public function getResource()
	{
		return $this->resource; 

	}

	/**
	 * The method to set the value to resource
	 * @param Resource $resource An instance of Resource
	 */
	public function setResource(?Resource $resource)
	{
		$this->resource=$resource; 
		$this->keyModified['resource'] = 1; 

	}

	/**
	 * The method to get the subordinates
	 * @return bool A bool representing the subordinates
	 */
	public function getSubordinates()
	{
		return $this->subordinates; 

	}

	/**
	 * The method to set the value to subordinates
	 * @param bool $subordinates A bool
	 */
	public function setSubordinates(?bool $subordinates)
	{
		$this->subordinates=$subordinates; 
		$this->keyModified['subordinates'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return Choice An instance of Choice
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param Choice $type An instance of Choice
	 */
	public function setType(?Choice $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

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
