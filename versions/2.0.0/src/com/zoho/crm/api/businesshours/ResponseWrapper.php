<?php 
namespace com\zoho\crm\api\businesshours;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $businessHours;
	private  $keyModified=array();

	/**
	 * The method to get the businessHours
	 * @return BusinessHours An instance of BusinessHours
	 */
	public function getBusinessHours()
	{
		return $this->businessHours; 

	}

	/**
	 * The method to set the value to businessHours
	 * @param BusinessHours $businessHours An instance of BusinessHours
	 */
	public function setBusinessHours(BusinessHours $businessHours)
	{
		$this->businessHours=$businessHours; 
		$this->keyModified['business_hours'] = 1; 

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
