<?php 
namespace com\zoho\crm\api\pipeline;

use com\zoho\crm\api\util\Model;

class Delete implements Model
{

	private  $permanent;
	private  $keyModified=array();

	/**
	 * The method to get the permanent
	 * @return bool A bool representing the permanent
	 */
	public function getPermanent()
	{
		return $this->permanent; 

	}

	/**
	 * The method to set the value to permanent
	 * @param bool $permanent A bool
	 */
	public function setPermanent(bool $permanent)
	{
		$this->permanent=$permanent; 
		$this->keyModified['permanent'] = 1; 

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
