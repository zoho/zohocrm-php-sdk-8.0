<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class LinkingModule implements Model
{

	private  $pluralLabel;
	private  $visibility;
	private  $apiName;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the pluralLabel
	 * @return string A string representing the pluralLabel
	 */
	public function getPluralLabel()
	{
		return $this->pluralLabel; 

	}

	/**
	 * The method to set the value to pluralLabel
	 * @param string $pluralLabel A string
	 */
	public function setPluralLabel(string $pluralLabel)
	{
		$this->pluralLabel=$pluralLabel; 
		$this->keyModified['plural_label'] = 1; 

	}

	/**
	 * The method to get the visibility
	 * @return int A int representing the visibility
	 */
	public function getVisibility()
	{
		return $this->visibility; 

	}

	/**
	 * The method to set the value to visibility
	 * @param int $visibility A int
	 */
	public function setVisibility(int $visibility)
	{
		$this->visibility=$visibility; 
		$this->keyModified['visibility'] = 1; 

	}

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
