<?php 
namespace com\zoho\crm\api\fromaddresses;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $fromAddresses;
	private  $keyModified=array();

	/**
	 * The method to get the fromAddresses
	 * @return array A array representing the fromAddresses
	 */
	public function getFromAddresses()
	{
		return $this->fromAddresses; 

	}

	/**
	 * The method to set the value to fromAddresses
	 * @param array $fromAddresses A array
	 */
	public function setFromAddresses(array $fromAddresses)
	{
		$this->fromAddresses=$fromAddresses; 
		$this->keyModified['from_addresses'] = 1; 

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
