<?php 
namespace com\zoho\crm\api\massdeletetags;

use com\zoho\crm\api\util\Model;

class MassDelete implements Model
{

	private  $module;
	private  $tags;
	private  $keyModified=array();

	/**
	 * The method to get the module
	 * @return Module An instance of Module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Module $module An instance of Module
	 */
	public function setModule(Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the tags
	 * @return array A array representing the tags
	 */
	public function getTags()
	{
		return $this->tags; 

	}

	/**
	 * The method to set the value to tags
	 * @param array $tags A array
	 */
	public function setTags(array $tags)
	{
		$this->tags=$tags; 
		$this->keyModified['tags'] = 1; 

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
