<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\util\StreamWrapper;
use com\zoho\crm\api\util\Model;

class FileBodyWrapper implements Model
{

	private  $inputfile;
	private  $keyModified=array();

	/**
	 * The method to get the inputfile
	 * @return StreamWrapper An instance of StreamWrapper
	 */
	public function getInputfile()
	{
		return $this->inputfile; 

	}

	/**
	 * The method to set the value to inputfile
	 * @param StreamWrapper $inputfile An instance of StreamWrapper
	 */
	public function setInputfile(?StreamWrapper $inputfile)
	{
		$this->inputfile=$inputfile; 
		$this->keyModified['inputFile'] = 1; 

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
