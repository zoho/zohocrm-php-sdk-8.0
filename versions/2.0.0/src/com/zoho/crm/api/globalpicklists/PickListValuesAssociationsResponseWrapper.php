<?php 
namespace com\zoho\crm\api\globalpicklists;

use com\zoho\crm\api\util\Model;

class PickListValuesAssociationsResponseWrapper implements Model, PickListValuesAssociationsResponseHandler
{

	private  $pickListValuesAssociations;
	private  $keyModified=array();

	/**
	 * The method to get the pickListValuesAssociations
	 * @return array A array representing the pickListValuesAssociations
	 */
	public function getPickListValuesAssociations()
	{
		return $this->pickListValuesAssociations; 

	}

	/**
	 * The method to set the value to pickListValuesAssociations
	 * @param array $pickListValuesAssociations A array
	 */
	public function setPickListValuesAssociations(array $pickListValuesAssociations)
	{
		$this->pickListValuesAssociations=$pickListValuesAssociations; 
		$this->keyModified['pick_list_values_associations'] = 1; 

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
