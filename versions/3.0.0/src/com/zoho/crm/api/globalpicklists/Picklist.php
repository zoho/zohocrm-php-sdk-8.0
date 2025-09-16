<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class Picklist implements Model
{

	private  $displayLabel;
	private  $createdTime;
	private  $modifiedTime;
	private  $id;
	private  $apiName;
	private  $actualLabel;
	private  $description;
	private  $modifiedBy;
	private  $createdBy;
	private  $presence;
	private  $pickListValuesSortedLexically;
	private  $pickListValues;
	private  $associatedFieldsCount;
	private  $usedInModules;
	private  $customizable;
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
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

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
	 * The method to get the actualLabel
	 * @return string A string representing the actualLabel
	 */
	public function getActualLabel()
	{
		return $this->actualLabel; 

	}

	/**
	 * The method to set the value to actualLabel
	 * @param string $actualLabel A string
	 */
	public function setActualLabel(string $actualLabel)
	{
		$this->actualLabel=$actualLabel; 
		$this->keyModified['actual_label'] = 1; 

	}

	/**
	 * The method to get the description
	 * @return string A string representing the description
	 */
	public function getDescription()
	{
		return $this->description; 

	}

	/**
	 * The method to set the value to description
	 * @param string $description A string
	 */
	public function setDescription(string $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param MinifiedUser $modifiedBy An instance of MinifiedUser
	 */
	public function setModifiedBy(MinifiedUser $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param MinifiedUser $createdBy An instance of MinifiedUser
	 */
	public function setCreatedBy(MinifiedUser $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the presence
	 * @return bool A bool representing the presence
	 */
	public function getPresence()
	{
		return $this->presence; 

	}

	/**
	 * The method to set the value to presence
	 * @param bool $presence A bool
	 */
	public function setPresence(bool $presence)
	{
		$this->presence=$presence; 
		$this->keyModified['presence'] = 1; 

	}

	/**
	 * The method to get the pickListValuesSortedLexically
	 * @return bool A bool representing the pickListValuesSortedLexically
	 */
	public function getPickListValuesSortedLexically()
	{
		return $this->pickListValuesSortedLexically; 

	}

	/**
	 * The method to set the value to pickListValuesSortedLexically
	 * @param bool $pickListValuesSortedLexically A bool
	 */
	public function setPickListValuesSortedLexically(bool $pickListValuesSortedLexically)
	{
		$this->pickListValuesSortedLexically=$pickListValuesSortedLexically; 
		$this->keyModified['pick_list_values_sorted_lexically'] = 1; 

	}

	/**
	 * The method to get the pickListValues
	 * @return array A array representing the pickListValues
	 */
	public function getPickListValues()
	{
		return $this->pickListValues; 

	}

	/**
	 * The method to set the value to pickListValues
	 * @param array $pickListValues A array
	 */
	public function setPickListValues(array $pickListValues)
	{
		$this->pickListValues=$pickListValues; 
		$this->keyModified['pick_list_values'] = 1; 

	}

	/**
	 * The method to get the associatedFieldsCount
	 * @return int A int representing the associatedFieldsCount
	 */
	public function getAssociatedFieldsCount()
	{
		return $this->associatedFieldsCount; 

	}

	/**
	 * The method to set the value to associatedFieldsCount
	 * @param int $associatedFieldsCount A int
	 */
	public function setAssociatedFieldsCount(int $associatedFieldsCount)
	{
		$this->associatedFieldsCount=$associatedFieldsCount; 
		$this->keyModified['associated_fields_count'] = 1; 

	}

	/**
	 * The method to get the usedInModules
	 * @return array A array representing the usedInModules
	 */
	public function getUsedInModules()
	{
		return $this->usedInModules; 

	}

	/**
	 * The method to set the value to usedInModules
	 * @param array $usedInModules A array
	 */
	public function setUsedInModules(array $usedInModules)
	{
		$this->usedInModules=$usedInModules; 
		$this->keyModified['used_in_modules'] = 1; 

	}

	/**
	 * The method to get the customizable
	 * @return bool A bool representing the customizable
	 */
	public function getCustomizable()
	{
		return $this->customizable; 

	}

	/**
	 * The method to set the value to customizable
	 * @param bool $customizable A bool
	 */
	public function setCustomizable(bool $customizable)
	{
		$this->customizable=$customizable; 
		$this->keyModified['customizable'] = 1; 

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
