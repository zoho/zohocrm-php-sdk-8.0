<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class ConnectedDetails implements Model
{

	private  $module;
	private  $field;
	private  $layouts;
	private  $keyModified=array();

	/**
	 * The method to get the module
	 * @return LinkingModule An instance of LinkingModule
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param LinkingModule $module An instance of LinkingModule
	 */
	public function setModule(LinkingModule $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the field
	 * @return LookupField An instance of LookupField
	 */
	public function getField()
	{
		return $this->field; 

	}

	/**
	 * The method to set the value to field
	 * @param LookupField $field An instance of LookupField
	 */
	public function setField(LookupField $field)
	{
		$this->field=$field; 
		$this->keyModified['field'] = 1; 

	}

	/**
	 * The method to get the layouts
	 * @return array A array representing the layouts
	 */
	public function getLayouts()
	{
		return $this->layouts; 

	}

	/**
	 * The method to set the value to layouts
	 * @param array $layouts A array
	 */
	public function setLayouts(array $layouts)
	{
		$this->layouts=$layouts; 
		$this->keyModified['layouts'] = 1; 

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
