<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\modules\MinifiedModule;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class HistoryTracking implements Model
{

	private  $relatedListName;
	private  $durationConfiguration;
	private  $followedFields;
	private  $module;
	private  $durationConfiguredField;
	private  $keyModified=array();

	/**
	 * The method to get the relatedListName
	 * @return string A string representing the relatedListName
	 */
	public function getRelatedListName()
	{
		return $this->relatedListName; 

	}

	/**
	 * The method to set the value to relatedListName
	 * @param string $relatedListName A string
	 */
	public function setRelatedListName(?string $relatedListName)
	{
		$this->relatedListName=$relatedListName; 
		$this->keyModified['related_list_name'] = 1; 

	}

	/**
	 * The method to get the durationConfiguration
	 * @return Choice An instance of Choice
	 */
	public function getDurationConfiguration()
	{
		return $this->durationConfiguration; 

	}

	/**
	 * The method to set the value to durationConfiguration
	 * @param Choice $durationConfiguration An instance of Choice
	 */
	public function setDurationConfiguration(?Choice $durationConfiguration)
	{
		$this->durationConfiguration=$durationConfiguration; 
		$this->keyModified['duration_configuration'] = 1; 

	}

	/**
	 * The method to get the followedFields
	 * @return array A array representing the followedFields
	 */
	public function getFollowedFields()
	{
		return $this->followedFields; 

	}

	/**
	 * The method to set the value to followedFields
	 * @param array $followedFields A array
	 */
	public function setFollowedFields(?array $followedFields)
	{
		$this->followedFields=$followedFields; 
		$this->keyModified['followed_fields'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return HistoryTrackingModule An instance of HistoryTrackingModule
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param HistoryTrackingModule $module An instance of HistoryTrackingModule
	 */
	public function setModule(?HistoryTrackingModule $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the durationConfiguredField
	 * @return MinifiedModule An instance of MinifiedModule
	 */
	public function getDurationConfiguredField()
	{
		return $this->durationConfiguredField; 

	}

	/**
	 * The method to set the value to durationConfiguredField
	 * @param MinifiedModule $durationConfiguredField An instance of MinifiedModule
	 */
	public function setDurationConfiguredField(?MinifiedModule $durationConfiguredField)
	{
		$this->durationConfiguredField=$durationConfiguredField; 
		$this->keyModified['duration_configured_field'] = 1; 

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
