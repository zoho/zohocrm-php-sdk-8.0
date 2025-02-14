<?php 
namespace com\zoho\crm\api\emailrelatedrecords;

use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Email implements Model
{

	private  $attachments;
	private  $threadId;
	private  $cc;
	private  $summary;
	private  $owner;
	private  $read;
	private  $content;
	private  $sent;
	private  $subject;
	private  $activityInfo;
	private  $intent;
	private  $sentimentInfo;
	private  $messageId;
	private  $source;
	private  $linkedRecord;
	private  $sentTime;
	private  $emotion;
	private  $from;
	private  $to;
	private  $time;
	private  $status;
	private  $hasAttachment;
	private  $hasThreadAttachment;
	private  $editable;
	private  $mailFormat;
	private  $replyTo;
	private  $keyModified=array();

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
	 * The method to get the threadId
	 * @return string A string representing the threadId
	 */
	public function getThreadId()
	{
		return $this->threadId; 

	}

	/**
	 * The method to set the value to threadId
	 * @param string $threadId A string
	 */
	public function setThreadId(string $threadId)
	{
		$this->threadId=$threadId; 
		$this->keyModified['thread_id'] = 1; 

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
	 * The method to get the owner
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getOwner()
	{
		return $this->owner; 

	}

	/**
	 * The method to set the value to owner
	 * @param MinifiedUser $owner An instance of MinifiedUser
	 */
	public function setOwner(MinifiedUser $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['owner'] = 1; 

	}

	/**
	 * The method to get the read
	 * @return bool A bool representing the read
	 */
	public function getRead()
	{
		return $this->read; 

	}

	/**
	 * The method to set the value to read
	 * @param bool $read A bool
	 */
	public function setRead(bool $read)
	{
		$this->read=$read; 
		$this->keyModified['read'] = 1; 

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
	 * The method to get the sent
	 * @return bool A bool representing the sent
	 */
	public function getSent()
	{
		return $this->sent; 

	}

	/**
	 * The method to set the value to sent
	 * @param bool $sent A bool
	 */
	public function setSent(bool $sent)
	{
		$this->sent=$sent; 
		$this->keyModified['sent'] = 1; 

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
	 * The method to get the activityInfo
	 */
	public function getActivityInfo()
	{
		return $this->activityInfo; 

	}

	/**
	 * The method to set the value to activityInfo
	 * @param 
	 */
	public function setActivityInfo( $activityInfo)
	{
		$this->activityInfo=$activityInfo; 
		$this->keyModified['activity_info'] = 1; 

	}

	/**
	 * The method to get the intent
	 * @return Choice An instance of Choice
	 */
	public function getIntent()
	{
		return $this->intent; 

	}

	/**
	 * The method to set the value to intent
	 * @param Choice $intent An instance of Choice
	 */
	public function setIntent(Choice $intent)
	{
		$this->intent=$intent; 
		$this->keyModified['intent'] = 1; 

	}

	/**
	 * The method to get the sentimentInfo
	 * @return Choice An instance of Choice
	 */
	public function getSentimentInfo()
	{
		return $this->sentimentInfo; 

	}

	/**
	 * The method to set the value to sentimentInfo
	 * @param Choice $sentimentInfo An instance of Choice
	 */
	public function setSentimentInfo(Choice $sentimentInfo)
	{
		$this->sentimentInfo=$sentimentInfo; 
		$this->keyModified['sentiment_info'] = 1; 

	}

	/**
	 * The method to get the messageId
	 * @return string A string representing the messageId
	 */
	public function getMessageId()
	{
		return $this->messageId; 

	}

	/**
	 * The method to set the value to messageId
	 * @param string $messageId A string
	 */
	public function setMessageId(string $messageId)
	{
		$this->messageId=$messageId; 
		$this->keyModified['message_id'] = 1; 

	}

	/**
	 * The method to get the source
	 * @return string A string representing the source
	 */
	public function getSource()
	{
		return $this->source; 

	}

	/**
	 * The method to set the value to source
	 * @param string $source A string
	 */
	public function setSource(string $source)
	{
		$this->source=$source; 
		$this->keyModified['source'] = 1; 

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
	 * The method to get the sentTime
	 * @return string A string representing the sentTime
	 */
	public function getSentTime()
	{
		return $this->sentTime; 

	}

	/**
	 * The method to set the value to sentTime
	 * @param string $sentTime A string
	 */
	public function setSentTime(string $sentTime)
	{
		$this->sentTime=$sentTime; 
		$this->keyModified['sent_time'] = 1; 

	}

	/**
	 * The method to get the emotion
	 * @return string A string representing the emotion
	 */
	public function getEmotion()
	{
		return $this->emotion; 

	}

	/**
	 * The method to set the value to emotion
	 * @param string $emotion A string
	 */
	public function setEmotion(string $emotion)
	{
		$this->emotion=$emotion; 
		$this->keyModified['emotion'] = 1; 

	}

	/**
	 * The method to get the from
	 * @return UserDetails An instance of UserDetails
	 */
	public function getFrom()
	{
		return $this->from; 

	}

	/**
	 * The method to set the value to from
	 * @param UserDetails $from An instance of UserDetails
	 */
	public function setFrom(UserDetails $from)
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
	 * The method to get the time
	 * @return \DateTime An instance of \DateTime
	 */
	public function getTime()
	{
		return $this->time; 

	}

	/**
	 * The method to set the value to time
	 * @param \DateTime $time An instance of \DateTime
	 */
	public function setTime(\DateTime $time)
	{
		$this->time=$time; 
		$this->keyModified['time'] = 1; 

	}

	/**
	 * The method to get the status
	 * @return array A array representing the status
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param array $status A array
	 */
	public function setStatus(array $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

	/**
	 * The method to get the hasAttachment
	 * @return bool A bool representing the hasAttachment
	 */
	public function getHasAttachment()
	{
		return $this->hasAttachment; 

	}

	/**
	 * The method to set the value to hasAttachment
	 * @param bool $hasAttachment A bool
	 */
	public function setHasAttachment(bool $hasAttachment)
	{
		$this->hasAttachment=$hasAttachment; 
		$this->keyModified['has_attachment'] = 1; 

	}

	/**
	 * The method to get the hasThreadAttachment
	 * @return bool A bool representing the hasThreadAttachment
	 */
	public function getHasThreadAttachment()
	{
		return $this->hasThreadAttachment; 

	}

	/**
	 * The method to set the value to hasThreadAttachment
	 * @param bool $hasThreadAttachment A bool
	 */
	public function setHasThreadAttachment(bool $hasThreadAttachment)
	{
		$this->hasThreadAttachment=$hasThreadAttachment; 
		$this->keyModified['has_thread_attachment'] = 1; 

	}

	/**
	 * The method to get the editable
	 * @return bool A bool representing the editable
	 */
	public function getEditable()
	{
		return $this->editable; 

	}

	/**
	 * The method to set the value to editable
	 * @param bool $editable A bool
	 */
	public function setEditable(bool $editable)
	{
		$this->editable=$editable; 
		$this->keyModified['editable'] = 1; 

	}

	/**
	 * The method to get the mailFormat
	 * @return string A string representing the mailFormat
	 */
	public function getMailFormat()
	{
		return $this->mailFormat; 

	}

	/**
	 * The method to set the value to mailFormat
	 * @param string $mailFormat A string
	 */
	public function setMailFormat(string $mailFormat)
	{
		$this->mailFormat=$mailFormat; 
		$this->keyModified['mail_format'] = 1; 

	}

	/**
	 * The method to get the replyTo
	 * @return UserDetails An instance of UserDetails
	 */
	public function getReplyTo()
	{
		return $this->replyTo; 

	}

	/**
	 * The method to set the value to replyTo
	 * @param UserDetails $replyTo An instance of UserDetails
	 */
	public function setReplyTo(UserDetails $replyTo)
	{
		$this->replyTo=$replyTo; 
		$this->keyModified['reply_to'] = 1; 

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
