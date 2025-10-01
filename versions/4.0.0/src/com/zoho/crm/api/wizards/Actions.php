<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\fields\Fields;
use com\zoho\crm\api\profiles\Profile;
use com\zoho\crm\api\util\Model;

class Actions implements Model
{

	private  $id;
	private  $type;
	private  $segment;
	private  $fields;
	private  $field;
	private  $value;
	private  $exemptedProfiles;
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
	 * The method to get the segment
	 * @return Segment An instance of Segment
	 */
	public function getSegment()
	{
		return $this->segment; 

	}

	/**
	 * The method to set the value to segment
	 * @param Segment $segment An instance of Segment
	 */
	public function setSegment(Segment $segment)
	{
		$this->segment=$segment; 
		$this->keyModified['segment'] = 1; 

	}

	/**
	 * The method to get the fields
	 * @return Fields An instance of Fields
	 */
	public function getFields()
	{
		return $this->fields; 

	}

	/**
	 * The method to set the value to fields
	 * @param Fields $fields An instance of Fields
	 */
	public function setFields(Fields $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the field
	 * @return Fields An instance of Fields
	 */
	public function getField()
	{
		return $this->field; 

	}

	/**
	 * The method to set the value to field
	 * @param Fields $field An instance of Fields
	 */
	public function setField(Fields $field)
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
	 * The method to get the exemptedProfiles
	 * @return array A array representing the exemptedProfiles
	 */
	public function getExemptedProfiles()
	{
		return $this->exemptedProfiles; 

	}

	/**
	 * The method to set the value to exemptedProfiles
	 * @param array $exemptedProfiles A array
	 */
	public function setExemptedProfiles(array $exemptedProfiles)
	{
		$this->exemptedProfiles=$exemptedProfiles; 
		$this->keyModified['exempted_profiles'] = 1; 

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
