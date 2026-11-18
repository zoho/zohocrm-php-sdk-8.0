<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class VisitorTracking implements Model
{

	private  $portalName;
	private  $trackingCode;
	private  $keyModified=array();

	/**
	 * The method to get the portalName
	 * @return string A string representing the portalName
	 */
	public function getPortalName()
	{
		return $this->portalName; 

	}

	/**
	 * The method to set the value to portalName
	 * @param string $portalName A string
	 */
	public function setPortalName(?string $portalName)
	{
		$this->portalName=$portalName; 
		$this->keyModified['portal_name'] = 1; 

	}

	/**
	 * The method to get the trackingCode
	 * @return string A string representing the trackingCode
	 */
	public function getTrackingCode()
	{
		return $this->trackingCode; 

	}

	/**
	 * The method to set the value to trackingCode
	 * @param string $trackingCode A string
	 */
	public function setTrackingCode(?string $trackingCode)
	{
		$this->trackingCode=$trackingCode; 
		$this->keyModified['tracking_code'] = 1; 

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
