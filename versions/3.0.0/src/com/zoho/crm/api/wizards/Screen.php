<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class Screen implements Model
{

	private  $displayLabel;
	private  $apiName;
	private  $id;
	private  $referenceId;
	private  $conditionalRules;
	private  $segments;
	private  $keyModified=array();

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
	 * The method to get the referenceId
	 * @return string A string representing the referenceId
	 */
	public function getReferenceId()
	{
		return $this->referenceId; 

	}

	/**
	 * The method to set the value to referenceId
	 * @param string $referenceId A string
	 */
	public function setReferenceId(string $referenceId)
	{
		$this->referenceId=$referenceId; 
		$this->keyModified['reference_id'] = 1; 

	}

	/**
	 * The method to get the conditionalRules
	 * @return array A array representing the conditionalRules
	 */
	public function getConditionalRules()
	{
		return $this->conditionalRules; 

	}

	/**
	 * The method to set the value to conditionalRules
	 * @param array $conditionalRules A array
	 */
	public function setConditionalRules(array $conditionalRules)
	{
		$this->conditionalRules=$conditionalRules; 
		$this->keyModified['conditional_rules'] = 1; 

	}

	/**
	 * The method to get the segments
	 * @return array A array representing the segments
	 */
	public function getSegments()
	{
		return $this->segments; 

	}

	/**
	 * The method to set the value to segments
	 * @param array $segments A array
	 */
	public function setSegments(array $segments)
	{
		$this->segments=$segments; 
		$this->keyModified['segments'] = 1; 

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
