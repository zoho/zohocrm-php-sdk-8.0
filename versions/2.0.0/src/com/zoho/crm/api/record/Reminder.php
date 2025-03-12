<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class Reminder implements Model
{

	private  $period;
	private  $unit;
	private  $time;
	private  $keyModified=array();

	/**
	 * The method to get the period
	 * @return string A string representing the period
	 */
	public function getPeriod()
	{
		return $this->period; 

	}

	/**
	 * The method to set the value to period
	 * @param string $period A string
	 */
	public function setPeriod(string $period)
	{
		$this->period=$period; 
		$this->keyModified['period'] = 1; 

	}

	/**
	 * The method to get the unit
	 * @return int A int representing the unit
	 */
	public function getUnit()
	{
		return $this->unit; 

	}

	/**
	 * The method to set the value to unit
	 * @param int $unit A int
	 */
	public function setUnit(int $unit)
	{
		$this->unit=$unit; 
		$this->keyModified['unit'] = 1; 

	}

	/**
	 * The method to get the time
	 * @return string A string representing the time
	 */
	public function getTime()
	{
		return $this->time; 

	}

	/**
	 * The method to set the value to time
	 * @param string $time A string
	 */
	public function setTime(string $time)
	{
		$this->time=$time; 
		$this->keyModified['time'] = 1; 

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
