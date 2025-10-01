<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\fields\Fields;
use com\zoho\crm\api\util\Model;

class Segment implements Model
{

	private  $sequenceNumber;
	private  $displayLabel;
	private  $columnCount;
	private  $id;
	private  $type;
	private  $fields;
	private  $buttons;
	private  $elements;
	private  $keyModified=array();

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
	public function setSequenceNumber(int $sequenceNumber)
	{
		$this->sequenceNumber=$sequenceNumber; 
		$this->keyModified['sequence_number'] = 1; 

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
	public function setColumnCount(int $columnCount)
	{
		$this->columnCount=$columnCount; 
		$this->keyModified['column_count'] = 1; 

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
	public function setType(string $type)
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
	public function setFields(array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the buttons
	 * @return array A array representing the buttons
	 */
	public function getButtons()
	{
		return $this->buttons; 

	}

	/**
	 * The method to set the value to buttons
	 * @param array $buttons A array
	 */
	public function setButtons(array $buttons)
	{
		$this->buttons=$buttons; 
		$this->keyModified['buttons'] = 1; 

	}

	/**
	 * The method to get the elements
	 * @return array A array representing the elements
	 */
	public function getElements()
	{
		return $this->elements; 

	}

	/**
	 * The method to set the value to elements
	 * @param array $elements A array
	 */
	public function setElements(array $elements)
	{
		$this->elements=$elements; 
		$this->keyModified['elements'] = 1; 

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
