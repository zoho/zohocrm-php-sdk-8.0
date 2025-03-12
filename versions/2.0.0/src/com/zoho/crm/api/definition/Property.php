<?php 
namespace com\zoho\crm\api\definition;

use com\zoho\crm\api\util\Model;

class Property implements Model
{

	private  $displayLabel;
	private  $allowedValues;
	private  $uiType;
	private  $regex;
	private  $readOnly;
	private  $apiName;
	private  $fieldLabel;
	private  $dataType;
	private  $length;
	private  $availableInUserLayout;
	private  $required;
	private  $properties;
	private  $keyModified=array();

	/**
	 * The method to get the displayLabel
	 * @return string A string representing the displayLabel
	 */
	public function getDisplayLabel()
	{
		return $this->displayLabel; 

	}

	/**
	 * The method to set the value to displayLabel
	 * @param string $displayLabel A string
	 */
	public function setDisplayLabel(string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

	}

	/**
	 * The method to get the allowedValues
	 * @return array A array representing the allowedValues
	 */
	public function getAllowedValues()
	{
		return $this->allowedValues; 

	}

	/**
	 * The method to set the value to allowedValues
	 * @param array $allowedValues A array
	 */
	public function setAllowedValues(array $allowedValues)
	{
		$this->allowedValues=$allowedValues; 
		$this->keyModified['allowed_values'] = 1; 

	}

	/**
	 * The method to get the uiType
	 * @return int A int representing the uiType
	 */
	public function getUiType()
	{
		return $this->uiType; 

	}

	/**
	 * The method to set the value to uiType
	 * @param int $uiType A int
	 */
	public function setUiType(int $uiType)
	{
		$this->uiType=$uiType; 
		$this->keyModified['ui_type'] = 1; 

	}

	/**
	 * The method to get the regex
	 * @return string A string representing the regex
	 */
	public function getRegex()
	{
		return $this->regex; 

	}

	/**
	 * The method to set the value to regex
	 * @param string $regex A string
	 */
	public function setRegex(string $regex)
	{
		$this->regex=$regex; 
		$this->keyModified['regex'] = 1; 

	}

	/**
	 * The method to get the readOnly
	 * @return bool A bool representing the readOnly
	 */
	public function getReadOnly()
	{
		return $this->readOnly; 

	}

	/**
	 * The method to set the value to readOnly
	 * @param bool $readOnly A bool
	 */
	public function setReadOnly(bool $readOnly)
	{
		$this->readOnly=$readOnly; 
		$this->keyModified['read_only'] = 1; 

	}

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
	 * The method to get the length
	 * @return int A int representing the length
	 */
	public function getLength()
	{
		return $this->length; 

	}

	/**
	 * The method to set the value to length
	 * @param int $length A int
	 */
	public function setLength(int $length)
	{
		$this->length=$length; 
		$this->keyModified['length'] = 1; 

	}

	/**
	 * The method to get the availableInUserLayout
	 * @return bool A bool representing the availableInUserLayout
	 */
	public function getAvailableInUserLayout()
	{
		return $this->availableInUserLayout; 

	}

	/**
	 * The method to set the value to availableInUserLayout
	 * @param bool $availableInUserLayout A bool
	 */
	public function setAvailableInUserLayout(bool $availableInUserLayout)
	{
		$this->availableInUserLayout=$availableInUserLayout; 
		$this->keyModified['available_in_user_layout'] = 1; 

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
