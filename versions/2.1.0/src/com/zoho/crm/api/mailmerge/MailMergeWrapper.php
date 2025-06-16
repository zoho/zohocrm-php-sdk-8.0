<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\util\Model;

class MailMergeWrapper implements Model
{

	private  $sendMailMerge;
	private  $keyModified=array();

	/**
	 * The method to get the sendMailMerge
	 * @return array A array representing the sendMailMerge
	 */
	public function getSendMailMerge()
	{
		return $this->sendMailMerge; 

	}

	/**
	 * The method to set the value to sendMailMerge
	 * @param array $sendMailMerge A array
	 */
	public function setSendMailMerge(array $sendMailMerge)
	{
		$this->sendMailMerge=$sendMailMerge; 
		$this->keyModified['send_mail_merge'] = 1; 

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
