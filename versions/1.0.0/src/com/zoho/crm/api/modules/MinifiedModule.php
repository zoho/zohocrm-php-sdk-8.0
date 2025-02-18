<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\util\Model;

class MinifiedModule implements Model
{

	private  $apiName;
	private  $id;
	private  $moduleName;
	private  $module;
	private  $crypt;
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
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the moduleName
	 * @return string A string representing the moduleName
	 */
	public function getModuleName()
	{
		return $this->moduleName; 

	}

	/**
	 * The method to set the value to moduleName
	 * @param string $moduleName A string
	 */
	public function setModuleName(string $moduleName)
	{
		$this->moduleName=$moduleName; 
		$this->keyModified['module_name'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return string A string representing the module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param string $module A string
	 */
	public function setModule(string $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the crypt
	 * @return bool A bool representing the crypt
	 */
	public function getCrypt()
	{
		return $this->crypt; 

	}

	/**
	 * The method to set the value to crypt
	 * @param bool $crypt A bool
	 */
	public function setCrypt(bool $crypt)
	{
		$this->crypt=$crypt; 
		$this->keyModified['crypt'] = 1; 

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
