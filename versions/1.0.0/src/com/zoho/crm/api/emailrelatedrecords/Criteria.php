<?php 
namespace com\zoho\crm\api\emailrelatedrecords;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Criteria implements Model
{

	private  $comparator;
	private  $field;
	private  $value;
	private  $keyModified=array();

	/**
	 * The method to get the comparator
	 * @return Choice An instance of Choice
	 */
	public function getComparator()
	{
		return $this->comparator; 

	}

	/**
	 * The method to set the value to comparator
	 * @param Choice $comparator An instance of Choice
	 */
	public function setComparator(Choice $comparator)
	{
		$this->comparator=$comparator; 
		$this->keyModified['comparator'] = 1; 

	}

	/**
	 * The method to get the field
	 * @return Field An instance of Field
	 */
	public function getField()
	{
		return $this->field; 

	}

	/**
	 * The method to set the value to field
	 * @param Field $field An instance of Field
	 */
	public function setField(Field $field)
	{
		$this->field=$field; 
		$this->keyModified['field'] = 1; 

	}

	/**
	 * The method to get the value
	 * @return string A string representing the value
	 */
	public function getValue()
	{
		return $this->value; 

	}

	/**
	 * The method to set the value to value
	 * @param string $value A string
	 */
	public function setValue(string $value)
	{
		$this->value=$value; 
		$this->keyModified['value'] = 1; 

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
