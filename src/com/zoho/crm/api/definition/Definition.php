<?php 
namespace com\zoho\crm\api\definition;

use com\zoho\crm\api\util\Model;

class Definition implements Model
{

	private  $rootElementName;
	private  $extradetails;
	private  $properties;
	private  $keyModified=array();

	/**
	 * The method to get the rootElementName
	 * @return string A string representing the rootElementName
	 */
	public function getRootElementName()
	{
		return $this->rootElementName; 

	}

	/**
	 * The method to set the value to rootElementName
	 * @param string $rootElementName A string
	 */
	public function setRootElementName(string $rootElementName)
	{
		$this->rootElementName=$rootElementName; 
		$this->keyModified['root_element_name'] = 1; 

	}

	/**
	 * The method to get the extradetails
	 * @return array A array representing the extradetails
	 */
	public function getExtradetails()
	{
		return $this->extradetails; 

	}

	/**
	 * The method to set the value to extradetails
	 * @param array $extradetails A array
	 */
	public function setExtradetails(array $extradetails)
	{
		$this->extradetails=$extradetails; 
		$this->keyModified['extraDetails'] = 1; 

	}

	/**
	 * The method to get the properties
	 * @return array A array representing the properties
	 */
	public function getProperties()
	{
		return $this->properties; 

	}

	/**
	 * The method to set the value to properties
	 * @param array $properties A array
	 */
	public function setProperties(array $properties)
	{
		$this->properties=$properties; 
		$this->keyModified['properties'] = 1; 

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
