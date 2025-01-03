<?php 
namespace com\zoho\crm\api\unsubscribelinks;

use com\zoho\crm\api\util\Model;

class AssociationsResponseWrapper implements Model, AssociationsResponseHandler
{

	private  $associations;
	private  $keyModified=array();

	/**
	 * The method to get the associations
	 * @return array A array representing the associations
	 */
	public function getAssociations()
	{
		return $this->associations; 

	}

	/**
	 * The method to set the value to associations
	 * @param array $associations A array
	 */
	public function setAssociations(array $associations)
	{
		$this->associations=$associations; 
		$this->keyModified['associations'] = 1; 

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
