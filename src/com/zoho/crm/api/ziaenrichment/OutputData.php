<?php 
namespace com\zoho\crm\api\ziaenrichment;

use com\zoho\crm\api\util\Model;

class OutputData implements Model
{

	private  $enrichField;
	private  $crmField;
	private  $keyModified=array();

	/**
	 * The method to get the enrichField
	 * @return EnrichField An instance of EnrichField
	 */
	public function getEnrichField()
	{
		return $this->enrichField; 

	}

	/**
	 * The method to set the value to enrichField
	 * @param EnrichField $enrichField An instance of EnrichField
	 */
	public function setEnrichField(EnrichField $enrichField)
	{
		$this->enrichField=$enrichField; 
		$this->keyModified['enrich_field'] = 1; 

	}

	/**
	 * The method to get the crmField
	 * @return CrmField An instance of CrmField
	 */
	public function getCrmField()
	{
		return $this->crmField; 

	}

	/**
	 * The method to set the value to crmField
	 * @param CrmField $crmField An instance of CrmField
	 */
	public function setCrmField(CrmField $crmField)
	{
		$this->crmField=$crmField; 
		$this->keyModified['crm_field'] = 1; 

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
