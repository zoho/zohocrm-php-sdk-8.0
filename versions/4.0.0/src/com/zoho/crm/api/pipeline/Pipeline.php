<?php 
namespace com\zoho\crm\api\pipeline;

use com\zoho\crm\api\util\Model;

class Pipeline implements Model
{

	private  $displayValue;
	private  $default;
	private  $maps;
	private  $actualValue;
	private  $id;
	private  $childAvailable;
	private  $parent;
	private  $keyModified=array();

	/**
	 * The method to get the displayValue
	 * @return string A string representing the displayValue
	 */
	public function getDisplayValue()
	{
		return $this->displayValue; 

	}

	/**
	 * The method to set the value to displayValue
	 * @param string $displayValue A string
	 */
	public function setDisplayValue(string $displayValue)
	{
		$this->displayValue=$displayValue; 
		$this->keyModified['display_value'] = 1; 

	}

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
	public function setDefault(bool $default)
	{
		$this->default=$default; 
		$this->keyModified['default'] = 1; 

	}

	/**
	 * The method to get the maps
	 * @return array A array representing the maps
	 */
	public function getMaps()
	{
		return $this->maps; 

	}

	/**
	 * The method to set the value to maps
	 * @param array $maps A array
	 */
	public function setMaps(array $maps)
	{
		$this->maps=$maps; 
		$this->keyModified['maps'] = 1; 

	}

	/**
	 * The method to get the actualValue
	 * @return string A string representing the actualValue
	 */
	public function getActualValue()
	{
		return $this->actualValue; 

	}

	/**
	 * The method to set the value to actualValue
	 * @param string $actualValue A string
	 */
	public function setActualValue(string $actualValue)
	{
		$this->actualValue=$actualValue; 
		$this->keyModified['actual_value'] = 1; 

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
	 * The method to get the childAvailable
	 * @return bool A bool representing the childAvailable
	 */
	public function getChildAvailable()
	{
		return $this->childAvailable; 

	}

	/**
	 * The method to set the value to childAvailable
	 * @param bool $childAvailable A bool
	 */
	public function setChildAvailable(bool $childAvailable)
	{
		$this->childAvailable=$childAvailable; 
		$this->keyModified['child_available'] = 1; 

	}

	/**
	 * The method to get the parent
	 * @return Pipeline An instance of Pipeline
	 */
	public function getParent()
	{
		return $this->parent; 

	}

	/**
	 * The method to set the value to parent
	 * @param Pipeline $parent An instance of Pipeline
	 */
	public function setParent(Pipeline $parent)
	{
		$this->parent=$parent; 
		$this->keyModified['parent'] = 1; 

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
