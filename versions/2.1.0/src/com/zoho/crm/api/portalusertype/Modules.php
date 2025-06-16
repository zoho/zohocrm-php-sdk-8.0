<?php 
namespace com\zoho\crm\api\portalusertype;

use com\zoho\crm\api\util\Model;

class Modules implements Model
{

	private  $id;
	private  $pluralLabel;
	private  $sharedType;
	private  $apiName;
	private  $filters;
	private  $fields;
	private  $layouts;
	private  $views;
	private  $permissions;
	private  $keyModified=array();

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
	 * The method to get the sharedType
	 * @return string A string representing the sharedType
	 */
	public function getSharedType()
	{
		return $this->sharedType; 

	}

	/**
	 * The method to set the value to sharedType
	 * @param string $sharedType A string
	 */
	public function setSharedType(string $sharedType)
	{
		$this->sharedType=$sharedType; 
		$this->keyModified['shared_type'] = 1; 

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
	 * The method to get the filters
	 * @return array A array representing the filters
	 */
	public function getFilters()
	{
		return $this->filters; 

	}

	/**
	 * The method to set the value to filters
	 * @param array $filters A array
	 */
	public function setFilters(array $filters)
	{
		$this->filters=$filters; 
		$this->keyModified['filters'] = 1; 

	}

	/**
	 * The method to get the fields
	 * @return array A array representing the fields
	 */
	public function getFields()
	{
		return $this->fields; 

	}

	/**
	 * The method to set the value to fields
	 * @param array $fields A array
	 */
	public function setFields(array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the layouts
	 * @return array A array representing the layouts
	 */
	public function getLayouts()
	{
		return $this->layouts; 

	}

	/**
	 * The method to set the value to layouts
	 * @param array $layouts A array
	 */
	public function setLayouts(array $layouts)
	{
		$this->layouts=$layouts; 
		$this->keyModified['layouts'] = 1; 

	}

	/**
	 * The method to get the views
	 * @return Views An instance of Views
	 */
	public function getViews()
	{
		return $this->views; 

	}

	/**
	 * The method to set the value to views
	 * @param Views $views An instance of Views
	 */
	public function setViews(Views $views)
	{
		$this->views=$views; 
		$this->keyModified['views'] = 1; 

	}

	/**
	 * The method to get the permissions
	 * @return Permissions An instance of Permissions
	 */
	public function getPermissions()
	{
		return $this->permissions; 

	}

	/**
	 * The method to set the value to permissions
	 * @param Permissions $permissions An instance of Permissions
	 */
	public function setPermissions(Permissions $permissions)
	{
		$this->permissions=$permissions; 
		$this->keyModified['permissions'] = 1; 

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
