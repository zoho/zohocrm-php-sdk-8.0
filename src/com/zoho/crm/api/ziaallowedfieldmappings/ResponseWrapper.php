<?php 
namespace com\zoho\crm\api\ziaallowedfieldmappings;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model
{

	private  $allowedFieldMappings;
	private  $keyModified=array();

	/**
	 * The method to get the allowedFieldMappings
	 * @return AllowedFieldMap An instance of AllowedFieldMap
	 */
	public function getAllowedFieldMappings()
	{
		return $this->allowedFieldMappings; 

	}

	/**
	 * The method to set the value to allowedFieldMappings
	 * @param AllowedFieldMap $allowedFieldMappings An instance of AllowedFieldMap
	 */
	public function setAllowedFieldMappings(AllowedFieldMap $allowedFieldMappings)
	{
		$this->allowedFieldMappings=$allowedFieldMappings; 
		$this->keyModified['allowed_field_mappings'] = 1; 

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
