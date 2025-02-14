<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\util\Model;

class SignMailMerge implements Model
{

	private  $mailMergeTemplate;
	private  $signInOrder;
	private  $fileName;
	private  $signers;
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
	 * The method to get the signInOrder
	 * @return bool A bool representing the signInOrder
	 */
	public function getSignInOrder()
	{
		return $this->signInOrder; 

	}

	/**
	 * The method to set the value to signInOrder
	 * @param bool $signInOrder A bool
	 */
	public function setSignInOrder(bool $signInOrder)
	{
		$this->signInOrder=$signInOrder; 
		$this->keyModified['sign_in_order'] = 1; 

	}

	/**
	 * The method to get the fileName
	 * @return string A string representing the fileName
	 */
	public function getFileName()
	{
		return $this->fileName; 

	}

	/**
	 * The method to set the value to fileName
	 * @param string $fileName A string
	 */
	public function setFileName(string $fileName)
	{
		$this->fileName=$fileName; 
		$this->keyModified['file_name'] = 1; 

	}

	/**
	 * The method to get the signers
	 * @return array A array representing the signers
	 */
	public function getSigners()
	{
		return $this->signers; 

	}

	/**
	 * The method to set the value to signers
	 * @param array $signers A array
	 */
	public function setSigners(array $signers)
	{
		$this->signers=$signers; 
		$this->keyModified['signers'] = 1; 

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
