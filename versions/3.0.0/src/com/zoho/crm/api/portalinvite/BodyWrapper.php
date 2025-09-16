<?php 
namespace com\zoho\crm\api\portalinvite;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $portalInvite;
	private  $keyModified=array();

	/**
	 * The method to get the portalInvite
	 * @return array A array representing the portalInvite
	 */
	public function getPortalInvite()
	{
		return $this->portalInvite; 

	}

	/**
	 * The method to set the value to portalInvite
	 * @param array $portalInvite A array
	 */
	public function setPortalInvite(array $portalInvite)
	{
		$this->portalInvite=$portalInvite; 
		$this->keyModified['portal_invite'] = 1; 

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
