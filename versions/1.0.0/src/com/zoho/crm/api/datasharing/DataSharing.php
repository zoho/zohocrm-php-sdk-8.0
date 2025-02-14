<?php 
namespace com\zoho\crm\api\datasharing;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class DataSharing implements Model
{

	private  $shareType;
	private  $publicInPortals;
	private  $module;
	private  $ruleComputationRunning;
	private  $keyModified=array();

	/**
	 * The method to get the shareType
	 * @return Choice An instance of Choice
	 */
	public function getShareType()
	{
		return $this->shareType; 

	}

	/**
	 * The method to set the value to shareType
	 * @param Choice $shareType An instance of Choice
	 */
	public function setShareType(Choice $shareType)
	{
		$this->shareType=$shareType; 
		$this->keyModified['share_type'] = 1; 

	}

	/**
	 * The method to get the publicInPortals
	 * @return bool A bool representing the publicInPortals
	 */
	public function getPublicInPortals()
	{
		return $this->publicInPortals; 

	}

	/**
	 * The method to set the value to publicInPortals
	 * @param bool $publicInPortals A bool
	 */
	public function setPublicInPortals(bool $publicInPortals)
	{
		$this->publicInPortals=$publicInPortals; 
		$this->keyModified['public_in_portals'] = 1; 

	}

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
	 * The method to get the ruleComputationRunning
	 * @return bool A bool representing the ruleComputationRunning
	 */
	public function getRuleComputationRunning()
	{
		return $this->ruleComputationRunning; 

	}

	/**
	 * The method to set the value to ruleComputationRunning
	 * @param bool $ruleComputationRunning A bool
	 */
	public function setRuleComputationRunning(bool $ruleComputationRunning)
	{
		$this->ruleComputationRunning=$ruleComputationRunning; 
		$this->keyModified['rule_computation_running'] = 1; 

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
