<?php 
namespace com\zoho\crm\api\notes;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $data;
	private  $trigger;
	private  $keyModified=array();

	/**
	 * The method to get the data
	 * @return array A array representing the data
	 */
	public function getData()
	{
		return $this->data; 

	}

	/**
	 * The method to set the value to data
	 * @param array $data A array
	 */
	public function setData(array $data)
	{
		$this->data=$data; 
		$this->keyModified['data'] = 1; 

	}

	/**
	 * The method to get the trigger
	 * @return array A array representing the trigger
	 */
	public function getTrigger()
	{
		return $this->trigger; 

	}

	/**
	 * The method to set the value to trigger
	 * @param array $trigger A array
	 */
	public function setTrigger(array $trigger)
	{
		$this->trigger=$trigger; 
		$this->keyModified['trigger'] = 1; 

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
