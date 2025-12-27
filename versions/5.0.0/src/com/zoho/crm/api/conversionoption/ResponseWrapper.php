<?php 
namespace com\zoho\crm\api\conversionoption;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $conversionOptions;
	private  $keyModified=array();

	/**
	 * The method to get the conversionOptions
	 * @return ConversionOptions An instance of ConversionOptions
	 */
	public function getConversionOptions()
	{
		return $this->conversionOptions; 

	}

	/**
	 * The method to set the value to conversionOptions
	 * @param ConversionOptions $conversionOptions An instance of ConversionOptions
	 */
	public function setConversionOptions(?ConversionOptions $conversionOptions)
	{
		$this->conversionOptions=$conversionOptions; 
		$this->keyModified['__conversion_options'] = 1; 

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
