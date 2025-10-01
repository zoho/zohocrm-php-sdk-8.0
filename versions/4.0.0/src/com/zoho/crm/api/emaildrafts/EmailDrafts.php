<?php 
namespace com\zoho\crm\api\emaildrafts;

use com\zoho\crm\api\util\Model;

class EmailDrafts implements Model
{

	private  $id;
	private  $modifiedTime;
	private  $createdTime;
	private  $from;
	private  $to;
	private  $replyTo;
	private  $cc;
	private  $bcc;
	private  $template;
	private  $inventoryDetails;
	private  $attachments;
	private  $scheduleDetails;
	private  $richText;
	private  $emailOptOut;
	private  $subject;
	private  $content;
	private  $summary;
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
	 * The method to get the from
	 * @return string A string representing the from
	 */
	public function getFrom()
	{
		return $this->from; 

	}

	/**
	 * The method to set the value to from
	 * @param string $from A string
	 */
	public function setFrom(string $from)
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
	 * The method to get the replyTo
	 * @return string A string representing the replyTo
	 */
	public function getReplyTo()
	{
		return $this->replyTo; 

	}

	/**
	 * The method to set the value to replyTo
	 * @param string $replyTo A string
	 */
	public function setReplyTo(string $replyTo)
	{
		$this->replyTo=$replyTo; 
		$this->keyModified['reply_to'] = 1; 

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
	 * The method to get the scheduleDetails
	 * @return ScheduleDetails An instance of ScheduleDetails
	 */
	public function getScheduleDetails()
	{
		return $this->scheduleDetails; 

	}

	/**
	 * The method to set the value to scheduleDetails
	 * @param ScheduleDetails $scheduleDetails An instance of ScheduleDetails
	 */
	public function setScheduleDetails(ScheduleDetails $scheduleDetails)
	{
		$this->scheduleDetails=$scheduleDetails; 
		$this->keyModified['schedule_details'] = 1; 

	}

	/**
	 * The method to get the richText
	 * @return bool A bool representing the richText
	 */
	public function getRichText()
	{
		return $this->richText; 

	}

	/**
	 * The method to set the value to richText
	 * @param bool $richText A bool
	 */
	public function setRichText(bool $richText)
	{
		$this->richText=$richText; 
		$this->keyModified['rich_text'] = 1; 

	}

	/**
	 * The method to get the emailOptOut
	 * @return bool A bool representing the emailOptOut
	 */
	public function getEmailOptOut()
	{
		return $this->emailOptOut; 

	}

	/**
	 * The method to set the value to emailOptOut
	 * @param bool $emailOptOut A bool
	 */
	public function setEmailOptOut(bool $emailOptOut)
	{
		$this->emailOptOut=$emailOptOut; 
		$this->keyModified['email_opt_out'] = 1; 

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
	 * The method to get the summary
	 * @return string A string representing the summary
	 */
	public function getSummary()
	{
		return $this->summary; 

	}

	/**
	 * The method to set the value to summary
	 * @param string $summary A string
	 */
	public function setSummary(string $summary)
	{
		$this->summary=$summary; 
		$this->keyModified['summary'] = 1; 

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
