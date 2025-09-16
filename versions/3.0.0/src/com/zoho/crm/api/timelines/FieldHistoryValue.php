<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\util\Model;

class FieldHistoryValue implements Model
{

	private  $new;
	private  $old;
	private  $keyModified=array();

	/**
	 * The method to get the new
	 * @return string A string representing the new
	 */
	public function getNew()
	{
		return $this->new; 

	}

	/**
	 * The method to set the value to new
	 * @param string $new A string
	 */
	public function setNew(string $new)
	{
		$this->new=$new; 
		$this->keyModified['new'] = 1; 

	}

	/**
	 * The method to get the old
	 * @return string A string representing the old
	 */
	public function getOld()
	{
		return $this->old; 

	}

	/**
	 * The method to set the value to old
	 * @param string $old A string
	 */
	public function setOld(string $old)
	{
		$this->old=$old; 
		$this->keyModified['old'] = 1; 

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
