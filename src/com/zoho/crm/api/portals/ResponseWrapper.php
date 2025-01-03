<?php 
namespace com\zoho\crm\api\portals;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $portals;
	private  $keyModified=array();

	/**
	 * The method to get the portals
	 * @return array A array representing the portals
	 */
	public function getPortals()
	{
		return $this->portals; 

	}

	/**
	 * The method to set the value to portals
	 * @param array $portals A array
	 */
	public function setPortals(array $portals)
	{
		$this->portals=$portals; 
		$this->keyModified['portals'] = 1; 

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
