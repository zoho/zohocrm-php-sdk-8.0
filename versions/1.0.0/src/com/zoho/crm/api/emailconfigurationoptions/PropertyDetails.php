<?php 
namespace com\zoho\crm\api\emailconfigurationoptions;

use com\zoho\crm\api\util\Model;

class PropertyDetails implements Model
{

	private  $name;
	private  $values;
	private  $dataType;
	private  $properties;
	private  $keyModified=array();

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
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the values
	 * @return array A array representing the values
	 */
	public function getValues()
	{
		return $this->values; 

	}

	/**
	 * The method to set the value to values
	 * @param array $values A array
	 */
	public function setValues(array $values)
	{
		$this->values=$values; 
		$this->keyModified['values'] = 1; 

	}

	/**
	 * The method to get the dataType
	 * @return string A string representing the dataType
	 */
	public function getDataType()
	{
		return $this->dataType; 

	}

	/**
	 * The method to set the value to dataType
	 * @param string $dataType A string
	 */
	public function setDataType(string $dataType)
	{
		$this->dataType=$dataType; 
		$this->keyModified['data_type'] = 1; 

	}

	/**
	 * The method to get the properties
	 * @return array A array representing the properties
	 */
	public function getProperties()
	{
		return $this->properties; 

	}

	/**
	 * The method to set the value to properties
	 * @param array $properties A array
	 */
	public function setProperties(array $properties)
	{
		$this->properties=$properties; 
		$this->keyModified['properties'] = 1; 

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
