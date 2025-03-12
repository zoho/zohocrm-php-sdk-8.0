<?php 
namespace com\zoho\crm\api\emaildrafts;

use com\zoho\crm\api\util\Model;

class ScheduleDetails implements Model
{

	private  $time;
	private  $timezone;
	private  $source;
	private  $keyModified=array();

	/**
	 * The method to get the time
	 * @return \DateTime An instance of \DateTime
	 */
	public function getTime()
	{
		return $this->time; 

	}

	/**
	 * The method to set the value to time
	 * @param \DateTime $time An instance of \DateTime
	 */
	public function setTime(\DateTime $time)
	{
		$this->time=$time; 
		$this->keyModified['time'] = 1; 

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
	 * The method to get the source
	 * @return string A string representing the source
	 */
	public function getSource()
	{
		return $this->source; 

	}

	/**
	 * The method to set the value to source
	 * @param string $source A string
	 */
	public function setSource(string $source)
	{
		$this->source=$source; 
		$this->keyModified['source'] = 1; 

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
