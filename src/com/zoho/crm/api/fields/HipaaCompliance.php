<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class HipaaCompliance implements Model
{

	private  $restrictedInExport;
	private  $restricted;
	private  $keyModified=array();

	/**
	 * The method to get the restrictedInExport
	 * @return bool A bool representing the restrictedInExport
	 */
	public function getRestrictedInExport()
	{
		return $this->restrictedInExport; 

	}

	/**
	 * The method to set the value to restrictedInExport
	 * @param bool $restrictedInExport A bool
	 */
	public function setRestrictedInExport(bool $restrictedInExport)
	{
		$this->restrictedInExport=$restrictedInExport; 
		$this->keyModified['restricted_in_export'] = 1; 

	}

	/**
	 * The method to get the restricted
	 * @return bool A bool representing the restricted
	 */
	public function getRestricted()
	{
		return $this->restricted; 

	}

	/**
	 * The method to set the value to restricted
	 * @param bool $restricted A bool
	 */
	public function setRestricted(bool $restricted)
	{
		$this->restricted=$restricted; 
		$this->keyModified['restricted'] = 1; 

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
