<?php 
namespace com\zoho\crm\api\availablecurrencies;

use com\zoho\crm\api\util\Model;

class Currency implements Model
{

	private  $displayValue;
	private  $decimalSeparator;
	private  $symbol;
	private  $thousandSeparator;
	private  $displayName;
	private  $isoCode;
	private  $decimalPlaces;
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
	 * The method to get the decimalSeparator
	 * @return string A string representing the decimalSeparator
	 */
	public function getDecimalSeparator()
	{
		return $this->decimalSeparator; 

	}

	/**
	 * The method to set the value to decimalSeparator
	 * @param string $decimalSeparator A string
	 */
	public function setDecimalSeparator(string $decimalSeparator)
	{
		$this->decimalSeparator=$decimalSeparator; 
		$this->keyModified['decimal_separator'] = 1; 

	}

	/**
	 * The method to get the symbol
	 * @return string A string representing the symbol
	 */
	public function getSymbol()
	{
		return $this->symbol; 

	}

	/**
	 * The method to set the value to symbol
	 * @param string $symbol A string
	 */
	public function setSymbol(string $symbol)
	{
		$this->symbol=$symbol; 
		$this->keyModified['symbol'] = 1; 

	}

	/**
	 * The method to get the thousandSeparator
	 * @return string A string representing the thousandSeparator
	 */
	public function getThousandSeparator()
	{
		return $this->thousandSeparator; 

	}

	/**
	 * The method to set the value to thousandSeparator
	 * @param string $thousandSeparator A string
	 */
	public function setThousandSeparator(string $thousandSeparator)
	{
		$this->thousandSeparator=$thousandSeparator; 
		$this->keyModified['thousand_separator'] = 1; 

	}

	/**
	 * The method to get the displayName
	 * @return string A string representing the displayName
	 */
	public function getDisplayName()
	{
		return $this->displayName; 

	}

	/**
	 * The method to set the value to displayName
	 * @param string $displayName A string
	 */
	public function setDisplayName(string $displayName)
	{
		$this->displayName=$displayName; 
		$this->keyModified['display_name'] = 1; 

	}

	/**
	 * The method to get the isoCode
	 * @return string A string representing the isoCode
	 */
	public function getIsoCode()
	{
		return $this->isoCode; 

	}

	/**
	 * The method to set the value to isoCode
	 * @param string $isoCode A string
	 */
	public function setIsoCode(string $isoCode)
	{
		$this->isoCode=$isoCode; 
		$this->keyModified['iso_code'] = 1; 

	}

	/**
	 * The method to get the decimalPlaces
	 * @return string A string representing the decimalPlaces
	 */
	public function getDecimalPlaces()
	{
		return $this->decimalPlaces; 

	}

	/**
	 * The method to set the value to decimalPlaces
	 * @param string $decimalPlaces A string
	 */
	public function setDecimalPlaces(string $decimalPlaces)
	{
		$this->decimalPlaces=$decimalPlaces; 
		$this->keyModified['decimal_places'] = 1; 

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
