<?php 
namespace com\zoho\crm\api\ziaenrichment;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model
{

	private  $dataEnrichment;
	private  $keyModified=array();

	/**
	 * The method to get the dataEnrichment
	 * @return array A array representing the dataEnrichment
	 */
	public function getDataEnrichment()
	{
		return $this->dataEnrichment; 

	}

	/**
	 * The method to set the value to dataEnrichment
	 * @param array $dataEnrichment A array
	 */
	public function setDataEnrichment(array $dataEnrichment)
	{
		$this->dataEnrichment=$dataEnrichment; 
		$this->keyModified['data_enrichment'] = 1; 

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
