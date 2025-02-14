<?php 
namespace com\zoho\crm\api\recyclebin;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $recycleBin;
	private  $keyModified=array();

	/**
	 * The method to get the recycleBin
	 * @return array A array representing the recycleBin
	 */
	public function getRecycleBin()
	{
		return $this->recycleBin; 

	}

	/**
	 * The method to set the value to recycleBin
	 * @param array $recycleBin A array
	 */
	public function setRecycleBin(array $recycleBin)
	{
		$this->recycleBin=$recycleBin; 
		$this->keyModified['recycle_bin'] = 1; 

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
