<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class FormSection implements Model
{

	private  $formFields;
	private  $name;
	private  $description;
	private  $helpMessage;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the formFields
	 * @return array A array representing the formFields
	 */
	public function getFormFields()
	{
		return $this->formFields; 

	}

	/**
	 * The method to set the value to formFields
	 * @param array $formFields A array
	 */
	public function setFormFields(?array $formFields)
	{
		$this->formFields=$formFields; 
		$this->keyModified['form_fields'] = 1; 

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
	public function setDescription(?string $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

	}

	/**
	 * The method to get the helpMessage
	 * @return string A string representing the helpMessage
	 */
	public function getHelpMessage()
	{
		return $this->helpMessage; 

	}

	/**
	 * The method to set the value to helpMessage
	 * @param string $helpMessage A string
	 */
	public function setHelpMessage(?string $helpMessage)
	{
		$this->helpMessage=$helpMessage; 
		$this->keyModified['help_message'] = 1; 

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
