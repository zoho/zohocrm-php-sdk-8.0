<?php 
namespace com\zoho\crm\api\shifthours;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $shiftHours;
	private  $keyModified=array();

	/**
	 * The method to get the shiftHours
	 * @return array A array representing the shiftHours
	 */
	public function getShiftHours()
	{
		return $this->shiftHours; 

	}

	/**
	 * The method to set the value to shiftHours
	 * @param array $shiftHours A array
	 */
	public function setShiftHours(array $shiftHours)
	{
		$this->shiftHours=$shiftHours; 
		$this->keyModified['shift_hours'] = 1; 

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
