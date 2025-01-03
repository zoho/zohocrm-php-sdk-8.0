<?php 
namespace com\zoho\crm\api\recordlocking;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class RecordLock extends Record implements Model
{


	/**
	 * The method to get the lockSourceS
	 * @return Choice An instance of Choice
	 */
	public function getLockSourceS()
	{
		return $this->getKeyValue('lock_source__s'); 

	}

	/**
	 * The method to set the value to lockSourceS
	 * @param Choice $lockSourceS An instance of Choice
	 */
	public function setLockSourceS(Choice $lockSourceS)
	{
		$this->addKeyValue('lock_source__s', $lockSourceS); 

	}

	/**
	 * The method to get the lockedByS
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getLockedByS()
	{
		return $this->getKeyValue('locked_by__s'); 

	}

	/**
	 * The method to set the value to lockedByS
	 * @param MinifiedUser $lockedByS An instance of MinifiedUser
	 */
	public function setLockedByS(MinifiedUser $lockedByS)
	{
		$this->addKeyValue('locked_by__s', $lockedByS); 

	}

	/**
	 * The method to get the lockedForS
	 * @return LockedForS An instance of LockedForS
	 */
	public function getLockedForS()
	{
		return $this->getKeyValue('locked_for_s'); 

	}

	/**
	 * The method to set the value to lockedForS
	 * @param LockedForS $lockedForS An instance of LockedForS
	 */
	public function setLockedForS(LockedForS $lockedForS)
	{
		$this->addKeyValue('locked_for_s', $lockedForS); 

	}

	/**
	 * The method to get the lockedReasonS
	 * @return string A string representing the lockedReasonS
	 */
	public function getLockedReasonS()
	{
		return $this->getKeyValue('locked_reason__s'); 

	}

	/**
	 * The method to set the value to lockedReasonS
	 * @param string $lockedReasonS A string
	 */
	public function setLockedReasonS(string $lockedReasonS)
	{
		$this->addKeyValue('locked_reason__s', $lockedReasonS); 

	}

	/**
	 * The method to get the lockedTimeS
	 * @return string A string representing the lockedTimeS
	 */
	public function getLockedTimeS()
	{
		return $this->getKeyValue('Locked_time__s'); 

	}

	/**
	 * The method to set the value to lockedTimeS
	 * @param string $lockedTimeS A string
	 */
	public function setLockedTimeS(string $lockedTimeS)
	{
		$this->addKeyValue('Locked_time__s', $lockedTimeS); 

	}

	/**
	 * The method to get the recordLockingConfigurationIdS
	 * @return string A string representing the recordLockingConfigurationIdS
	 */
	public function getRecordLockingConfigurationIdS()
	{
		return $this->getKeyValue('record_locking_configuration_id__s'); 

	}

	/**
	 * The method to set the value to recordLockingConfigurationIdS
	 * @param string $recordLockingConfigurationIdS A string
	 */
	public function setRecordLockingConfigurationIdS(string $recordLockingConfigurationIdS)
	{
		$this->addKeyValue('record_locking_configuration_id__s', $recordLockingConfigurationIdS); 

	}

	/**
	 * The method to get the recordLockingRuleIdS
	 * @return string A string representing the recordLockingRuleIdS
	 */
	public function getRecordLockingRuleIdS()
	{
		return $this->getKeyValue('record_locking_rule_id__s'); 

	}

	/**
	 * The method to set the value to recordLockingRuleIdS
	 * @param string $recordLockingRuleIdS A string
	 */
	public function setRecordLockingRuleIdS(string $recordLockingRuleIdS)
	{
		$this->addKeyValue('record_locking_rule_id__s', $recordLockingRuleIdS); 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->getKeyValue('id'); 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->addKeyValue('id', $id); 

	}

	/**
	 * The method to get the createdBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy()
	{
		return $this->getKeyValue('Created_By'); 

	}

	/**
	 * The method to set the value to createdBy
	 * @param MinifiedUser $createdBy An instance of MinifiedUser
	 */
	public function setCreatedBy(MinifiedUser $createdBy)
	{
		$this->addKeyValue('Created_By', $createdBy); 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->getKeyValue('Created_Time'); 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->addKeyValue('Created_Time', $createdTime); 

	}

	/**
	 * The method to get the modifiedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getModifiedBy()
	{
		return $this->getKeyValue('Modified_By'); 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param MinifiedUser $modifiedBy An instance of MinifiedUser
	 */
	public function setModifiedBy(MinifiedUser $modifiedBy)
	{
		$this->addKeyValue('Modified_By', $modifiedBy); 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->getKeyValue('Modified_Time'); 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->addKeyValue('Modified_Time', $modifiedTime); 

	}

	/**
	 * The method to get the tag
	 * @return array A array representing the tag
	 */
	public function getTag()
	{
		return $this->getKeyValue('Tag'); 

	}

	/**
	 * The method to set the value to tag
	 * @param array $tag A array
	 */
	public function setTag(array $tag)
	{
		$this->addKeyValue('Tag', $tag); 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->getKeyValue('name'); 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->addKeyValue('name', $name); 

	}
} 
