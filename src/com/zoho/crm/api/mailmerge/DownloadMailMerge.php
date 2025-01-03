<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class DownloadMailMerge implements Model
{

	private  $mailMergeTemplate;
	private  $outputFormat;
	private  $fileName;
	private  $password;
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
	 * The method to get the outputFormat
	 * @return Choice An instance of Choice
	 */
	public function getOutputFormat()
	{
		return $this->outputFormat; 

	}

	/**
	 * The method to set the value to outputFormat
	 * @param Choice $outputFormat An instance of Choice
	 */
	public function setOutputFormat(Choice $outputFormat)
	{
		$this->outputFormat=$outputFormat; 
		$this->keyModified['output_format'] = 1; 

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
	 * The method to get the password
	 * @return string A string representing the password
	 */
	public function getPassword()
	{
		return $this->password; 

	}

	/**
	 * The method to set the value to password
	 * @param string $password A string
	 */
	public function setPassword(string $password)
	{
		$this->password=$password; 
		$this->keyModified['password'] = 1; 

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
