<?php 
namespace com\zoho\crm\api\sendmail;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Data implements Model
{

	private  $from;
	private  $to;
	private  $cc;
	private  $bcc;
	private  $replyTo;
	private  $orgEmail;
	private  $scheduledTime;
	private  $mailFormat;
	private  $consentEmail;
	private  $content;
	private  $subject;
	private  $inReplyTo;
	private  $template;
	private  $inventoryDetails;
	private  $dataSubjectRequest;
	private  $attachments;
	private  $linkedRecord;
	private  $keyModified=array();

	/**
	 * The method to get the from
	 * @return From An instance of From
	 */
	public function getFrom()
	{
		return $this->from; 

	}

	/**
	 * The method to set the value to from
	 * @param From $from An instance of From
	 */
	public function setFrom(From $from)
	{
		$this->from=$from; 
		$this->keyModified['from'] = 1; 

	}

	/**
	 * The method to get the to
	 * @return array A array representing the to
	 */
	public function getTo()
	{
		return $this->to; 

	}

	/**
	 * The method to set the value to to
	 * @param array $to A array
	 */
	public function setTo(array $to)
	{
		$this->to=$to; 
		$this->keyModified['to'] = 1; 

	}

	/**
	 * The method to get the cc
	 * @return array A array representing the cc
	 */
	public function getCc()
	{
		return $this->cc; 

	}

	/**
	 * The method to set the value to cc
	 * @param array $cc A array
	 */
	public function setCc(array $cc)
	{
		$this->cc=$cc; 
		$this->keyModified['cc'] = 1; 

	}

	/**
	 * The method to get the bcc
	 * @return array A array representing the bcc
	 */
	public function getBcc()
	{
		return $this->bcc; 

	}

	/**
	 * The method to set the value to bcc
	 * @param array $bcc A array
	 */
	public function setBcc(array $bcc)
	{
		$this->bcc=$bcc; 
		$this->keyModified['bcc'] = 1; 

	}

	/**
	 * The method to get the replyTo
	 * @return To An instance of To
	 */
	public function getReplyTo()
	{
		return $this->replyTo; 

	}

	/**
	 * The method to set the value to replyTo
	 * @param To $replyTo An instance of To
	 */
	public function setReplyTo(To $replyTo)
	{
		$this->replyTo=$replyTo; 
		$this->keyModified['reply_to'] = 1; 

	}

	/**
	 * The method to get the orgEmail
	 * @return bool A bool representing the orgEmail
	 */
	public function getOrgEmail()
	{
		return $this->orgEmail; 

	}

	/**
	 * The method to set the value to orgEmail
	 * @param bool $orgEmail A bool
	 */
	public function setOrgEmail(bool $orgEmail)
	{
		$this->orgEmail=$orgEmail; 
		$this->keyModified['org_email'] = 1; 

	}

	/**
	 * The method to get the scheduledTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getScheduledTime()
	{
		return $this->scheduledTime; 

	}

	/**
	 * The method to set the value to scheduledTime
	 * @param \DateTime $scheduledTime An instance of \DateTime
	 */
	public function setScheduledTime(\DateTime $scheduledTime)
	{
		$this->scheduledTime=$scheduledTime; 
		$this->keyModified['scheduled_time'] = 1; 

	}

	/**
	 * The method to get the mailFormat
	 * @return Choice An instance of Choice
	 */
	public function getMailFormat()
	{
		return $this->mailFormat; 

	}

	/**
	 * The method to set the value to mailFormat
	 * @param Choice $mailFormat An instance of Choice
	 */
	public function setMailFormat(Choice $mailFormat)
	{
		$this->mailFormat=$mailFormat; 
		$this->keyModified['mail_format'] = 1; 

	}

	/**
	 * The method to get the consentEmail
	 * @return bool A bool representing the consentEmail
	 */
	public function getConsentEmail()
	{
		return $this->consentEmail; 

	}

	/**
	 * The method to set the value to consentEmail
	 * @param bool $consentEmail A bool
	 */
	public function setConsentEmail(bool $consentEmail)
	{
		$this->consentEmail=$consentEmail; 
		$this->keyModified['consent_email'] = 1; 

	}

	/**
	 * The method to get the content
	 * @return string A string representing the content
	 */
	public function getContent()
	{
		return $this->content; 

	}

	/**
	 * The method to set the value to content
	 * @param string $content A string
	 */
	public function setContent(string $content)
	{
		$this->content=$content; 
		$this->keyModified['content'] = 1; 

	}

	/**
	 * The method to get the subject
	 * @return string A string representing the subject
	 */
	public function getSubject()
	{
		return $this->subject; 

	}

	/**
	 * The method to set the value to subject
	 * @param string $subject A string
	 */
	public function setSubject(string $subject)
	{
		$this->subject=$subject; 
		$this->keyModified['subject'] = 1; 

	}

	/**
	 * The method to get the inReplyTo
	 * @return InReplyTo An instance of InReplyTo
	 */
	public function getInReplyTo()
	{
		return $this->inReplyTo; 

	}

	/**
	 * The method to set the value to inReplyTo
	 * @param InReplyTo $inReplyTo An instance of InReplyTo
	 */
	public function setInReplyTo(InReplyTo $inReplyTo)
	{
		$this->inReplyTo=$inReplyTo; 
		$this->keyModified['in_reply_to'] = 1; 

	}

	/**
	 * The method to get the template
	 * @return Template An instance of Template
	 */
	public function getTemplate()
	{
		return $this->template; 

	}

	/**
	 * The method to set the value to template
	 * @param Template $template An instance of Template
	 */
	public function setTemplate(Template $template)
	{
		$this->template=$template; 
		$this->keyModified['template'] = 1; 

	}

	/**
	 * The method to get the inventoryDetails
	 * @return InventoryDetails An instance of InventoryDetails
	 */
	public function getInventoryDetails()
	{
		return $this->inventoryDetails; 

	}

	/**
	 * The method to set the value to inventoryDetails
	 * @param InventoryDetails $inventoryDetails An instance of InventoryDetails
	 */
	public function setInventoryDetails(InventoryDetails $inventoryDetails)
	{
		$this->inventoryDetails=$inventoryDetails; 
		$this->keyModified['inventory_details'] = 1; 

	}

	/**
	 * The method to get the dataSubjectRequest
	 * @return DataSubjectRequest An instance of DataSubjectRequest
	 */
	public function getDataSubjectRequest()
	{
		return $this->dataSubjectRequest; 

	}

	/**
	 * The method to set the value to dataSubjectRequest
	 * @param DataSubjectRequest $dataSubjectRequest An instance of DataSubjectRequest
	 */
	public function setDataSubjectRequest(DataSubjectRequest $dataSubjectRequest)
	{
		$this->dataSubjectRequest=$dataSubjectRequest; 
		$this->keyModified['data_subject_request'] = 1; 

	}

	/**
	 * The method to get the attachments
	 * @return array A array representing the attachments
	 */
	public function getAttachments()
	{
		return $this->attachments; 

	}

	/**
	 * The method to set the value to attachments
	 * @param array $attachments A array
	 */
	public function setAttachments(array $attachments)
	{
		$this->attachments=$attachments; 
		$this->keyModified['attachments'] = 1; 

	}

	/**
	 * The method to get the linkedRecord
	 * @return LinkedRecord An instance of LinkedRecord
	 */
	public function getLinkedRecord()
	{
		return $this->linkedRecord; 

	}

	/**
	 * The method to set the value to linkedRecord
	 * @param LinkedRecord $linkedRecord An instance of LinkedRecord
	 */
	public function setLinkedRecord(LinkedRecord $linkedRecord)
	{
		$this->linkedRecord=$linkedRecord; 
		$this->keyModified['linked_record'] = 1; 

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
