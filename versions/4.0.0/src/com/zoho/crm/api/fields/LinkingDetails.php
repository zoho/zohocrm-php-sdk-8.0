<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class LinkingDetails implements Model
{

	private  $module;
	private  $lookupField;
	private  $connectedLookupField;
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
	 * The method to get the lookupField
	 * @return LookupField An instance of LookupField
	 */
	public function getLookupField()
	{
		return $this->lookupField; 

	}

	/**
	 * The method to set the value to lookupField
	 * @param LookupField $lookupField An instance of LookupField
	 */
	public function setLookupField(LookupField $lookupField)
	{
		$this->lookupField=$lookupField; 
		$this->keyModified['lookup_field'] = 1; 

	}

	/**
	 * The method to get the connectedLookupField
	 * @return LookupField An instance of LookupField
	 */
	public function getConnectedLookupField()
	{
		return $this->connectedLookupField; 

	}

	/**
	 * The method to set the value to connectedLookupField
	 * @param LookupField $connectedLookupField An instance of LookupField
	 */
	public function setConnectedLookupField(LookupField $connectedLookupField)
	{
		$this->connectedLookupField=$connectedLookupField; 
		$this->keyModified['connected_lookup_field'] = 1; 

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
