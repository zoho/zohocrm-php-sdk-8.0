<?php 
namespace com\zoho\crm\api\conversionoption;

use com\zoho\crm\api\util\Model;

class PreferenceFieldMatch implements Model
{

	private  $field;
	private  $matchedLeadValue;
	private  $keyModified=array();

	/**
	 * The method to get the field
	 * @return Field An instance of Field
	 */
	public function getField()
	{
		return $this->field; 

	}

	/**
	 * The method to set the value to field
	 * @param Field $field An instance of Field
	 */
	public function setField(Field $field)
	{
		$this->field=$field; 
		$this->keyModified['field'] = 1; 

	}

	/**
	 * The method to get the matchedLeadValue
	 * @return string A string representing the matchedLeadValue
	 */
	public function getMatchedLeadValue()
	{
		return $this->matchedLeadValue; 

	}

	/**
	 * The method to set the value to matchedLeadValue
	 * @param string $matchedLeadValue A string
	 */
	public function setMatchedLeadValue(string $matchedLeadValue)
	{
		$this->matchedLeadValue=$matchedLeadValue; 
		$this->keyModified['matched_lead_value'] = 1; 

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
