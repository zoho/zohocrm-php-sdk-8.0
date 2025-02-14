<?php 
namespace com\zoho\crm\api\availablecurrencies;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $availableCurrencies;
	private  $keyModified=array();

	/**
	 * The method to get the availableCurrencies
	 * @return array A array representing the availableCurrencies
	 */
	public function getAvailableCurrencies()
	{
		return $this->availableCurrencies; 

	}

	/**
	 * The method to set the value to availableCurrencies
	 * @param array $availableCurrencies A array
	 */
	public function setAvailableCurrencies(array $availableCurrencies)
	{
		$this->availableCurrencies=$availableCurrencies; 
		$this->keyModified['available_currencies'] = 1; 

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
