<?php 
namespace com\zoho\crm\api\layouts;

use com\zoho\crm\api\util\Model;

class DealField implements Model
{

	private  $apiName;
	private  $fieldLabel;
	private  $id;
	private  $required;
	private  $keyModified=array();

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the fieldLabel
	 * @return string A string representing the fieldLabel
	 */
	public function getFieldLabel()
	{
		return $this->fieldLabel; 

	}

	/**
	 * The method to set the value to fieldLabel
	 * @param string $fieldLabel A string
	 */
	public function setFieldLabel(string $fieldLabel)
	{
		$this->fieldLabel=$fieldLabel; 
		$this->keyModified['field_label'] = 1; 

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
	 * The method to get the required
	 * @return bool A bool representing the required
	 */
	public function getRequired()
	{
		return $this->required; 

	}

	/**
	 * The method to set the value to required
	 * @param bool $required A bool
	 */
	public function setRequired(bool $required)
	{
		$this->required=$required; 
		$this->keyModified['required'] = 1; 

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
