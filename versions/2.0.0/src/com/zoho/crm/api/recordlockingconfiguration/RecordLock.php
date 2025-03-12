<?php 
namespace com\zoho\crm\api\recordlockingconfiguration;

use com\zoho\crm\api\fields\MinifiedField;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class RecordLock implements Model
{

	private  $createdTime;
	private  $lockedFor;
	private  $excludedFields;
	private  $createdBy;
	private  $featureType;
	private  $lockingRules;
	private  $restrictedActions;
	private  $lockForPortalUsers;
	private  $modifiedTime;
	private  $restrictedCommunications;
	private  $systemDefined;
	private  $modifiedBy;
	private  $id;
	private  $lockType;
	private  $restrictedCustomButtons;
	private  $lockExcludedProfiles;
	private  $keyModified=array();

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

	}

	/**
	 * The method to get the lockedFor
	 * @return string A string representing the lockedFor
	 */
	public function getLockedFor()
	{
		return $this->lockedFor; 

	}

	/**
	 * The method to set the value to lockedFor
	 * @param string $lockedFor A string
	 */
	public function setLockedFor(string $lockedFor)
	{
		$this->lockedFor=$lockedFor; 
		$this->keyModified['locked_for'] = 1; 

	}

	/**
	 * The method to get the excludedFields
	 * @return array A array representing the excludedFields
	 */
	public function getExcludedFields()
	{
		return $this->excludedFields; 

	}

	/**
	 * The method to set the value to excludedFields
	 * @param array $excludedFields A array
	 */
	public function setExcludedFields(array $excludedFields)
	{
		$this->excludedFields=$excludedFields; 
		$this->keyModified['excluded_fields'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param MinifiedUser $createdBy An instance of MinifiedUser
	 */
	public function setCreatedBy(MinifiedUser $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the featureType
	 * @return string A string representing the featureType
	 */
	public function getFeatureType()
	{
		return $this->featureType; 

	}

	/**
	 * The method to set the value to featureType
	 * @param string $featureType A string
	 */
	public function setFeatureType(string $featureType)
	{
		$this->featureType=$featureType; 
		$this->keyModified['feature_type'] = 1; 

	}

	/**
	 * The method to get the lockingRules
	 * @return array A array representing the lockingRules
	 */
	public function getLockingRules()
	{
		return $this->lockingRules; 

	}

	/**
	 * The method to set the value to lockingRules
	 * @param array $lockingRules A array
	 */
	public function setLockingRules(array $lockingRules)
	{
		$this->lockingRules=$lockingRules; 
		$this->keyModified['locking_rules'] = 1; 

	}

	/**
	 * The method to get the restrictedActions
	 * @return array A array representing the restrictedActions
	 */
	public function getRestrictedActions()
	{
		return $this->restrictedActions; 

	}

	/**
	 * The method to set the value to restrictedActions
	 * @param array $restrictedActions A array
	 */
	public function setRestrictedActions(array $restrictedActions)
	{
		$this->restrictedActions=$restrictedActions; 
		$this->keyModified['restricted_actions'] = 1; 

	}

	/**
	 * The method to get the lockForPortalUsers
	 * @return bool A bool representing the lockForPortalUsers
	 */
	public function getLockForPortalUsers()
	{
		return $this->lockForPortalUsers; 

	}

	/**
	 * The method to set the value to lockForPortalUsers
	 * @param bool $lockForPortalUsers A bool
	 */
	public function setLockForPortalUsers(bool $lockForPortalUsers)
	{
		$this->lockForPortalUsers=$lockForPortalUsers; 
		$this->keyModified['lock_for_portal_users'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

	}

	/**
	 * The method to get the restrictedCommunications
	 * @return array A array representing the restrictedCommunications
	 */
	public function getRestrictedCommunications()
	{
		return $this->restrictedCommunications; 

	}

	/**
	 * The method to set the value to restrictedCommunications
	 * @param array $restrictedCommunications A array
	 */
	public function setRestrictedCommunications(array $restrictedCommunications)
	{
		$this->restrictedCommunications=$restrictedCommunications; 
		$this->keyModified['restricted_communications'] = 1; 

	}

	/**
	 * The method to get the systemDefined
	 * @return bool A bool representing the systemDefined
	 */
	public function getSystemDefined()
	{
		return $this->systemDefined; 

	}

	/**
	 * The method to set the value to systemDefined
	 * @param bool $systemDefined A bool
	 */
	public function setSystemDefined(bool $systemDefined)
	{
		$this->systemDefined=$systemDefined; 
		$this->keyModified['system_defined'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param MinifiedUser $modifiedBy An instance of MinifiedUser
	 */
	public function setModifiedBy(MinifiedUser $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the lockType
	 * @return Choice An instance of Choice
	 */
	public function getLockType()
	{
		return $this->lockType; 

	}

	/**
	 * The method to set the value to lockType
	 * @param Choice $lockType An instance of Choice
	 */
	public function setLockType(Choice $lockType)
	{
		$this->lockType=$lockType; 
		$this->keyModified['lock_type'] = 1; 

	}

	/**
	 * The method to get the restrictedCustomButtons
	 * @return array A array representing the restrictedCustomButtons
	 */
	public function getRestrictedCustomButtons()
	{
		return $this->restrictedCustomButtons; 

	}

	/**
	 * The method to set the value to restrictedCustomButtons
	 * @param array $restrictedCustomButtons A array
	 */
	public function setRestrictedCustomButtons(array $restrictedCustomButtons)
	{
		$this->restrictedCustomButtons=$restrictedCustomButtons; 
		$this->keyModified['restricted_custom_buttons'] = 1; 

	}

	/**
	 * The method to get the lockExcludedProfiles
	 * @return array A array representing the lockExcludedProfiles
	 */
	public function getLockExcludedProfiles()
	{
		return $this->lockExcludedProfiles; 

	}

	/**
	 * The method to set the value to lockExcludedProfiles
	 * @param array $lockExcludedProfiles A array
	 */
	public function setLockExcludedProfiles(array $lockExcludedProfiles)
	{
		$this->lockExcludedProfiles=$lockExcludedProfiles; 
		$this->keyModified['lock_excluded_profiles'] = 1; 

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
