<?php 
namespace com\zoho\crm\api\emailconfigurationoptions;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $configurationOptions;
	private  $keyModified=array();

	/**
	 * The method to get the configurationOptions
	 * @return array A array representing the configurationOptions
	 */
	public function getConfigurationOptions()
	{
		return $this->configurationOptions; 

	}

	/**
	 * The method to set the value to configurationOptions
	 * @param array $configurationOptions A array
	 */
	public function setConfigurationOptions(array $configurationOptions)
	{
		$this->configurationOptions=$configurationOptions; 
		$this->keyModified['configuration_options'] = 1; 

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
