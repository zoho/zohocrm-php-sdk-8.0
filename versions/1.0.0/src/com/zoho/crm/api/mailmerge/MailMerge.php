<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\util\Model;

class MailMerge implements Model
{

	private  $mailMergeTemplate;
	private  $fromAddress;
	private  $toAddress;
	private  $ccEmail;
	private  $bccEmail;
	private  $subject;
	private  $message;
	private  $type;
	private  $attachmentName;
	private  $keyModified=array();

	/**
	 * The method to get the mailMergeTemplate
	 * @return MailMergeTemplate An instance of MailMergeTemplate
	 */
	public function getMailMergeTemplate()
	{
		return $this->mailMergeTemplate; 

	}

	/**
	 * The method to set the value to mailMergeTemplate
	 * @param MailMergeTemplate $mailMergeTemplate An instance of MailMergeTemplate
	 */
	public function setMailMergeTemplate(MailMergeTemplate $mailMergeTemplate)
	{
		$this->mailMergeTemplate=$mailMergeTemplate; 
		$this->keyModified['mail_merge_template'] = 1; 

	}

	/**
	 * The method to get the fromAddress
	 * @return Address An instance of Address
	 */
	public function getFromAddress()
	{
		return $this->fromAddress; 

	}

	/**
	 * The method to set the value to fromAddress
	 * @param Address $fromAddress An instance of Address
	 */
	public function setFromAddress(Address $fromAddress)
	{
		$this->fromAddress=$fromAddress; 
		$this->keyModified['from_address'] = 1; 

	}

	/**
	 * The method to get the toAddress
	 * @return array A array representing the toAddress
	 */
	public function getToAddress()
	{
		return $this->toAddress; 

	}

	/**
	 * The method to set the value to toAddress
	 * @param array $toAddress A array
	 */
	public function setToAddress(array $toAddress)
	{
		$this->toAddress=$toAddress; 
		$this->keyModified['to_address'] = 1; 

	}

	/**
	 * The method to get the ccEmail
	 * @return array A array representing the ccEmail
	 */
	public function getCcEmail()
	{
		return $this->ccEmail; 

	}

	/**
	 * The method to set the value to ccEmail
	 * @param array $ccEmail A array
	 */
	public function setCcEmail(array $ccEmail)
	{
		$this->ccEmail=$ccEmail; 
		$this->keyModified['cc_email'] = 1; 

	}

	/**
	 * The method to get the bccEmail
	 * @return array A array representing the bccEmail
	 */
	public function getBccEmail()
	{
		return $this->bccEmail; 

	}

	/**
	 * The method to set the value to bccEmail
	 * @param array $bccEmail A array
	 */
	public function setBccEmail(array $bccEmail)
	{
		$this->bccEmail=$bccEmail; 
		$this->keyModified['bcc_email'] = 1; 

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
	 * The method to get the message
	 * @return string A string representing the message
	 */
	public function getMessage()
	{
		return $this->message; 

	}

	/**
	 * The method to set the value to message
	 * @param string $message A string
	 */
	public function setMessage(string $message)
	{
		$this->message=$message; 
		$this->keyModified['message'] = 1; 

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
	 * The method to get the attachmentName
	 * @return string A string representing the attachmentName
	 */
	public function getAttachmentName()
	{
		return $this->attachmentName; 

	}

	/**
	 * The method to set the value to attachmentName
	 * @param string $attachmentName A string
	 */
	public function setAttachmentName(string $attachmentName)
	{
		$this->attachmentName=$attachmentName; 
		$this->keyModified['attachment_name'] = 1; 

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
