<?php 
namespace com\zoho\crm\api\emailconfigurationoptions;

use com\zoho\crm\api\util\Model;

class ErrorDetails implements Model
{

	private  $apiName;
	private  $jsonPath;
	private  $range;
	private  $supportedValues;
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
	 * The method to get the jsonPath
	 * @return string A string representing the jsonPath
	 */
	public function getJsonPath()
	{
		return $this->jsonPath; 

	}

	/**
	 * The method to set the value to jsonPath
	 * @param string $jsonPath A string
	 */
	public function setJsonPath(string $jsonPath)
	{
		$this->jsonPath=$jsonPath; 
		$this->keyModified['json_path'] = 1; 

	}

	/**
	 * The method to get the range
	 * @return RangeStructure An instance of RangeStructure
	 */
	public function getRange()
	{
		return $this->range; 

	}

	/**
	 * The method to set the value to range
	 * @param RangeStructure $range An instance of RangeStructure
	 */
	public function setRange(RangeStructure $range)
	{
		$this->range=$range; 
		$this->keyModified['range'] = 1; 

	}

	/**
	 * The method to get the supportedValues
	 * @return array A array representing the supportedValues
	 */
	public function getSupportedValues()
	{
		return $this->supportedValues; 

	}

	/**
	 * The method to set the value to supportedValues
	 * @param array $supportedValues A array
	 */
	public function setSupportedValues(array $supportedValues)
	{
		$this->supportedValues=$supportedValues; 
		$this->keyModified['supported_values'] = 1; 

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
