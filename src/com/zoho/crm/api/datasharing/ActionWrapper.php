<?php 
namespace com\zoho\crm\api\datasharing;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $dataSharing;
	private  $keyModified=array();

	/**
	 * The method to get the dataSharing
	 * @return array A array representing the dataSharing
	 */
	public function getDataSharing()
	{
		return $this->dataSharing; 

	}

	/**
	 * The method to set the value to dataSharing
	 * @param array $dataSharing A array
	 */
	public function setDataSharing(array $dataSharing)
	{
		$this->dataSharing=$dataSharing; 
		$this->keyModified['data_sharing'] = 1; 

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
