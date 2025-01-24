<?php 
namespace com\zoho\crm\api\associateemail;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class AssociateEmail implements Model
{

	private  $from;
	private  $to;
	private  $cc;
	private  $bcc;
	private  $attachments;
	private  $content;
	private  $mailFormat;
	private  $subject;
	private  $originalMessageId;
	private  $sent;
	private  $dateTime;
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
	 * The method to get the originalMessageId
	 * @return string A string representing the originalMessageId
	 */
	public function getOriginalMessageId()
	{
		return $this->originalMessageId; 

	}

	/**
	 * The method to set the value to originalMessageId
	 * @param string $originalMessageId A string
	 */
	public function setOriginalMessageId(string $originalMessageId)
	{
		$this->originalMessageId=$originalMessageId; 
		$this->keyModified['original_message_id'] = 1; 

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
	 * The method to get the dateTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getDateTime()
	{
		return $this->dateTime; 

	}

	/**
	 * The method to set the value to dateTime
	 * @param \DateTime $dateTime An instance of \DateTime
	 */
	public function setDateTime(\DateTime $dateTime)
	{
		$this->dateTime=$dateTime; 
		$this->keyModified['date_time'] = 1; 

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
