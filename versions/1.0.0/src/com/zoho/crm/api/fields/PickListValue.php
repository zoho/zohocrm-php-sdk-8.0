<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\globalpicklists\Picklist;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class PickListValue implements Model
{

	private  $colourCode;
	private  $actualValue;
	private  $type;
	private  $id;
	private  $sequenceNumber;
	private  $displayValue;
	private  $referenceValue;
	private  $dealCategory;
	private  $probability;
	private  $forecastCategory;
	private  $expectedDataType;
	private  $sysRefName;
	private  $forecastType;
	private  $maps;
	private  $delete;
	private  $showValue;
	private  $globalPicklistValue;
	private  $keyModified=array();

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
	 * The method to get the type
	 * @return Choice An instance of Choice
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param Choice $type An instance of Choice
	 */
	public function setType(Choice $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

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
	 * The method to get the referenceValue
	 * @return string A string representing the referenceValue
	 */
	public function getReferenceValue()
	{
		return $this->referenceValue; 

	}

	/**
	 * The method to set the value to referenceValue
	 * @param string $referenceValue A string
	 */
	public function setReferenceValue(string $referenceValue)
	{
		$this->referenceValue=$referenceValue; 
		$this->keyModified['reference_value'] = 1; 

	}

	/**
	 * The method to get the dealCategory
	 * @return string A string representing the dealCategory
	 */
	public function getDealCategory()
	{
		return $this->dealCategory; 

	}

	/**
	 * The method to set the value to dealCategory
	 * @param string $dealCategory A string
	 */
	public function setDealCategory(string $dealCategory)
	{
		$this->dealCategory=$dealCategory; 
		$this->keyModified['deal_category'] = 1; 

	}

	/**
	 * The method to get the probability
	 * @return int A int representing the probability
	 */
	public function getProbability()
	{
		return $this->probability; 

	}

	/**
	 * The method to set the value to probability
	 * @param int $probability A int
	 */
	public function setProbability(int $probability)
	{
		$this->probability=$probability; 
		$this->keyModified['probability'] = 1; 

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
	 * The method to get the expectedDataType
	 * @return string A string representing the expectedDataType
	 */
	public function getExpectedDataType()
	{
		return $this->expectedDataType; 

	}

	/**
	 * The method to set the value to expectedDataType
	 * @param string $expectedDataType A string
	 */
	public function setExpectedDataType(string $expectedDataType)
	{
		$this->expectedDataType=$expectedDataType; 
		$this->keyModified['expected_data_type'] = 1; 

	}

	/**
	 * The method to get the sysRefName
	 * @return string A string representing the sysRefName
	 */
	public function getSysRefName()
	{
		return $this->sysRefName; 

	}

	/**
	 * The method to set the value to sysRefName
	 * @param string $sysRefName A string
	 */
	public function setSysRefName(string $sysRefName)
	{
		$this->sysRefName=$sysRefName; 
		$this->keyModified['sys_ref_name'] = 1; 

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
	 * The method to get the maps
	 * @return array A array representing the maps
	 */
	public function getMaps()
	{
		return $this->maps; 

	}

	/**
	 * The method to set the value to maps
	 * @param array $maps A array
	 */
	public function setMaps(array $maps)
	{
		$this->maps=$maps; 
		$this->keyModified['maps'] = 1; 

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
	 * The method to get the showValue
	 * @return bool A bool representing the showValue
	 */
	public function getShowValue()
	{
		return $this->showValue; 

	}

	/**
	 * The method to set the value to showValue
	 * @param bool $showValue A bool
	 */
	public function setShowValue(bool $showValue)
	{
		$this->showValue=$showValue; 
		$this->keyModified['show_value'] = 1; 

	}

	/**
	 * The method to get the globalPicklistValue
	 * @return Picklist An instance of Picklist
	 */
	public function getGlobalPicklistValue()
	{
		return $this->globalPicklistValue; 

	}

	/**
	 * The method to set the value to globalPicklistValue
	 * @param Picklist $globalPicklistValue An instance of Picklist
	 */
	public function setGlobalPicklistValue(Picklist $globalPicklistValue)
	{
		$this->globalPicklistValue=$globalPicklistValue; 
		$this->keyModified['_global_picklist_value'] = 1; 

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
