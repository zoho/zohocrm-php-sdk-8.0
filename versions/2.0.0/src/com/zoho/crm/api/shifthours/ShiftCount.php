<?php 
namespace com\zoho\crm\api\shifthours;

use com\zoho\crm\api\util\Model;

class ShiftCount implements Model
{

	private  $totalShiftWithUser;
	private  $totalShift;
	private  $keyModified=array();

	/**
	 * The method to get the totalShiftWithUser
	 * @return int A int representing the totalShiftWithUser
	 */
	public function getTotalShiftWithUser()
	{
		return $this->totalShiftWithUser; 

	}

	/**
	 * The method to set the value to totalShiftWithUser
	 * @param int $totalShiftWithUser A int
	 */
	public function setTotalShiftWithUser(int $totalShiftWithUser)
	{
		$this->totalShiftWithUser=$totalShiftWithUser; 
		$this->keyModified['total_shift_with_user'] = 1; 

	}

	/**
	 * The method to get the totalShift
	 * @return int A int representing the totalShift
	 */
	public function getTotalShift()
	{
		return $this->totalShift; 

	}

	/**
	 * The method to set the value to totalShift
	 * @param int $totalShift A int
	 */
	public function setTotalShift(int $totalShift)
	{
		$this->totalShift=$totalShift; 
		$this->keyModified['total_shift'] = 1; 

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
