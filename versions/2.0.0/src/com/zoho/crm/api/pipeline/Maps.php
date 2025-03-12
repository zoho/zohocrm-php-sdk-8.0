<?php 
namespace com\zoho\crm\api\pipeline;

use com\zoho\crm\api\util\Model;

class Maps implements Model
{

	private  $displayValue;
	private  $sequenceNumber;
	private  $forecastCategory;
	private  $delete;
	private  $actualValue;
	private  $id;
	private  $colourCode;
	private  $forecastType;
	private  $keyModified=array();

	/**
	 * The method to get the displayValue
	 * @return string A string representing the displayValue
	 */
	public function getDisplayValue()
	{
		return $this->displayValue; 

	}

	/**
	 * The method to set the value to displayValue
	 * @param string $displayValue A string
	 */
	public function setDisplayValue(string $displayValue)
	{
		$this->displayValue=$displayValue; 
		$this->keyModified['display_value'] = 1; 

	}

	/**
	 * The method to get the sequenceNumber
	 * @return int A int representing the sequenceNumber
	 */
	public function getSequenceNumber()
	{
		return $this->sequenceNumber; 

	}

	/**
	 * The method to set the value to sequenceNumber
	 * @param int $sequenceNumber A int
	 */
	public function setSequenceNumber(int $sequenceNumber)
	{
		$this->sequenceNumber=$sequenceNumber; 
		$this->keyModified['sequence_number'] = 1; 

	}

	/**
	 * The method to get the forecastCategory
	 * @return ForecastCategory An instance of ForecastCategory
	 */
	public function getForecastCategory()
	{
		return $this->forecastCategory; 

	}

	/**
	 * The method to set the value to forecastCategory
	 * @param ForecastCategory $forecastCategory An instance of ForecastCategory
	 */
	public function setForecastCategory(ForecastCategory $forecastCategory)
	{
		$this->forecastCategory=$forecastCategory; 
		$this->keyModified['forecast_category'] = 1; 

	}

	/**
	 * The method to get the delete
	 * @return bool A bool representing the delete
	 */
	public function getDelete()
	{
		return $this->delete; 

	}

	/**
	 * The method to set the value to delete
	 * @param bool $delete A bool
	 */
	public function setDelete(bool $delete)
	{
		$this->delete=$delete; 
		$this->keyModified['_delete'] = 1; 

	}

	/**
	 * The method to get the actualValue
	 * @return string A string representing the actualValue
	 */
	public function getActualValue()
	{
		return $this->actualValue; 

	}

	/**
	 * The method to set the value to actualValue
	 * @param string $actualValue A string
	 */
	public function setActualValue(string $actualValue)
	{
		$this->actualValue=$actualValue; 
		$this->keyModified['actual_value'] = 1; 

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
	 * The method to get the colourCode
	 * @return string A string representing the colourCode
	 */
	public function getColourCode()
	{
		return $this->colourCode; 

	}

	/**
	 * The method to set the value to colourCode
	 * @param string $colourCode A string
	 */
	public function setColourCode(string $colourCode)
	{
		$this->colourCode=$colourCode; 
		$this->keyModified['colour_code'] = 1; 

	}

	/**
	 * The method to get the forecastType
	 * @return string A string representing the forecastType
	 */
	public function getForecastType()
	{
		return $this->forecastType; 

	}

	/**
	 * The method to set the value to forecastType
	 * @param string $forecastType A string
	 */
	public function setForecastType(string $forecastType)
	{
		$this->forecastType=$forecastType; 
		$this->keyModified['forecast_type'] = 1; 

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
