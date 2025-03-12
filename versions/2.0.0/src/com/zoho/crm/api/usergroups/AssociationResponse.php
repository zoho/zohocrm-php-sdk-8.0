<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class AssociationResponse implements Model
{

	private  $type;
	private  $resource;
	private  $detail;
	private  $keyModified=array();

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
	public function setResource(Resource $resource)
	{
		$this->resource=$resource; 
		$this->keyModified['resource'] = 1; 

	}

	/**
	 * The method to get the detail
	 * @return AssociationModule An instance of AssociationModule
	 */
	public function getDetail()
	{
		return $this->detail; 

	}

	/**
	 * The method to set the value to detail
	 * @param AssociationModule $detail An instance of AssociationModule
	 */
	public function setDetail(AssociationModule $detail)
	{
		$this->detail=$detail; 
		$this->keyModified['detail'] = 1; 

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
