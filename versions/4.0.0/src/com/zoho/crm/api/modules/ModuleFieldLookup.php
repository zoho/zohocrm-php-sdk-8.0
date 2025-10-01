<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\fields\Lookup;
use com\zoho\crm\api\fields\QueryDetails;
use com\zoho\crm\api\fields\ShowFields;
use com\zoho\crm\api\util\Model;

class ModuleFieldLookup extends Lookup implements Model
{

	private  $queryDetails;
	private  $module;
	private  $displayLabel;
	private  $apiName;
	private  $id;
	private  $revalidateFilterDuringEdit;
	private  $showFields;
	private  $keyModified=array();

	/**
	 * The method to get the queryDetails
	 * @return QueryDetails An instance of QueryDetails
	 */
	public function getQueryDetails()
	{
		return $this->queryDetails; 

	}

	/**
	 * The method to set the value to queryDetails
	 * @param QueryDetails $queryDetails An instance of QueryDetails
	 */
	public function setQueryDetails(QueryDetails $queryDetails)
	{
		$this->queryDetails=$queryDetails; 
		$this->keyModified['query_details'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return MinifiedModule An instance of MinifiedModule
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param MinifiedModule $module An instance of MinifiedModule
	 */
	public function setModule(MinifiedModule $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the displayLabel
	 * @return string A string representing the displayLabel
	 */
	public function getDisplayLabel()
	{
		return $this->displayLabel; 

	}

	/**
	 * The method to set the value to displayLabel
	 * @param string $displayLabel A string
	 */
	public function setDisplayLabel(string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

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
	 * The method to get the revalidateFilterDuringEdit
	 * @return bool A bool representing the revalidateFilterDuringEdit
	 */
	public function getRevalidateFilterDuringEdit()
	{
		return $this->revalidateFilterDuringEdit; 

	}

	/**
	 * The method to set the value to revalidateFilterDuringEdit
	 * @param bool $revalidateFilterDuringEdit A bool
	 */
	public function setRevalidateFilterDuringEdit(bool $revalidateFilterDuringEdit)
	{
		$this->revalidateFilterDuringEdit=$revalidateFilterDuringEdit; 
		$this->keyModified['revalidate_filter_during_edit'] = 1; 

	}

	/**
	 * The method to get the showFields
	 * @return array A array representing the showFields
	 */
	public function getShowFields()
	{
		return $this->showFields; 

	}

	/**
	 * The method to set the value to showFields
	 * @param array $showFields A array
	 */
	public function setShowFields(array $showFields)
	{
		$this->showFields=$showFields; 
		$this->keyModified['show_fields'] = 1; 

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
