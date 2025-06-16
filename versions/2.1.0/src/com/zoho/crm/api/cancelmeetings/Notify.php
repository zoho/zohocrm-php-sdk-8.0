<?php 
namespace com\zoho\crm\api\cancelmeetings;

use com\zoho\crm\api\util\Model;

class Notify implements Model
{

	private  $sendCancellingMail;
	private  $keyModified=array();

	/**
	 * The method to get the sendCancellingMail
	 * @return bool A bool representing the sendCancellingMail
	 */
	public function getSendCancellingMail()
	{
		return $this->sendCancellingMail; 

	}

	/**
	 * The method to set the value to sendCancellingMail
	 * @param bool $sendCancellingMail A bool
	 */
	public function setSendCancellingMail(bool $sendCancellingMail)
	{
		$this->sendCancellingMail=$sendCancellingMail; 
		$this->keyModified['send_cancelling_mail'] = 1; 

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
