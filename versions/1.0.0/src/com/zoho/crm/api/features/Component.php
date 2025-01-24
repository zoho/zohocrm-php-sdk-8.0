<?php 
namespace com\zoho\crm\api\features;

use com\zoho\crm\api\util\Model;

class Component implements Model
{

	private  $apiName;
	private  $moduleSupported;
	private  $details;
	private  $featureLabel;
	private  $keyModified=array();

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the moduleSupported
	 * @return bool A bool representing the moduleSupported
	 */
	public function getModuleSupported()
	{
		return $this->moduleSupported; 

	}

	/**
	 * The method to set the value to moduleSupported
	 * @param bool $moduleSupported A bool
	 */
	public function setModuleSupported(bool $moduleSupported)
	{
		$this->moduleSupported=$moduleSupported; 
		$this->keyModified['module_supported'] = 1; 

	}

	/**
	 * The method to get the details
	 * @return Detail An instance of Detail
	 */
	public function getDetails()
	{
		return $this->details; 

	}

	/**
	 * The method to set the value to details
	 * @param Detail $details An instance of Detail
	 */
	public function setDetails(Detail $details)
	{
		$this->details=$details; 
		$this->keyModified['details'] = 1; 

	}

	/**
	 * The method to get the featureLabel
	 * @return string A string representing the featureLabel
	 */
	public function getFeatureLabel()
	{
		return $this->featureLabel; 

	}

	/**
	 * The method to set the value to featureLabel
	 * @param string $featureLabel A string
	 */
	public function setFeatureLabel(string $featureLabel)
	{
		$this->featureLabel=$featureLabel; 
		$this->keyModified['feature_label'] = 1; 

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
