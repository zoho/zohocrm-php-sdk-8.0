<?php 
namespace com\zoho\crm\api\taxes;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $orgTaxes;
	private  $keyModified=array();

	/**
	 * The method to get the orgTaxes
	 * @return OrgTax An instance of OrgTax
	 */
	public function getOrgTaxes()
	{
		return $this->orgTaxes; 

	}

	/**
	 * The method to set the value to orgTaxes
	 * @param OrgTax $orgTaxes An instance of OrgTax
	 */
	public function setOrgTaxes(OrgTax $orgTaxes)
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
