<?php 
namespace com\zoho\crm\api\holidays;

use com\zoho\crm\api\util\Model;

class Holiday implements Model
{

	private  $year;
	private  $name;
	private  $date;
	private  $type;
	private  $id;
	private  $shiftHour;
	private  $keyModified=array();

	/**
	 * The method to get the year
	 * @return int A int representing the year
	 */
	public function getYear()
	{
		return $this->year; 

	}

	/**
	 * The method to set the value to year
	 * @param int $year A int
	 */
	public function setYear(int $year)
	{
		$this->year=$year; 
		$this->keyModified['year'] = 1; 

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
	 * The method to get the date
	 * @return \DateTime An instance of \DateTime
	 */
	public function getDate()
	{
		return $this->date; 

	}

	/**
	 * The method to set the value to date
	 * @param \DateTime $date An instance of \DateTime
	 */
	public function setDate(\DateTime $date)
	{
		$this->date=$date; 
		$this->keyModified['date'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

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
	 * The method to get the shiftHour
	 * @return ShiftHour An instance of ShiftHour
	 */
	public function getShiftHour()
	{
		return $this->shiftHour; 

	}

	/**
	 * The method to set the value to shiftHour
	 * @param ShiftHour $shiftHour An instance of ShiftHour
	 */
	public function setShiftHour(ShiftHour $shiftHour)
	{
		$this->shiftHour=$shiftHour; 
		$this->keyModified['shift_hour'] = 1; 

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
