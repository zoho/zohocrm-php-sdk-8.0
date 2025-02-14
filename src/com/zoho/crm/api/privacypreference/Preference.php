<?php 
namespace com\zoho\crm\api\privacypreference;

use com\zoho\crm\api\util\Model;

class Preference implements Model
{

	private  $consentModules;
	private  $restrictTptFields;
	private  $excludeAPIZoho;
	private  $awaitingPeriod;
	private  $consentMailSend;
	private  $excludeExportFields;
	private  $limitActions;
	private  $excludeExport;
	private  $restrictZohoInteg;
	private  $excludeAPIZohoFields;
	private  $durationTiming;
	private  $dataProcessingDuration;
	private  $restrictTptServices;
	private  $excludeAPITptFields;
	private  $restrictZohoIntegServices;
	private  $privacySettingStatus;
	private  $doubleOptIn;
	private  $restrictZohoIntegFields;
	private  $excludeAPITpt;
	private  $blockList;
	private  $restrictTpt;
	private  $actionsWhileAwaiting;
	private  $keyModified=array();

	/**
	 * The method to get the consentModules
	 * @return string A string representing the consentModules
	 */
	public function getConsentModules()
	{
		return $this->consentModules; 

	}

	/**
	 * The method to set the value to consentModules
	 * @param string $consentModules A string
	 */
	public function setConsentModules(string $consentModules)
	{
		$this->consentModules=$consentModules; 
		$this->keyModified['consent_modules'] = 1; 

	}

	/**
	 * The method to get the restrictTptFields
	 * @return string A string representing the restrictTptFields
	 */
	public function getRestrictTptFields()
	{
		return $this->restrictTptFields; 

	}

	/**
	 * The method to set the value to restrictTptFields
	 * @param string $restrictTptFields A string
	 */
	public function setRestrictTptFields(string $restrictTptFields)
	{
		$this->restrictTptFields=$restrictTptFields; 
		$this->keyModified['restrict_tpt_fields'] = 1; 

	}

	/**
	 * The method to get the excludeAPIZoho
	 * @return string A string representing the excludeAPIZoho
	 */
	public function getExcludeAPIZoho()
	{
		return $this->excludeAPIZoho; 

	}

	/**
	 * The method to set the value to excludeAPIZoho
	 * @param string $excludeAPIZoho A string
	 */
	public function setExcludeAPIZoho(string $excludeAPIZoho)
	{
		$this->excludeAPIZoho=$excludeAPIZoho; 
		$this->keyModified['exclude_api_zoho'] = 1; 

	}

	/**
	 * The method to get the awaitingPeriod
	 * @return string A string representing the awaitingPeriod
	 */
	public function getAwaitingPeriod()
	{
		return $this->awaitingPeriod; 

	}

	/**
	 * The method to set the value to awaitingPeriod
	 * @param string $awaitingPeriod A string
	 */
	public function setAwaitingPeriod(string $awaitingPeriod)
	{
		$this->awaitingPeriod=$awaitingPeriod; 
		$this->keyModified['awaiting_period'] = 1; 

	}

	/**
	 * The method to get the consentMailSend
	 * @return string A string representing the consentMailSend
	 */
	public function getConsentMailSend()
	{
		return $this->consentMailSend; 

	}

	/**
	 * The method to set the value to consentMailSend
	 * @param string $consentMailSend A string
	 */
	public function setConsentMailSend(string $consentMailSend)
	{
		$this->consentMailSend=$consentMailSend; 
		$this->keyModified['consent_mail_send'] = 1; 

	}

	/**
	 * The method to get the excludeExportFields
	 * @return string A string representing the excludeExportFields
	 */
	public function getExcludeExportFields()
	{
		return $this->excludeExportFields; 

	}

	/**
	 * The method to set the value to excludeExportFields
	 * @param string $excludeExportFields A string
	 */
	public function setExcludeExportFields(string $excludeExportFields)
	{
		$this->excludeExportFields=$excludeExportFields; 
		$this->keyModified['exclude_export_fields'] = 1; 

	}

	/**
	 * The method to get the limitActions
	 * @return string A string representing the limitActions
	 */
	public function getLimitActions()
	{
		return $this->limitActions; 

	}

	/**
	 * The method to set the value to limitActions
	 * @param string $limitActions A string
	 */
	public function setLimitActions(string $limitActions)
	{
		$this->limitActions=$limitActions; 
		$this->keyModified['limit_actions'] = 1; 

	}

	/**
	 * The method to get the excludeExport
	 * @return string A string representing the excludeExport
	 */
	public function getExcludeExport()
	{
		return $this->excludeExport; 

	}

	/**
	 * The method to set the value to excludeExport
	 * @param string $excludeExport A string
	 */
	public function setExcludeExport(string $excludeExport)
	{
		$this->excludeExport=$excludeExport; 
		$this->keyModified['exclude_export'] = 1; 

	}

	/**
	 * The method to get the restrictZohoInteg
	 * @return string A string representing the restrictZohoInteg
	 */
	public function getRestrictZohoInteg()
	{
		return $this->restrictZohoInteg; 

	}

	/**
	 * The method to set the value to restrictZohoInteg
	 * @param string $restrictZohoInteg A string
	 */
	public function setRestrictZohoInteg(string $restrictZohoInteg)
	{
		$this->restrictZohoInteg=$restrictZohoInteg; 
		$this->keyModified['restrict_zoho_integ'] = 1; 

	}

	/**
	 * The method to get the excludeAPIZohoFields
	 * @return string A string representing the excludeAPIZohoFields
	 */
	public function getExcludeAPIZohoFields()
	{
		return $this->excludeAPIZohoFields; 

	}

	/**
	 * The method to set the value to excludeAPIZohoFields
	 * @param string $excludeAPIZohoFields A string
	 */
	public function setExcludeAPIZohoFields(string $excludeAPIZohoFields)
	{
		$this->excludeAPIZohoFields=$excludeAPIZohoFields; 
		$this->keyModified['exclude_api_zoho_fields'] = 1; 

	}

	/**
	 * The method to get the durationTiming
	 * @return string A string representing the durationTiming
	 */
	public function getDurationTiming()
	{
		return $this->durationTiming; 

	}

	/**
	 * The method to set the value to durationTiming
	 * @param string $durationTiming A string
	 */
	public function setDurationTiming(string $durationTiming)
	{
		$this->durationTiming=$durationTiming; 
		$this->keyModified['duration_timing'] = 1; 

	}

	/**
	 * The method to get the dataProcessingDuration
	 * @return string A string representing the dataProcessingDuration
	 */
	public function getDataProcessingDuration()
	{
		return $this->dataProcessingDuration; 

	}

	/**
	 * The method to set the value to dataProcessingDuration
	 * @param string $dataProcessingDuration A string
	 */
	public function setDataProcessingDuration(string $dataProcessingDuration)
	{
		$this->dataProcessingDuration=$dataProcessingDuration; 
		$this->keyModified['data_processing_duration'] = 1; 

	}

	/**
	 * The method to get the restrictTptServices
	 * @return string A string representing the restrictTptServices
	 */
	public function getRestrictTptServices()
	{
		return $this->restrictTptServices; 

	}

	/**
	 * The method to set the value to restrictTptServices
	 * @param string $restrictTptServices A string
	 */
	public function setRestrictTptServices(string $restrictTptServices)
	{
		$this->restrictTptServices=$restrictTptServices; 
		$this->keyModified['restrict_tpt_services'] = 1; 

	}

	/**
	 * The method to get the excludeAPITptFields
	 * @return string A string representing the excludeAPITptFields
	 */
	public function getExcludeAPITptFields()
	{
		return $this->excludeAPITptFields; 

	}

	/**
	 * The method to set the value to excludeAPITptFields
	 * @param string $excludeAPITptFields A string
	 */
	public function setExcludeAPITptFields(string $excludeAPITptFields)
	{
		$this->excludeAPITptFields=$excludeAPITptFields; 
		$this->keyModified['exclude_api_tpt_fields'] = 1; 

	}

	/**
	 * The method to get the restrictZohoIntegServices
	 * @return string A string representing the restrictZohoIntegServices
	 */
	public function getRestrictZohoIntegServices()
	{
		return $this->restrictZohoIntegServices; 

	}

	/**
	 * The method to set the value to restrictZohoIntegServices
	 * @param string $restrictZohoIntegServices A string
	 */
	public function setRestrictZohoIntegServices(string $restrictZohoIntegServices)
	{
		$this->restrictZohoIntegServices=$restrictZohoIntegServices; 
		$this->keyModified['restrict_zoho_integ_services'] = 1; 

	}

	/**
	 * The method to get the privacySettingStatus
	 * @return string A string representing the privacySettingStatus
	 */
	public function getPrivacySettingStatus()
	{
		return $this->privacySettingStatus; 

	}

	/**
	 * The method to set the value to privacySettingStatus
	 * @param string $privacySettingStatus A string
	 */
	public function setPrivacySettingStatus(string $privacySettingStatus)
	{
		$this->privacySettingStatus=$privacySettingStatus; 
		$this->keyModified['privacy_setting_status'] = 1; 

	}

	/**
	 * The method to get the doubleOptIn
	 * @return string A string representing the doubleOptIn
	 */
	public function getDoubleOptIn()
	{
		return $this->doubleOptIn; 

	}

	/**
	 * The method to set the value to doubleOptIn
	 * @param string $doubleOptIn A string
	 */
	public function setDoubleOptIn(string $doubleOptIn)
	{
		$this->doubleOptIn=$doubleOptIn; 
		$this->keyModified['double_opt_in'] = 1; 

	}

	/**
	 * The method to get the restrictZohoIntegFields
	 * @return string A string representing the restrictZohoIntegFields
	 */
	public function getRestrictZohoIntegFields()
	{
		return $this->restrictZohoIntegFields; 

	}

	/**
	 * The method to set the value to restrictZohoIntegFields
	 * @param string $restrictZohoIntegFields A string
	 */
	public function setRestrictZohoIntegFields(string $restrictZohoIntegFields)
	{
		$this->restrictZohoIntegFields=$restrictZohoIntegFields; 
		$this->keyModified['restrict_zoho_integ_fields'] = 1; 

	}

	/**
	 * The method to get the excludeAPITpt
	 * @return string A string representing the excludeAPITpt
	 */
	public function getExcludeAPITpt()
	{
		return $this->excludeAPITpt; 

	}

	/**
	 * The method to set the value to excludeAPITpt
	 * @param string $excludeAPITpt A string
	 */
	public function setExcludeAPITpt(string $excludeAPITpt)
	{
		$this->excludeAPITpt=$excludeAPITpt; 
		$this->keyModified['exclude_api_tpt'] = 1; 

	}

	/**
	 * The method to get the blockList
	 * @return string A string representing the blockList
	 */
	public function getBlockList()
	{
		return $this->blockList; 

	}

	/**
	 * The method to set the value to blockList
	 * @param string $blockList A string
	 */
	public function setBlockList(string $blockList)
	{
		$this->blockList=$blockList; 
		$this->keyModified['block_list'] = 1; 

	}

	/**
	 * The method to get the restrictTpt
	 * @return string A string representing the restrictTpt
	 */
	public function getRestrictTpt()
	{
		return $this->restrictTpt; 

	}

	/**
	 * The method to set the value to restrictTpt
	 * @param string $restrictTpt A string
	 */
	public function setRestrictTpt(string $restrictTpt)
	{
		$this->restrictTpt=$restrictTpt; 
		$this->keyModified['restrict_tpt'] = 1; 

	}

	/**
	 * The method to get the actionsWhileAwaiting
	 * @return string A string representing the actionsWhileAwaiting
	 */
	public function getActionsWhileAwaiting()
	{
		return $this->actionsWhileAwaiting; 

	}

	/**
	 * The method to set the value to actionsWhileAwaiting
	 * @param string $actionsWhileAwaiting A string
	 */
	public function setActionsWhileAwaiting(string $actionsWhileAwaiting)
	{
		$this->actionsWhileAwaiting=$actionsWhileAwaiting; 
		$this->keyModified['actions_while_awaiting'] = 1; 

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
