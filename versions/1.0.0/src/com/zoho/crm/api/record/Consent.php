<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class Consent extends Record implements Model
{


	/**
	 * The method to get the owner
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getOwner()
	{
		return $this->getKeyValue('Owner'); 

	}

	/**
	 * The method to set the value to owner
	 * @param MinifiedUser $owner An instance of MinifiedUser
	 */
	public function setOwner(MinifiedUser $owner)
	{
		$this->addKeyValue('Owner', $owner); 

	}

	/**
	 * The method to get the contactThroughEmail
	 * @return bool A bool representing the contactThroughEmail
	 */
	public function getContactThroughEmail()
	{
		return $this->getKeyValue('Contact_Through_Email'); 

	}

	/**
	 * The method to set the value to contactThroughEmail
	 * @param bool $contactThroughEmail A bool
	 */
	public function setContactThroughEmail(bool $contactThroughEmail)
	{
		$this->addKeyValue('Contact_Through_Email', $contactThroughEmail); 

	}

	/**
	 * The method to get the contactThroughSocial
	 * @return bool A bool representing the contactThroughSocial
	 */
	public function getContactThroughSocial()
	{
		return $this->getKeyValue('Contact_Through_Social'); 

	}

	/**
	 * The method to set the value to contactThroughSocial
	 * @param bool $contactThroughSocial A bool
	 */
	public function setContactThroughSocial(bool $contactThroughSocial)
	{
		$this->addKeyValue('Contact_Through_Social', $contactThroughSocial); 

	}

	/**
	 * The method to get the contactThroughSurvey
	 * @return bool A bool representing the contactThroughSurvey
	 */
	public function getContactThroughSurvey()
	{
		return $this->getKeyValue('Contact_Through_Survey'); 

	}

	/**
	 * The method to set the value to contactThroughSurvey
	 * @param bool $contactThroughSurvey A bool
	 */
	public function setContactThroughSurvey(bool $contactThroughSurvey)
	{
		$this->addKeyValue('Contact_Through_Survey', $contactThroughSurvey); 

	}

	/**
	 * The method to get the contactThroughPhone
	 * @return bool A bool representing the contactThroughPhone
	 */
	public function getContactThroughPhone()
	{
		return $this->getKeyValue('Contact_Through_Phone'); 

	}

	/**
	 * The method to set the value to contactThroughPhone
	 * @param bool $contactThroughPhone A bool
	 */
	public function setContactThroughPhone(bool $contactThroughPhone)
	{
		$this->addKeyValue('Contact_Through_Phone', $contactThroughPhone); 

	}

	/**
	 * The method to get the mailSentTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getMailSentTime()
	{
		return $this->getKeyValue('Mail_Sent_Time'); 

	}

	/**
	 * The method to set the value to mailSentTime
	 * @param \DateTime $mailSentTime An instance of \DateTime
	 */
	public function setMailSentTime(\DateTime $mailSentTime)
	{
		$this->addKeyValue('Mail_Sent_Time', $mailSentTime); 

	}

	/**
	 * The method to get the consentDate
	 * @return \DateTime An instance of \DateTime
	 */
	public function getConsentDate()
	{
		return $this->getKeyValue('Consent_Date'); 

	}

	/**
	 * The method to set the value to consentDate
	 * @param \DateTime $consentDate An instance of \DateTime
	 */
	public function setConsentDate(\DateTime $consentDate)
	{
		$this->addKeyValue('Consent_Date', $consentDate); 

	}

	/**
	 * The method to get the consentRemarks
	 * @return string A string representing the consentRemarks
	 */
	public function getConsentRemarks()
	{
		return $this->getKeyValue('Consent_Remarks'); 

	}

	/**
	 * The method to set the value to consentRemarks
	 * @param string $consentRemarks A string
	 */
	public function setConsentRemarks(string $consentRemarks)
	{
		$this->addKeyValue('Consent_Remarks', $consentRemarks); 

	}

	/**
	 * The method to get the consentThrough
	 * @return string A string representing the consentThrough
	 */
	public function getConsentThrough()
	{
		return $this->getKeyValue('Consent_Through'); 

	}

	/**
	 * The method to set the value to consentThrough
	 * @param string $consentThrough A string
	 */
	public function setConsentThrough(string $consentThrough)
	{
		$this->addKeyValue('Consent_Through', $consentThrough); 

	}

	/**
	 * The method to get the dataProcessingBasis
	 * @return string A string representing the dataProcessingBasis
	 */
	public function getDataProcessingBasis()
	{
		return $this->getKeyValue('Data_Processing_Basis'); 

	}

	/**
	 * The method to set the value to dataProcessingBasis
	 * @param string $dataProcessingBasis A string
	 */
	public function setDataProcessingBasis(string $dataProcessingBasis)
	{
		$this->addKeyValue('Data_Processing_Basis', $dataProcessingBasis); 

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
