<?php 
namespace com\zoho\crm\api\duplicatecheckpreference;

use com\zoho\crm\api\util\Model;

class TypeConfiguration implements Model
{

	private  $fieldMappings;
	private  $mappedModule;
	private  $keyModified=array();

	/**
	 * The method to get the fieldMappings
	 * @return array A array representing the fieldMappings
	 */
	public function getFieldMappings()
	{
		return $this->fieldMappings; 

	}

	/**
	 * The method to set the value to fieldMappings
	 * @param array $fieldMappings A array
	 */
	public function setFieldMappings(array $fieldMappings)
	{
		$this->fieldMappings=$fieldMappings; 
		$this->keyModified['field_mappings'] = 1; 

	}

	/**
	 * The method to get the mappedModule
	 * @return MappedModule An instance of MappedModule
	 */
	public function getMappedModule()
	{
		return $this->mappedModule; 

	}

	/**
	 * The method to set the value to mappedModule
	 * @param MappedModule $mappedModule An instance of MappedModule
	 */
	public function setMappedModule(MappedModule $mappedModule)
	{
		$this->mappedModule=$mappedModule; 
		$this->keyModified['mapped_module'] = 1; 

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
