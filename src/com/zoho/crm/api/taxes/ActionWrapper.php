<?php 
namespace com\zoho\crm\api\taxes;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $orgTaxes;
	private  $keyModified=array();

	/**
	 * The method to get the orgTaxes
	 * @return ActionResponse An instance of ActionResponse
	 */
	public function getOrgTaxes()
	{
		return $this->orgTaxes; 

	}

	/**
	 * The method to set the value to orgTaxes
	 * @param ActionResponse $orgTaxes An instance of ActionResponse
	 */
	public function setOrgTaxes(ActionResponse $orgTaxes)
	{
		$this->orgTaxes=$orgTaxes; 
		$this->keyModified['org_taxes'] = 1; 

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
