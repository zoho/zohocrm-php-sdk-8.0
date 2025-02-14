<?php 
namespace com\zoho\crm\api\ziaorgenrichment;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $ziaOrgEnrichment;
	private  $keyModified=array();

	/**
	 * The method to get the ziaOrgEnrichment
	 * @return array A array representing the ziaOrgEnrichment
	 */
	public function getZiaOrgEnrichment()
	{
		return $this->ziaOrgEnrichment; 

	}

	/**
	 * The method to set the value to ziaOrgEnrichment
	 * @param array $ziaOrgEnrichment A array
	 */
	public function setZiaOrgEnrichment(array $ziaOrgEnrichment)
	{
		$this->ziaOrgEnrichment=$ziaOrgEnrichment; 
		$this->keyModified['__zia_org_enrichment'] = 1; 

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
