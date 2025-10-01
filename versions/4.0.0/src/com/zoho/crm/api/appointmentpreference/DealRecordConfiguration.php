<?php 
namespace com\zoho\crm\api\appointmentpreference;

use com\zoho\crm\api\util\Model;

class DealRecordConfiguration implements Model
{

	private  $layout;
	private  $fieldMappings;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the layout
	 * @return Layout An instance of Layout
	 */
	public function getLayout()
	{
		return $this->layout; 

	}

	/**
	 * The method to set the value to layout
	 * @param Layout $layout An instance of Layout
	 */
	public function setLayout(Layout $layout)
	{
		$this->layout=$layout; 
		$this->keyModified['layout'] = 1; 

	}

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
