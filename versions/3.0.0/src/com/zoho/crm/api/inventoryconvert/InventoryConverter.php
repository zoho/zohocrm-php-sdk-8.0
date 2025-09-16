<?php 
namespace com\zoho\crm\api\inventoryconvert;

use com\zoho\crm\api\util\Model;

class InventoryConverter implements Model
{

	private  $convertTo;
	private  $keyModified=array();

	/**
	 * The method to get the convertTo
	 * @return array A array representing the convertTo
	 */
	public function getConvertTo()
	{
		return $this->convertTo; 

	}

	/**
	 * The method to set the value to convertTo
	 * @param array $convertTo A array
	 */
	public function setConvertTo(array $convertTo)
	{
		$this->convertTo=$convertTo; 
		$this->keyModified['convert_to'] = 1; 

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
