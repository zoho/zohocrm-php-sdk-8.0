<?php 
namespace com\zoho\crm\api\emailcomposemeta;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class FeaturesAvailable implements Model
{

	private  $zsurveyEnabled;
	private  $inlineComposeWindow;
	private  $scheduleMail;
	private  $emailCloudPicker;
	private  $formIntegrationEnabled;
	private  $isprivacyenabled;
	private  $autoSuggestion;
	private  $unsubscribeLink;
	private  $bestTimeToContact;
	private  $attachTeamdrive;
	private  $islivedeskenabled;
	private  $subjectLineSuggestion;
	private  $emailPreference;
	private  $attachment;
	private  $mandateunsublink;
	private  $oldComposeRevert;
	private  $keyModified=array();

	/**
	 * The method to get the zsurveyEnabled
	 * @return Choice An instance of Choice
	 */
	public function getZsurveyEnabled()
	{
		return $this->zsurveyEnabled; 

	}

	/**
	 * The method to set the value to zsurveyEnabled
	 * @param Choice $zsurveyEnabled An instance of Choice
	 */
	public function setZsurveyEnabled(Choice $zsurveyEnabled)
	{
		$this->zsurveyEnabled=$zsurveyEnabled; 
		$this->keyModified['zsurvey_enabled'] = 1; 

	}

	/**
	 * The method to get the inlineComposeWindow
	 * @return Choice An instance of Choice
	 */
	public function getInlineComposeWindow()
	{
		return $this->inlineComposeWindow; 

	}

	/**
	 * The method to set the value to inlineComposeWindow
	 * @param Choice $inlineComposeWindow An instance of Choice
	 */
	public function setInlineComposeWindow(Choice $inlineComposeWindow)
	{
		$this->inlineComposeWindow=$inlineComposeWindow; 
		$this->keyModified['inline_compose_window'] = 1; 

	}

	/**
	 * The method to get the scheduleMail
	 * @return Choice An instance of Choice
	 */
	public function getScheduleMail()
	{
		return $this->scheduleMail; 

	}

	/**
	 * The method to set the value to scheduleMail
	 * @param Choice $scheduleMail An instance of Choice
	 */
	public function setScheduleMail(Choice $scheduleMail)
	{
		$this->scheduleMail=$scheduleMail; 
		$this->keyModified['Schedule_Mail'] = 1; 

	}

	/**
	 * The method to get the emailCloudPicker
	 * @return Choice An instance of Choice
	 */
	public function getEmailCloudPicker()
	{
		return $this->emailCloudPicker; 

	}

	/**
	 * The method to set the value to emailCloudPicker
	 * @param Choice $emailCloudPicker An instance of Choice
	 */
	public function setEmailCloudPicker(Choice $emailCloudPicker)
	{
		$this->emailCloudPicker=$emailCloudPicker; 
		$this->keyModified['EMAIL_CLOUD_PICKER'] = 1; 

	}

	/**
	 * The method to get the formIntegrationEnabled
	 * @return Choice An instance of Choice
	 */
	public function getFormIntegrationEnabled()
	{
		return $this->formIntegrationEnabled; 

	}

	/**
	 * The method to set the value to formIntegrationEnabled
	 * @param Choice $formIntegrationEnabled An instance of Choice
	 */
	public function setFormIntegrationEnabled(Choice $formIntegrationEnabled)
	{
		$this->formIntegrationEnabled=$formIntegrationEnabled; 
		$this->keyModified['form_integration_enabled'] = 1; 

	}

	/**
	 * The method to get the isprivacyenabled
	 * @return Choice An instance of Choice
	 */
	public function getIsprivacyenabled()
	{
		return $this->isprivacyenabled; 

	}

	/**
	 * The method to set the value to isprivacyenabled
	 * @param Choice $isprivacyenabled An instance of Choice
	 */
	public function setIsprivacyenabled(Choice $isprivacyenabled)
	{
		$this->isprivacyenabled=$isprivacyenabled; 
		$this->keyModified['isPrivacyEnabled'] = 1; 

	}

	/**
	 * The method to get the autoSuggestion
	 * @return Choice An instance of Choice
	 */
	public function getAutoSuggestion()
	{
		return $this->autoSuggestion; 

	}

	/**
	 * The method to set the value to autoSuggestion
	 * @param Choice $autoSuggestion An instance of Choice
	 */
	public function setAutoSuggestion(Choice $autoSuggestion)
	{
		$this->autoSuggestion=$autoSuggestion; 
		$this->keyModified['auto_suggestion'] = 1; 

	}

	/**
	 * The method to get the unsubscribeLink
	 * @return Choice An instance of Choice
	 */
	public function getUnsubscribeLink()
	{
		return $this->unsubscribeLink; 

	}

	/**
	 * The method to set the value to unsubscribeLink
	 * @param Choice $unsubscribeLink An instance of Choice
	 */
	public function setUnsubscribeLink(Choice $unsubscribeLink)
	{
		$this->unsubscribeLink=$unsubscribeLink; 
		$this->keyModified['UNSUBSCRIBE_LINK'] = 1; 

	}

	/**
	 * The method to get the bestTimeToContact
	 * @return Choice An instance of Choice
	 */
	public function getBestTimeToContact()
	{
		return $this->bestTimeToContact; 

	}

	/**
	 * The method to set the value to bestTimeToContact
	 * @param Choice $bestTimeToContact An instance of Choice
	 */
	public function setBestTimeToContact(Choice $bestTimeToContact)
	{
		$this->bestTimeToContact=$bestTimeToContact; 
		$this->keyModified['best_time_to_contact'] = 1; 

	}

	/**
	 * The method to get the attachTeamdrive
	 * @return Choice An instance of Choice
	 */
	public function getAttachTeamdrive()
	{
		return $this->attachTeamdrive; 

	}

	/**
	 * The method to set the value to attachTeamdrive
	 * @param Choice $attachTeamdrive An instance of Choice
	 */
	public function setAttachTeamdrive(Choice $attachTeamdrive)
	{
		$this->attachTeamdrive=$attachTeamdrive; 
		$this->keyModified['attach_teamdrive'] = 1; 

	}

	/**
	 * The method to get the islivedeskenabled
	 * @return Choice An instance of Choice
	 */
	public function getIslivedeskenabled()
	{
		return $this->islivedeskenabled; 

	}

	/**
	 * The method to set the value to islivedeskenabled
	 * @param Choice $islivedeskenabled An instance of Choice
	 */
	public function setIslivedeskenabled(Choice $islivedeskenabled)
	{
		$this->islivedeskenabled=$islivedeskenabled; 
		$this->keyModified['isLiveDeskEnabled'] = 1; 

	}

	/**
	 * The method to get the subjectLineSuggestion
	 * @return bool A bool representing the subjectLineSuggestion
	 */
	public function getSubjectLineSuggestion()
	{
		return $this->subjectLineSuggestion; 

	}

	/**
	 * The method to set the value to subjectLineSuggestion
	 * @param bool $subjectLineSuggestion A bool
	 */
	public function setSubjectLineSuggestion(bool $subjectLineSuggestion)
	{
		$this->subjectLineSuggestion=$subjectLineSuggestion; 
		$this->keyModified['subject_line_suggestion'] = 1; 

	}

	/**
	 * The method to get the emailPreference
	 * @return bool A bool representing the emailPreference
	 */
	public function getEmailPreference()
	{
		return $this->emailPreference; 

	}

	/**
	 * The method to set the value to emailPreference
	 * @param bool $emailPreference A bool
	 */
	public function setEmailPreference(bool $emailPreference)
	{
		$this->emailPreference=$emailPreference; 
		$this->keyModified['EMAIL_PREFERENCE'] = 1; 

	}

	/**
	 * The method to get the attachment
	 * @return bool A bool representing the attachment
	 */
	public function getAttachment()
	{
		return $this->attachment; 

	}

	/**
	 * The method to set the value to attachment
	 * @param bool $attachment A bool
	 */
	public function setAttachment(bool $attachment)
	{
		$this->attachment=$attachment; 
		$this->keyModified['ATTACHMENT'] = 1; 

	}

	/**
	 * The method to get the mandateunsublink
	 * @return bool A bool representing the mandateunsublink
	 */
	public function getMandateunsublink()
	{
		return $this->mandateunsublink; 

	}

	/**
	 * The method to set the value to mandateunsublink
	 * @param bool $mandateunsublink A bool
	 */
	public function setMandateunsublink(bool $mandateunsublink)
	{
		$this->mandateunsublink=$mandateunsublink; 
		$this->keyModified['mandateUnsubLink'] = 1; 

	}

	/**
	 * The method to get the oldComposeRevert
	 * @return bool A bool representing the oldComposeRevert
	 */
	public function getOldComposeRevert()
	{
		return $this->oldComposeRevert; 

	}

	/**
	 * The method to set the value to oldComposeRevert
	 * @param bool $oldComposeRevert A bool
	 */
	public function setOldComposeRevert(bool $oldComposeRevert)
	{
		$this->oldComposeRevert=$oldComposeRevert; 
		$this->keyModified['OLD_COMPOSE_REVERT'] = 1; 

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
