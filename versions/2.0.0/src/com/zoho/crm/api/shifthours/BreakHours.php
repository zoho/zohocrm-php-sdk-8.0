<?php 
namespace com\zoho\crm\api\shifthours;

use com\zoho\crm\api\util\Model;

class BreakHours implements Model
{

	private  $breakDays;
	private  $sameAsEveryday;
	private  $dailyTiming;
	private  $customTiming;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the breakDays
	 * @return array A array representing the breakDays
	 */
	public function getBreakDays()
	{
		return $this->breakDays; 

	}

	/**
	 * The method to set the value to breakDays
	 * @param array $breakDays A array
	 */
	public function setBreakDays(array $breakDays)
	{
		$this->breakDays=$breakDays; 
		$this->keyModified['break_days'] = 1; 

	}

	/**
	 * The method to get the sameAsEveryday
	 * @return bool A bool representing the sameAsEveryday
	 */
	public function getSameAsEveryday()
	{
		return $this->sameAsEveryday; 

	}

	/**
	 * The method to set the value to sameAsEveryday
	 * @param bool $sameAsEveryday A bool
	 */
	public function setSameAsEveryday(bool $sameAsEveryday)
	{
		$this->sameAsEveryday=$sameAsEveryday; 
		$this->keyModified['same_as_everyday'] = 1; 

	}

	/**
	 * The method to get the dailyTiming
	 * @return array A array representing the dailyTiming
	 */
	public function getDailyTiming()
	{
		return $this->dailyTiming; 

	}

	/**
	 * The method to set the value to dailyTiming
	 * @param array $dailyTiming A array
	 */
	public function setDailyTiming(array $dailyTiming)
	{
		$this->dailyTiming=$dailyTiming; 
		$this->keyModified['daily_timing'] = 1; 

	}

	/**
	 * The method to get the customTiming
	 * @return array A array representing the customTiming
	 */
	public function getCustomTiming()
	{
		return $this->customTiming; 

	}

	/**
	 * The method to set the value to customTiming
	 * @param array $customTiming A array
	 */
	public function setCustomTiming(array $customTiming)
	{
		$this->customTiming=$customTiming; 
		$this->keyModified['custom_timing'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
