<?php 
namespace com\zoho\crm\api\shifthours;

use com\zoho\crm\api\util\Model;

class ShiftHours implements Model
{

	private  $sameAsEveryday;
	private  $shiftDays;
	private  $dailyTiming;
	private  $customTiming;
	private  $id;
	private  $breakHours;
	private  $users;
	private  $holidays;
	private  $usersCount;
	private  $timezone;
	private  $name;
	private  $keyModified=array();

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
	 * The method to get the shiftDays
	 * @return array A array representing the shiftDays
	 */
	public function getShiftDays()
	{
		return $this->shiftDays; 

	}

	/**
	 * The method to set the value to shiftDays
	 * @param array $shiftDays A array
	 */
	public function setShiftDays(array $shiftDays)
	{
		$this->shiftDays=$shiftDays; 
		$this->keyModified['shift_days'] = 1; 

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
	 * The method to get the breakHours
	 * @return array A array representing the breakHours
	 */
	public function getBreakHours()
	{
		return $this->breakHours; 

	}

	/**
	 * The method to set the value to breakHours
	 * @param array $breakHours A array
	 */
	public function setBreakHours(array $breakHours)
	{
		$this->breakHours=$breakHours; 
		$this->keyModified['break_hours'] = 1; 

	}

	/**
	 * The method to get the users
	 * @return array A array representing the users
	 */
	public function getUsers()
	{
		return $this->users; 

	}

	/**
	 * The method to set the value to users
	 * @param array $users A array
	 */
	public function setUsers(array $users)
	{
		$this->users=$users; 
		$this->keyModified['users'] = 1; 

	}

	/**
	 * The method to get the holidays
	 * @return array A array representing the holidays
	 */
	public function getHolidays()
	{
		return $this->holidays; 

	}

	/**
	 * The method to set the value to holidays
	 * @param array $holidays A array
	 */
	public function setHolidays(array $holidays)
	{
		$this->holidays=$holidays; 
		$this->keyModified['holidays'] = 1; 

	}

	/**
	 * The method to get the usersCount
	 * @return int A int representing the usersCount
	 */
	public function getUsersCount()
	{
		return $this->usersCount; 

	}

	/**
	 * The method to set the value to usersCount
	 * @param int $usersCount A int
	 */
	public function setUsersCount(int $usersCount)
	{
		$this->usersCount=$usersCount; 
		$this->keyModified['users_count'] = 1; 

	}

	/**
	 * The method to get the timezone
	 * @return \DateTimeZone An instance of \DateTimeZone
	 */
	public function getTimezone()
	{
		return $this->timezone; 

	}

	/**
	 * The method to set the value to timezone
	 * @param \DateTimeZone $timezone An instance of \DateTimeZone
	 */
	public function setTimezone(\DateTimeZone $timezone)
	{
		$this->timezone=$timezone; 
		$this->keyModified['timezone'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

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
