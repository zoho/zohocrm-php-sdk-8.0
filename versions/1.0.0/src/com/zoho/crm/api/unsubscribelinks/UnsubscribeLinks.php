<?php 
namespace com\zoho\crm\api\unsubscribelinks;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class UnsubscribeLinks implements Model
{

	private  $id;
	private  $name;
	private  $pageType;
	private  $customLocationUrl;
	private  $standardPageMessage;
	private  $submissionActionType;
	private  $submissionMessage;
	private  $submissionRedirectUrl;
	private  $locationUrlType;
	private  $actionOnUnsubscribe;
	private  $createdBy;
	private  $modifiedBy;
	private  $modifiedTime;
	private  $createdTime;
	private  $landingUrl;
	private  $keyModified=array();

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
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the pageType
	 * @return Choice An instance of Choice
	 */
	public function getPageType()
	{
		return $this->pageType; 

	}

	/**
	 * The method to set the value to pageType
	 * @param Choice $pageType An instance of Choice
	 */
	public function setPageType(Choice $pageType)
	{
		$this->pageType=$pageType; 
		$this->keyModified['page_type'] = 1; 

	}

	/**
	 * The method to get the customLocationUrl
	 * @return string A string representing the customLocationUrl
	 */
	public function getCustomLocationUrl()
	{
		return $this->customLocationUrl; 

	}

	/**
	 * The method to set the value to customLocationUrl
	 * @param string $customLocationUrl A string
	 */
	public function setCustomLocationUrl(string $customLocationUrl)
	{
		$this->customLocationUrl=$customLocationUrl; 
		$this->keyModified['custom_location_url'] = 1; 

	}

	/**
	 * The method to get the standardPageMessage
	 * @return string A string representing the standardPageMessage
	 */
	public function getStandardPageMessage()
	{
		return $this->standardPageMessage; 

	}

	/**
	 * The method to set the value to standardPageMessage
	 * @param string $standardPageMessage A string
	 */
	public function setStandardPageMessage(string $standardPageMessage)
	{
		$this->standardPageMessage=$standardPageMessage; 
		$this->keyModified['standard_page_message'] = 1; 

	}

	/**
	 * The method to get the submissionActionType
	 * @return Choice An instance of Choice
	 */
	public function getSubmissionActionType()
	{
		return $this->submissionActionType; 

	}

	/**
	 * The method to set the value to submissionActionType
	 * @param Choice $submissionActionType An instance of Choice
	 */
	public function setSubmissionActionType(Choice $submissionActionType)
	{
		$this->submissionActionType=$submissionActionType; 
		$this->keyModified['submission_action_type'] = 1; 

	}

	/**
	 * The method to get the submissionMessage
	 * @return string A string representing the submissionMessage
	 */
	public function getSubmissionMessage()
	{
		return $this->submissionMessage; 

	}

	/**
	 * The method to set the value to submissionMessage
	 * @param string $submissionMessage A string
	 */
	public function setSubmissionMessage(string $submissionMessage)
	{
		$this->submissionMessage=$submissionMessage; 
		$this->keyModified['submission_message'] = 1; 

	}

	/**
	 * The method to get the submissionRedirectUrl
	 * @return string A string representing the submissionRedirectUrl
	 */
	public function getSubmissionRedirectUrl()
	{
		return $this->submissionRedirectUrl; 

	}

	/**
	 * The method to set the value to submissionRedirectUrl
	 * @param string $submissionRedirectUrl A string
	 */
	public function setSubmissionRedirectUrl(string $submissionRedirectUrl)
	{
		$this->submissionRedirectUrl=$submissionRedirectUrl; 
		$this->keyModified['submission_redirect_url'] = 1; 

	}

	/**
	 * The method to get the locationUrlType
	 * @return string A string representing the locationUrlType
	 */
	public function getLocationUrlType()
	{
		return $this->locationUrlType; 

	}

	/**
	 * The method to set the value to locationUrlType
	 * @param string $locationUrlType A string
	 */
	public function setLocationUrlType(string $locationUrlType)
	{
		$this->locationUrlType=$locationUrlType; 
		$this->keyModified['location_url_type'] = 1; 

	}

	/**
	 * The method to get the actionOnUnsubscribe
	 * @return string A string representing the actionOnUnsubscribe
	 */
	public function getActionOnUnsubscribe()
	{
		return $this->actionOnUnsubscribe; 

	}

	/**
	 * The method to set the value to actionOnUnsubscribe
	 * @param string $actionOnUnsubscribe A string
	 */
	public function setActionOnUnsubscribe(string $actionOnUnsubscribe)
	{
		$this->actionOnUnsubscribe=$actionOnUnsubscribe; 
		$this->keyModified['action_on_unsubscribe'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public function setCreatedBy(User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public function setModifiedBy(User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

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
	 * The method to get the landingUrl
	 * @return string A string representing the landingUrl
	 */
	public function getLandingUrl()
	{
		return $this->landingUrl; 

	}

	/**
	 * The method to set the value to landingUrl
	 * @param string $landingUrl A string
	 */
	public function setLandingUrl(string $landingUrl)
	{
		$this->landingUrl=$landingUrl; 
		$this->keyModified['landing_url'] = 1; 

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
