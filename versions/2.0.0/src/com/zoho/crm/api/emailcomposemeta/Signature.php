<?php 
namespace com\zoho\crm\api\emailcomposemeta;

use com\zoho\crm\api\util\Model;

class Signature implements Model
{

	private  $mode;
	private  $sign;
	private  $keyModified=array();

	/**
	 * The method to get the mode
	 * @return int A int representing the mode
	 */
	public function getMode()
	{
		return $this->mode; 

	}

	/**
	 * The method to set the value to mode
	 * @param int $mode A int
	 */
	public function setMode(int $mode)
	{
		$this->mode=$mode; 
		$this->keyModified['mode'] = 1; 

	}

	/**
	 * The method to get the sign
	 * @return string A string representing the sign
	 */
	public function getSign()
	{
		return $this->sign; 

	}

	/**
	 * The method to set the value to sign
	 * @param string $sign A string
	 */
	public function setSign(string $sign)
	{
		$this->sign=$sign; 
		$this->keyModified['sign'] = 1; 

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
