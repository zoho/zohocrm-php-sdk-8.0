<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\util\Model;

class SummaryResponseWrapper implements Model, SummaryResponseHandler
{

	private  $sharingRulesSummary;
	private  $keyModified=array();

	/**
	 * The method to get the sharingRulesSummary
	 * @return array A array representing the sharingRulesSummary
	 */
	public function getSharingRulesSummary()
	{
		return $this->sharingRulesSummary; 

	}

	/**
	 * The method to set the value to sharingRulesSummary
	 * @param array $sharingRulesSummary A array
	 */
	public function setSharingRulesSummary(array $sharingRulesSummary)
	{
		$this->sharingRulesSummary=$sharingRulesSummary; 
		$this->keyModified['sharing_rules_summary'] = 1; 

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
