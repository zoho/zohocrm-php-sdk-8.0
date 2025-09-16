<?php 
namespace com\zoho\crm\api\fiscalyear;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $fiscalYear;
	private  $keyModified=array();

	/**
	 * The method to get the fiscalYear
	 * @return Year An instance of Year
	 */
	public function getFiscalYear()
	{
		return $this->fiscalYear; 

	}

	/**
	 * The method to set the value to fiscalYear
	 * @param Year $fiscalYear An instance of Year
	 */
	public function setFiscalYear(Year $fiscalYear)
	{
		$this->fiscalYear=$fiscalYear; 
		$this->keyModified['fiscal_year'] = 1; 

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
