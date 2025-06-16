<?php 
namespace com\zoho\crm\api\scoringrules;

use com\zoho\crm\api\util\Model;

class Criteria implements Model
{

	private  $comparator;
	private  $field;
	private  $value;
	private  $groupOperator;
	private  $group;
	private  $keyModified=array();

	/**
	 * The method to get the comparator
	 * @return string A string representing the comparator
	 */
	public function getComparator()
	{
		return $this->comparator; 

	}

	/**
	 * The method to set the value to comparator
	 * @param string $comparator A string
	 */
	public function setComparator(string $comparator)
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
	 */
	public function getValue()
	{
		return $this->value; 

	}

	/**
	 * The method to set the value to value
	 * @param 
	 */
	public function setValue( $value)
	{
		$this->value=$value; 
		$this->keyModified['value'] = 1; 

	}

	/**
	 * The method to get the groupOperator
	 * @return string A string representing the groupOperator
	 */
	public function getGroupOperator()
	{
		return $this->groupOperator; 

	}

	/**
	 * The method to set the value to groupOperator
	 * @param string $groupOperator A string
	 */
	public function setGroupOperator(string $groupOperator)
	{
		$this->groupOperator=$groupOperator; 
		$this->keyModified['group_operator'] = 1; 

	}

	/**
	 * The method to get the group
	 * @return array A array representing the group
	 */
	public function getGroup()
	{
		return $this->group; 

	}

	/**
	 * The method to set the value to group
	 * @param array $group A array
	 */
	public function setGroup(array $group)
	{
		$this->group=$group; 
		$this->keyModified['group'] = 1; 

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
