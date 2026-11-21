<?php 
namespace com\zoho\crm\api\cadences;

use com\zoho\crm\api\util\Model;

class UnenrollProperty implements Model
{

	private  $endDate;
	private  $type;
	private  $keyModified=array();

	/**
	 * The method to get the endDate
	 * @return string A string representing the endDate
	 */
	public function getEndDate()
	{
		return $this->endDate; 

	}

	/**
	 * The method to set the value to endDate
	 * @param string $endDate A string
	 */
	public function setEndDate(?string $endDate)
	{
		$this->endDate=$endDate; 
		$this->keyModified['end_date'] = 1; 

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
	public function setType(?string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

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
