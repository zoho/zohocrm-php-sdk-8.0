<?php 
namespace com\zoho\crm\api\apis;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $apis;
	private  $keyModified=array();

	/**
	 * The method to get the apis
	 * @return array A array representing the apis
	 */
	public function getApis()
	{
		return $this->apis; 

	}

	/**
	 * The method to set the value to apis
	 * @param array $apis A array
	 */
	public function setApis(array $apis)
	{
		$this->apis=$apis; 
		$this->keyModified['__apis'] = 1; 

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
