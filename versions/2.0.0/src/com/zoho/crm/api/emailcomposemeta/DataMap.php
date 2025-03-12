<?php 
namespace com\zoho\crm\api\emailcomposemeta;

use com\zoho\crm\api\util\Model;

class DataMap implements Model
{

	private  $user;
	private  $featuresAvailable;
	private  $fromAddress;
	private  $relayDomains;
	private  $mergefieldsdata;
	private  $keyModified=array();

	/**
	 * The method to get the user
	 * @return User An instance of User
	 */
	public function getUser()
	{
		return $this->user; 

	}

	/**
	 * The method to set the value to user
	 * @param User $user An instance of User
	 */
	public function setUser(User $user)
	{
		$this->user=$user; 
		$this->keyModified['user'] = 1; 

	}

	/**
	 * The method to get the featuresAvailable
	 * @return FeaturesAvailable An instance of FeaturesAvailable
	 */
	public function getFeaturesAvailable()
	{
		return $this->featuresAvailable; 

	}

	/**
	 * The method to set the value to featuresAvailable
	 * @param FeaturesAvailable $featuresAvailable An instance of FeaturesAvailable
	 */
	public function setFeaturesAvailable(FeaturesAvailable $featuresAvailable)
	{
		$this->featuresAvailable=$featuresAvailable; 
		$this->keyModified['features_available'] = 1; 

	}

	/**
	 * The method to get the fromAddress
	 * @return array A array representing the fromAddress
	 */
	public function getFromAddress()
	{
		return $this->fromAddress; 

	}

	/**
	 * The method to set the value to fromAddress
	 * @param array $fromAddress A array
	 */
	public function setFromAddress(array $fromAddress)
	{
		$this->fromAddress=$fromAddress; 
		$this->keyModified['from_address'] = 1; 

	}

	/**
	 * The method to get the relayDomains
	 * @return array A array representing the relayDomains
	 */
	public function getRelayDomains()
	{
		return $this->relayDomains; 

	}

	/**
	 * The method to set the value to relayDomains
	 * @param array $relayDomains A array
	 */
	public function setRelayDomains(array $relayDomains)
	{
		$this->relayDomains=$relayDomains; 
		$this->keyModified['relay_domains'] = 1; 

	}

	/**
	 * The method to get the mergefieldsdata
	 * @return string A string representing the mergefieldsdata
	 */
	public function getMergefieldsdata()
	{
		return $this->mergefieldsdata; 

	}

	/**
	 * The method to set the value to mergefieldsdata
	 * @param string $mergefieldsdata A string
	 */
	public function setMergefieldsdata(string $mergefieldsdata)
	{
		$this->mergefieldsdata=$mergefieldsdata; 
		$this->keyModified['mergeFieldsData'] = 1; 

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
