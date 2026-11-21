<?php 
namespace com\zoho\crm\api\layouts;

use com\zoho\crm\api\util\Model;

class Sections implements Model
{

	private  $displayLabel;
	private  $sequenceNumber;
	private  $actionsAllowed;
	private  $issubformsection;
	private  $tabTraversal;
	private  $apiName;
	private  $columnCount;
	private  $name;
	private  $generatedType;
	private  $id;
	private  $type;
	private  $fields;
	private  $properties;
	private  $delete;
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
	public function setDisplayLabel(?string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

	}

	/**
	 * The method to get the sequenceNumber
	 * @return int A int representing the sequenceNumber
	 */
	public function getSequenceNumber()
	{
		return $this->sequenceNumber; 

	}

	/**
	 * The method to set the value to sequenceNumber
	 * @param int $sequenceNumber A int
	 */
	public function setSequenceNumber(?int $sequenceNumber)
	{
		$this->sequenceNumber=$sequenceNumber; 
		$this->keyModified['sequence_number'] = 1; 

	}

	/**
	 * The method to get the actionsAllowed
	 * @return ActionsAllowed An instance of ActionsAllowed
	 */
	public function getActionsAllowed()
	{
		return $this->actionsAllowed; 

	}

	/**
	 * The method to set the value to actionsAllowed
	 * @param ActionsAllowed $actionsAllowed An instance of ActionsAllowed
	 */
	public function setActionsAllowed(?ActionsAllowed $actionsAllowed)
	{
		$this->actionsAllowed=$actionsAllowed; 
		$this->keyModified['actions_allowed'] = 1; 

	}

	/**
	 * The method to get the issubformsection
	 * @return bool A bool representing the issubformsection
	 */
	public function getIssubformsection()
	{
		return $this->issubformsection; 

	}

	/**
	 * The method to set the value to issubformsection
	 * @param bool $issubformsection A bool
	 */
	public function setIssubformsection(?bool $issubformsection)
	{
		$this->issubformsection=$issubformsection; 
		$this->keyModified['isSubformSection'] = 1; 

	}

	/**
	 * The method to get the tabTraversal
	 * @return string A string representing the tabTraversal
	 */
	public function getTabTraversal()
	{
		return $this->tabTraversal; 

	}

	/**
	 * The method to set the value to tabTraversal
	 * @param string $tabTraversal A string
	 */
	public function setTabTraversal(?string $tabTraversal)
	{
		$this->tabTraversal=$tabTraversal; 
		$this->keyModified['tab_traversal'] = 1; 

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
	public function setAPIName(?string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the columnCount
	 * @return int A int representing the columnCount
	 */
	public function getColumnCount()
	{
		return $this->columnCount; 

	}

	/**
	 * The method to set the value to columnCount
	 * @param int $columnCount A int
	 */
	public function setColumnCount(?int $columnCount)
	{
		$this->columnCount=$columnCount; 
		$this->keyModified['column_count'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(?string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the generatedType
	 * @return string A string representing the generatedType
	 */
	public function getGeneratedType()
	{
		return $this->generatedType; 

	}

	/**
	 * The method to set the value to generatedType
	 * @param string $generatedType A string
	 */
	public function setGeneratedType(?string $generatedType)
	{
		$this->generatedType=$generatedType; 
		$this->keyModified['generated_type'] = 1; 

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
	public function setId(?string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(?string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

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
	public function setFields(?array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the properties
	 * @return Properties An instance of Properties
	 */
	public function getProperties()
	{
		return $this->properties; 

	}

	/**
	 * The method to set the value to properties
	 * @param Properties $properties An instance of Properties
	 */
	public function setProperties(?Properties $properties)
	{
		$this->properties=$properties; 
		$this->keyModified['properties'] = 1; 

	}

	/**
	 * The method to get the delete
	 * @return Delete1 An instance of Delete1
	 */
	public function getDelete()
	{
		return $this->delete; 

	}

	/**
	 * The method to set the value to delete
	 * @param Delete1 $delete An instance of Delete1
	 */
	public function setDelete(?Delete1 $delete)
	{
		$this->delete=$delete; 
		$this->keyModified['_delete'] = 1; 

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
