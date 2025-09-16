<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class WebForm implements Model
{

	private  $googleSite;
	private  $encryptedFormId;
	private  $owner;
	private  $userType;
	private  $acknowledgeVisitor;
	private  $buttonAttributes;
	private  $encryptedZgid;
	private  $createdTime;
	private  $analyticsData;
	private  $module;
	private  $encryptedModule;
	private  $active;
	private  $adwordEnabled;
	private  $notifyOwner;
	private  $createdBy;
	private  $formAttributes;
	private  $locationUrl;
	private  $landingUrl;
	private  $doubleOptinEnabled;
	private  $layout;
	private  $tags;
	private  $approvalRequest;
	private  $type;
	private  $createContact;
	private  $assignmentRule;
	private  $name;
	private  $id;
	private  $spamControl;
	private  $fields;
	private  $formFields;
	private  $abtesting;
	private  $visitorTracking;
	private  $lastSubmittedTime;
	private  $actionOnSubmit;
	private  $actionValue;
	private  $suggestion;
	private  $embedCode;
	private  $codeFormats;
	private  $sourceCode;
	private  $iframeCode;
	private  $keyModified=array();

	/**
	 * The method to get the googleSite
	 * @return string A string representing the googleSite
	 */
	public function getGoogleSite()
	{
		return $this->googleSite; 

	}

	/**
	 * The method to set the value to googleSite
	 * @param string $googleSite A string
	 */
	public function setGoogleSite(string $googleSite)
	{
		$this->googleSite=$googleSite; 
		$this->keyModified['google_site'] = 1; 

	}

	/**
	 * The method to get the encryptedFormId
	 * @return string A string representing the encryptedFormId
	 */
	public function getEncryptedFormId()
	{
		return $this->encryptedFormId; 

	}

	/**
	 * The method to set the value to encryptedFormId
	 * @param string $encryptedFormId A string
	 */
	public function setEncryptedFormId(string $encryptedFormId)
	{
		$this->encryptedFormId=$encryptedFormId; 
		$this->keyModified['encrypted_form_id'] = 1; 

	}

	/**
	 * The method to get the owner
	 * @return Owner An instance of Owner
	 */
	public function getOwner()
	{
		return $this->owner; 

	}

	/**
	 * The method to set the value to owner
	 * @param Owner $owner An instance of Owner
	 */
	public function setOwner(Owner $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['owner'] = 1; 

	}

	/**
	 * The method to get the userType
	 * @return User An instance of User
	 */
	public function getUserType()
	{
		return $this->userType; 

	}

	/**
	 * The method to set the value to userType
	 * @param User $userType An instance of User
	 */
	public function setUserType(User $userType)
	{
		$this->userType=$userType; 
		$this->keyModified['user_type'] = 1; 

	}

	/**
	 * The method to get the acknowledgeVisitor
	 * @return AcknowledgeVisitors An instance of AcknowledgeVisitors
	 */
	public function getAcknowledgeVisitor()
	{
		return $this->acknowledgeVisitor; 

	}

	/**
	 * The method to set the value to acknowledgeVisitor
	 * @param AcknowledgeVisitors $acknowledgeVisitor An instance of AcknowledgeVisitors
	 */
	public function setAcknowledgeVisitor(AcknowledgeVisitors $acknowledgeVisitor)
	{
		$this->acknowledgeVisitor=$acknowledgeVisitor; 
		$this->keyModified['acknowledge_visitor'] = 1; 

	}

	/**
	 * The method to get the buttonAttributes
	 * @return array A array representing the buttonAttributes
	 */
	public function getButtonAttributes()
	{
		return $this->buttonAttributes; 

	}

	/**
	 * The method to set the value to buttonAttributes
	 * @param array $buttonAttributes A array
	 */
	public function setButtonAttributes(array $buttonAttributes)
	{
		$this->buttonAttributes=$buttonAttributes; 
		$this->keyModified['button_attributes'] = 1; 

	}

	/**
	 * The method to get the encryptedZgid
	 * @return string A string representing the encryptedZgid
	 */
	public function getEncryptedZgid()
	{
		return $this->encryptedZgid; 

	}

	/**
	 * The method to set the value to encryptedZgid
	 * @param string $encryptedZgid A string
	 */
	public function setEncryptedZgid(string $encryptedZgid)
	{
		$this->encryptedZgid=$encryptedZgid; 
		$this->keyModified['encrypted_zgid'] = 1; 

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
	 * The method to get the analyticsData
	 * @return AnalyticsData An instance of AnalyticsData
	 */
	public function getAnalyticsData()
	{
		return $this->analyticsData; 

	}

	/**
	 * The method to set the value to analyticsData
	 * @param AnalyticsData $analyticsData An instance of AnalyticsData
	 */
	public function setAnalyticsData(AnalyticsData $analyticsData)
	{
		$this->analyticsData=$analyticsData; 
		$this->keyModified['analytics_data'] = 1; 

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
	 * The method to get the encryptedModule
	 * @return string A string representing the encryptedModule
	 */
	public function getEncryptedModule()
	{
		return $this->encryptedModule; 

	}

	/**
	 * The method to set the value to encryptedModule
	 * @param string $encryptedModule A string
	 */
	public function setEncryptedModule(string $encryptedModule)
	{
		$this->encryptedModule=$encryptedModule; 
		$this->keyModified['encrypted_module'] = 1; 

	}

	/**
	 * The method to get the active
	 * @return bool A bool representing the active
	 */
	public function getActive()
	{
		return $this->active; 

	}

	/**
	 * The method to set the value to active
	 * @param bool $active A bool
	 */
	public function setActive(bool $active)
	{
		$this->active=$active; 
		$this->keyModified['active'] = 1; 

	}

	/**
	 * The method to get the adwordEnabled
	 * @return bool A bool representing the adwordEnabled
	 */
	public function getAdwordEnabled()
	{
		return $this->adwordEnabled; 

	}

	/**
	 * The method to set the value to adwordEnabled
	 * @param bool $adwordEnabled A bool
	 */
	public function setAdwordEnabled(bool $adwordEnabled)
	{
		$this->adwordEnabled=$adwordEnabled; 
		$this->keyModified['adword_enabled'] = 1; 

	}

	/**
	 * The method to get the notifyOwner
	 * @return Owner An instance of Owner
	 */
	public function getNotifyOwner()
	{
		return $this->notifyOwner; 

	}

	/**
	 * The method to set the value to notifyOwner
	 * @param Owner $notifyOwner An instance of Owner
	 */
	public function setNotifyOwner(Owner $notifyOwner)
	{
		$this->notifyOwner=$notifyOwner; 
		$this->keyModified['notify_owner'] = 1; 

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
	 * The method to get the formAttributes
	 * @return FormAttributes An instance of FormAttributes
	 */
	public function getFormAttributes()
	{
		return $this->formAttributes; 

	}

	/**
	 * The method to set the value to formAttributes
	 * @param FormAttributes $formAttributes An instance of FormAttributes
	 */
	public function setFormAttributes(FormAttributes $formAttributes)
	{
		$this->formAttributes=$formAttributes; 
		$this->keyModified['form_attributes'] = 1; 

	}

	/**
	 * The method to get the locationUrl
	 * @return array A array representing the locationUrl
	 */
	public function getLocationUrl()
	{
		return $this->locationUrl; 

	}

	/**
	 * The method to set the value to locationUrl
	 * @param array $locationUrl A array
	 */
	public function setLocationUrl(array $locationUrl)
	{
		$this->locationUrl=$locationUrl; 
		$this->keyModified['location_url'] = 1; 

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
	 * The method to get the doubleOptinEnabled
	 * @return bool A bool representing the doubleOptinEnabled
	 */
	public function getDoubleOptinEnabled()
	{
		return $this->doubleOptinEnabled; 

	}

	/**
	 * The method to set the value to doubleOptinEnabled
	 * @param bool $doubleOptinEnabled A bool
	 */
	public function setDoubleOptinEnabled(bool $doubleOptinEnabled)
	{
		$this->doubleOptinEnabled=$doubleOptinEnabled; 
		$this->keyModified['double_optin_enabled'] = 1; 

	}

	/**
	 * The method to get the layout
	 * @return Layout An instance of Layout
	 */
	public function getLayout()
	{
		return $this->layout; 

	}

	/**
	 * The method to set the value to layout
	 * @param Layout $layout An instance of Layout
	 */
	public function setLayout(Layout $layout)
	{
		$this->layout=$layout; 
		$this->keyModified['layout'] = 1; 

	}

	/**
	 * The method to get the tags
	 * @return array A array representing the tags
	 */
	public function getTags()
	{
		return $this->tags; 

	}

	/**
	 * The method to set the value to tags
	 * @param array $tags A array
	 */
	public function setTags(array $tags)
	{
		$this->tags=$tags; 
		$this->keyModified['tags'] = 1; 

	}

	/**
	 * The method to get the approvalRequest
	 * @return bool A bool representing the approvalRequest
	 */
	public function getApprovalRequest()
	{
		return $this->approvalRequest; 

	}

	/**
	 * The method to set the value to approvalRequest
	 * @param bool $approvalRequest A bool
	 */
	public function setApprovalRequest(bool $approvalRequest)
	{
		$this->approvalRequest=$approvalRequest; 
		$this->keyModified['approval_request'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the createContact
	 * @return bool A bool representing the createContact
	 */
	public function getCreateContact()
	{
		return $this->createContact; 

	}

	/**
	 * The method to set the value to createContact
	 * @param bool $createContact A bool
	 */
	public function setCreateContact(bool $createContact)
	{
		$this->createContact=$createContact; 
		$this->keyModified['create_contact'] = 1; 

	}

	/**
	 * The method to get the assignmentRule
	 * @return AssignmentRule An instance of AssignmentRule
	 */
	public function getAssignmentRule()
	{
		return $this->assignmentRule; 

	}

	/**
	 * The method to set the value to assignmentRule
	 * @param AssignmentRule $assignmentRule An instance of AssignmentRule
	 */
	public function setAssignmentRule(AssignmentRule $assignmentRule)
	{
		$this->assignmentRule=$assignmentRule; 
		$this->keyModified['assignment_rule'] = 1; 

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
	 * The method to get the spamControl
	 * @return SpamControll An instance of SpamControll
	 */
	public function getSpamControl()
	{
		return $this->spamControl; 

	}

	/**
	 * The method to set the value to spamControl
	 * @param SpamControll $spamControl An instance of SpamControll
	 */
	public function setSpamControl(SpamControll $spamControl)
	{
		$this->spamControl=$spamControl; 
		$this->keyModified['spam_control'] = 1; 

	}

	/**
	 * The method to get the fields
	 * @return array A array representing the fields
	 */
	public function getFields()
	{
		return $this->fields; 

	}

	/**
	 * The method to set the value to fields
	 * @param array $fields A array
	 */
	public function setFields(array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the formFields
	 * @return array A array representing the formFields
	 */
	public function getFormFields()
	{
		return $this->formFields; 

	}

	/**
	 * The method to set the value to formFields
	 * @param array $formFields A array
	 */
	public function setFormFields(array $formFields)
	{
		$this->formFields=$formFields; 
		$this->keyModified['form_fields'] = 1; 

	}

	/**
	 * The method to get the abtesting
	 * @return array A array representing the abtesting
	 */
	public function getAbtesting()
	{
		return $this->abtesting; 

	}

	/**
	 * The method to set the value to abtesting
	 * @param array $abtesting A array
	 */
	public function setAbtesting(array $abtesting)
	{
		$this->abtesting=$abtesting; 
		$this->keyModified['abtesting'] = 1; 

	}

	/**
	 * The method to get the visitorTracking
	 * @return string A string representing the visitorTracking
	 */
	public function getVisitorTracking()
	{
		return $this->visitorTracking; 

	}

	/**
	 * The method to set the value to visitorTracking
	 * @param string $visitorTracking A string
	 */
	public function setVisitorTracking(string $visitorTracking)
	{
		$this->visitorTracking=$visitorTracking; 
		$this->keyModified['visitor_tracking'] = 1; 

	}

	/**
	 * The method to get the lastSubmittedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getLastSubmittedTime()
	{
		return $this->lastSubmittedTime; 

	}

	/**
	 * The method to set the value to lastSubmittedTime
	 * @param \DateTime $lastSubmittedTime An instance of \DateTime
	 */
	public function setLastSubmittedTime(\DateTime $lastSubmittedTime)
	{
		$this->lastSubmittedTime=$lastSubmittedTime; 
		$this->keyModified['last_submitted_time'] = 1; 

	}

	/**
	 * The method to get the actionOnSubmit
	 * @return string A string representing the actionOnSubmit
	 */
	public function getActionOnSubmit()
	{
		return $this->actionOnSubmit; 

	}

	/**
	 * The method to set the value to actionOnSubmit
	 * @param string $actionOnSubmit A string
	 */
	public function setActionOnSubmit(string $actionOnSubmit)
	{
		$this->actionOnSubmit=$actionOnSubmit; 
		$this->keyModified['action_on_submit'] = 1; 

	}

	/**
	 * The method to get the actionValue
	 * @return string A string representing the actionValue
	 */
	public function getActionValue()
	{
		return $this->actionValue; 

	}

	/**
	 * The method to set the value to actionValue
	 * @param string $actionValue A string
	 */
	public function setActionValue(string $actionValue)
	{
		$this->actionValue=$actionValue; 
		$this->keyModified['action_value'] = 1; 

	}

	/**
	 * The method to get the suggestion
	 * @return Suggestion An instance of Suggestion
	 */
	public function getSuggestion()
	{
		return $this->suggestion; 

	}

	/**
	 * The method to set the value to suggestion
	 * @param Suggestion $suggestion An instance of Suggestion
	 */
	public function setSuggestion(Suggestion $suggestion)
	{
		$this->suggestion=$suggestion; 
		$this->keyModified['suggestion'] = 1; 

	}

	/**
	 * The method to get the embedCode
	 * @return string A string representing the embedCode
	 */
	public function getEmbedCode()
	{
		return $this->embedCode; 

	}

	/**
	 * The method to set the value to embedCode
	 * @param string $embedCode A string
	 */
	public function setEmbedCode(string $embedCode)
	{
		$this->embedCode=$embedCode; 
		$this->keyModified['embed_code'] = 1; 

	}

	/**
	 * The method to get the codeFormats
	 * @return array A array representing the codeFormats
	 */
	public function getCodeFormats()
	{
		return $this->codeFormats; 

	}

	/**
	 * The method to set the value to codeFormats
	 * @param array $codeFormats A array
	 */
	public function setCodeFormats(array $codeFormats)
	{
		$this->codeFormats=$codeFormats; 
		$this->keyModified['code_formats'] = 1; 

	}

	/**
	 * The method to get the sourceCode
	 * @return string A string representing the sourceCode
	 */
	public function getSourceCode()
	{
		return $this->sourceCode; 

	}

	/**
	 * The method to set the value to sourceCode
	 * @param string $sourceCode A string
	 */
	public function setSourceCode(string $sourceCode)
	{
		$this->sourceCode=$sourceCode; 
		$this->keyModified['source_code'] = 1; 

	}

	/**
	 * The method to get the iframeCode
	 * @return string A string representing the iframeCode
	 */
	public function getIframeCode()
	{
		return $this->iframeCode; 

	}

	/**
	 * The method to set the value to iframeCode
	 * @param string $iframeCode A string
	 */
	public function setIframeCode(string $iframeCode)
	{
		$this->iframeCode=$iframeCode; 
		$this->keyModified['iframe_code'] = 1; 

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
