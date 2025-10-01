<?php 
namespace com\zoho\crm\api\hipaacompliance;

use com\zoho\crm\api\util\Model;

class HipaaCompliance implements Model
{

	private  $enabled;
	private  $enabledForModules;
	private  $restrictToZohoApps;
	private  $restrictDataAccessThroughAPI;
	private  $restrictDataInExport;
	private  $restrictToThirdPartyApps;
	private  $keyModified=array();

	/**
	 * The method to get the enabled
	 * @return bool A bool representing the enabled
	 */
	public function getEnabled()
	{
		return $this->enabled; 

	}

	/**
	 * The method to set the value to enabled
	 * @param bool $enabled A bool
	 */
	public function setEnabled(bool $enabled)
	{
		$this->enabled=$enabled; 
		$this->keyModified['enabled'] = 1; 

	}

	/**
	 * The method to get the enabledForModules
	 * @return array A array representing the enabledForModules
	 */
	public function getEnabledForModules()
	{
		return $this->enabledForModules; 

	}

	/**
	 * The method to set the value to enabledForModules
	 * @param array $enabledForModules A array
	 */
	public function setEnabledForModules(array $enabledForModules)
	{
		$this->enabledForModules=$enabledForModules; 
		$this->keyModified['enabled_for_modules'] = 1; 

	}

	/**
	 * The method to get the restrictToZohoApps
	 * @return bool A bool representing the restrictToZohoApps
	 */
	public function getRestrictToZohoApps()
	{
		return $this->restrictToZohoApps; 

	}

	/**
	 * The method to set the value to restrictToZohoApps
	 * @param bool $restrictToZohoApps A bool
	 */
	public function setRestrictToZohoApps(bool $restrictToZohoApps)
	{
		$this->restrictToZohoApps=$restrictToZohoApps; 
		$this->keyModified['restrict_to_zoho_apps'] = 1; 

	}

	/**
	 * The method to get the restrictDataAccessThroughAPI
	 * @return bool A bool representing the restrictDataAccessThroughAPI
	 */
	public function getRestrictDataAccessThroughAPI()
	{
		return $this->restrictDataAccessThroughAPI; 

	}

	/**
	 * The method to set the value to restrictDataAccessThroughAPI
	 * @param bool $restrictDataAccessThroughAPI A bool
	 */
	public function setRestrictDataAccessThroughAPI(bool $restrictDataAccessThroughAPI)
	{
		$this->restrictDataAccessThroughAPI=$restrictDataAccessThroughAPI; 
		$this->keyModified['restrict_data_access_through_api'] = 1; 

	}

	/**
	 * The method to get the restrictDataInExport
	 * @return bool A bool representing the restrictDataInExport
	 */
	public function getRestrictDataInExport()
	{
		return $this->restrictDataInExport; 

	}

	/**
	 * The method to set the value to restrictDataInExport
	 * @param bool $restrictDataInExport A bool
	 */
	public function setRestrictDataInExport(bool $restrictDataInExport)
	{
		$this->restrictDataInExport=$restrictDataInExport; 
		$this->keyModified['restrict_data_in_export'] = 1; 

	}

	/**
	 * The method to get the restrictToThirdPartyApps
	 * @return array A array representing the restrictToThirdPartyApps
	 */
	public function getRestrictToThirdPartyApps()
	{
		return $this->restrictToThirdPartyApps; 

	}

	/**
	 * The method to set the value to restrictToThirdPartyApps
	 * @param array $restrictToThirdPartyApps A array
	 */
	public function setRestrictToThirdPartyApps(array $restrictToThirdPartyApps)
	{
		$this->restrictToThirdPartyApps=$restrictToThirdPartyApps; 
		$this->keyModified['restrict_to_third_party_apps'] = 1; 

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
