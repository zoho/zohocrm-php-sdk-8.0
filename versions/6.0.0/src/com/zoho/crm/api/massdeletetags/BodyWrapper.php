<?php 
namespace com\zoho\crm\api\massdeletetags;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $massDelete;
	private  $keyModified=array();

	/**
	 * The method to get the massDelete
	 * @return array A array representing the massDelete
	 */
	public function getMassDelete()
	{
		return $this->massDelete; 

	}

	/**
	 * The method to set the value to massDelete
	 * @param array $massDelete A array
	 */
	public function setMassDelete(?array $massDelete)
	{
		$this->massDelete=$massDelete; 
		$this->keyModified['mass_delete'] = 1; 

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
