<?php 
namespace com\zoho\crm\api\sendmail;

use com\zoho\crm\api\util\Model;

class InReplyTo implements Model
{

	private  $messageId;
	private  $owner;
	private  $keyModified=array();

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
	 * The method to get the owner
	 * @return Owner An instance of Owner
	 */
	public function getOwner()
	{
		return $this->owner; 

	}

	/**
	 * The method to set the value to owner
	 * @param Owner $owner An instance of Owner
	 */
	public function setOwner(Owner $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['owner'] = 1; 

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
