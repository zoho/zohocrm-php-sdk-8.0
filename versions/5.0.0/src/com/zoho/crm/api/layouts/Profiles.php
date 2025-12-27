<?php 
namespace com\zoho\crm\api\layouts;

use com\zoho\crm\api\util\Model;

class Profiles implements Model
{

	private  $default;
	private  $name;
	private  $id;
	private  $defaultView;
	private  $defaultAssignmentView;
	private  $keyModified=array();

	/**
	 * The method to get the default
	 * @return bool A bool representing the default
	 */
	public function getDefault()
	{
		return $this->default; 

	}

	/**
	 * The method to set the value to default
	 * @param bool $default A bool
	 */
	public function setDefault(?bool $default)
	{
		$this->default=$default; 
		$this->keyModified['default'] = 1; 

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
	 * The method to get the defaultView
	 * @return DefaultView An instance of DefaultView
	 */
	public function getDefaultView()
	{
		return $this->defaultView; 

	}

	/**
	 * The method to set the value to defaultView
	 * @param DefaultView $defaultView An instance of DefaultView
	 */
	public function setDefaultView(?DefaultView $defaultView)
	{
		$this->defaultView=$defaultView; 
		$this->keyModified['_default_view'] = 1; 

	}

	/**
	 * The method to get the defaultAssignmentView
	 * @return DefaultAssignmentView An instance of DefaultAssignmentView
	 */
	public function getDefaultAssignmentView()
	{
		return $this->defaultAssignmentView; 

	}

	/**
	 * The method to set the value to defaultAssignmentView
	 * @param DefaultAssignmentView $defaultAssignmentView An instance of DefaultAssignmentView
	 */
	public function setDefaultAssignmentView(?DefaultAssignmentView $defaultAssignmentView)
	{
		$this->defaultAssignmentView=$defaultAssignmentView; 
		$this->keyModified['_default_assignment_view'] = 1; 

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
