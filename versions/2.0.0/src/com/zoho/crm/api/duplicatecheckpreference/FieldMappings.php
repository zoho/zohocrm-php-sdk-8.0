<?php 
namespace com\zoho\crm\api\duplicatecheckpreference;

use com\zoho\crm\api\util\Model;

class FieldMappings implements Model
{

	private  $currentField;
	private  $mappedField;
	private  $keyModified=array();

	/**
	 * The method to get the currentField
	 * @return CurrentField An instance of CurrentField
	 */
	public function getCurrentField()
	{
		return $this->currentField; 

	}

	/**
	 * The method to set the value to currentField
	 * @param CurrentField $currentField An instance of CurrentField
	 */
	public function setCurrentField(CurrentField $currentField)
	{
		$this->currentField=$currentField; 
		$this->keyModified['current_field'] = 1; 

	}

	/**
	 * The method to get the mappedField
	 * @return MappedField An instance of MappedField
	 */
	public function getMappedField()
	{
		return $this->mappedField; 

	}

	/**
	 * The method to set the value to mappedField
	 * @param MappedField $mappedField An instance of MappedField
	 */
	public function setMappedField(MappedField $mappedField)
	{
		$this->mappedField=$mappedField; 
		$this->keyModified['mapped_field'] = 1; 

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
