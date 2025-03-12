<?php 
namespace com\zoho\crm\api\conversionoption;

use com\zoho\crm\api\modules\Modules;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class ConversionOptions implements Model
{

	private  $modulePreference;
	private  $contacts;
	private  $deals;
	private  $accounts;
	private  $preferenceFieldMatchedValue;
	private  $modulesWithMultipleLayouts;
	private  $keyModified=array();

	/**
	 * The method to get the modulePreference
	 * @return Modules An instance of Modules
	 */
	public function getModulePreference()
	{
		return $this->modulePreference; 

	}

	/**
	 * The method to set the value to modulePreference
	 * @param Modules $modulePreference An instance of Modules
	 */
	public function setModulePreference(Modules $modulePreference)
	{
		$this->modulePreference=$modulePreference; 
		$this->keyModified['module_preference'] = 1; 

	}

	/**
	 * The method to get the contacts
	 * @return array A array representing the contacts
	 */
	public function getContacts()
	{
		return $this->contacts; 

	}

	/**
	 * The method to set the value to contacts
	 * @param array $contacts A array
	 */
	public function setContacts(array $contacts)
	{
		$this->contacts=$contacts; 
		$this->keyModified['Contacts'] = 1; 

	}

	/**
	 * The method to get the deals
	 * @return array A array representing the deals
	 */
	public function getDeals()
	{
		return $this->deals; 

	}

	/**
	 * The method to set the value to deals
	 * @param array $deals A array
	 */
	public function setDeals(array $deals)
	{
		$this->deals=$deals; 
		$this->keyModified['Deals'] = 1; 

	}

	/**
	 * The method to get the accounts
	 * @return array A array representing the accounts
	 */
	public function getAccounts()
	{
		return $this->accounts; 

	}

	/**
	 * The method to set the value to accounts
	 * @param array $accounts A array
	 */
	public function setAccounts(array $accounts)
	{
		$this->accounts=$accounts; 
		$this->keyModified['Accounts'] = 1; 

	}

	/**
	 * The method to get the preferenceFieldMatchedValue
	 * @return PreferenceFieldMatchedValue An instance of PreferenceFieldMatchedValue
	 */
	public function getPreferenceFieldMatchedValue()
	{
		return $this->preferenceFieldMatchedValue; 

	}

	/**
	 * The method to set the value to preferenceFieldMatchedValue
	 * @param PreferenceFieldMatchedValue $preferenceFieldMatchedValue An instance of PreferenceFieldMatchedValue
	 */
	public function setPreferenceFieldMatchedValue(PreferenceFieldMatchedValue $preferenceFieldMatchedValue)
	{
		$this->preferenceFieldMatchedValue=$preferenceFieldMatchedValue; 
		$this->keyModified['preference_field_matched_value'] = 1; 

	}

	/**
	 * The method to get the modulesWithMultipleLayouts
	 * @return array A array representing the modulesWithMultipleLayouts
	 */
	public function getModulesWithMultipleLayouts()
	{
		return $this->modulesWithMultipleLayouts; 

	}

	/**
	 * The method to set the value to modulesWithMultipleLayouts
	 * @param array $modulesWithMultipleLayouts A array
	 */
	public function setModulesWithMultipleLayouts(array $modulesWithMultipleLayouts)
	{
		$this->modulesWithMultipleLayouts=$modulesWithMultipleLayouts; 
		$this->keyModified['modules_with_multiple_layouts'] = 1; 

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
