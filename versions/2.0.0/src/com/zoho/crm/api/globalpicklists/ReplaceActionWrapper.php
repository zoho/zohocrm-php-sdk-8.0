<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\util\Model;

class ReplaceActionWrapper implements Model, ReplaceActionHandler
{

	private  $replacePicklistValues;
	private  $keyModified=array();

	/**
	 * The method to get the replacePicklistValues
	 * @return array A array representing the replacePicklistValues
	 */
	public function getReplacePicklistValues()
	{
		return $this->replacePicklistValues; 

	}

	/**
	 * The method to set the value to replacePicklistValues
	 * @param array $replacePicklistValues A array
	 */
	public function setReplacePicklistValues(array $replacePicklistValues)
	{
		$this->replacePicklistValues=$replacePicklistValues; 
		$this->keyModified['replace_picklist_values'] = 1; 

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
