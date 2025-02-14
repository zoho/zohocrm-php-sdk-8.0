<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\util\Model;

class RulesSummary implements Model
{

	private  $module;
	private  $ruleComputationStatus;
	private  $ruleCount;
	private  $keyModified=array();

	/**
	 * The method to get the module
	 * @return Module An instance of Module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Module $module An instance of Module
	 */
	public function setModule(Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the ruleComputationStatus
	 * @return bool A bool representing the ruleComputationStatus
	 */
	public function getRuleComputationStatus()
	{
		return $this->ruleComputationStatus; 

	}

	/**
	 * The method to set the value to ruleComputationStatus
	 * @param bool $ruleComputationStatus A bool
	 */
	public function setRuleComputationStatus(bool $ruleComputationStatus)
	{
		$this->ruleComputationStatus=$ruleComputationStatus; 
		$this->keyModified['rule_computation_status'] = 1; 

	}

	/**
	 * The method to get the ruleCount
	 * @return int A int representing the ruleCount
	 */
	public function getRuleCount()
	{
		return $this->ruleCount; 

	}

	/**
	 * The method to set the value to ruleCount
	 * @param int $ruleCount A int
	 */
	public function setRuleCount(int $ruleCount)
	{
		$this->ruleCount=$ruleCount; 
		$this->keyModified['rule_count'] = 1; 

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
