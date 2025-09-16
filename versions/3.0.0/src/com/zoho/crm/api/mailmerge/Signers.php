<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Signers implements Model
{

	private  $recipientName;
	private  $actionType;
	private  $recipient;
	private  $keyModified=array();

	/**
	 * The method to get the recipientName
	 * @return string A string representing the recipientName
	 */
	public function getRecipientName()
	{
		return $this->recipientName; 

	}

	/**
	 * The method to set the value to recipientName
	 * @param string $recipientName A string
	 */
	public function setRecipientName(string $recipientName)
	{
		$this->recipientName=$recipientName; 
		$this->keyModified['recipient_name'] = 1; 

	}

	/**
	 * The method to get the actionType
	 * @return Choice An instance of Choice
	 */
	public function getActionType()
	{
		return $this->actionType; 

	}

	/**
	 * The method to set the value to actionType
	 * @param Choice $actionType An instance of Choice
	 */
	public function setActionType(Choice $actionType)
	{
		$this->actionType=$actionType; 
		$this->keyModified['action_type'] = 1; 

	}

	/**
	 * The method to get the recipient
	 * @return Address An instance of Address
	 */
	public function getRecipient()
	{
		return $this->recipient; 

	}

	/**
	 * The method to set the value to recipient
	 * @param Address $recipient An instance of Address
	 */
	public function setRecipient(Address $recipient)
	{
		$this->recipient=$recipient; 
		$this->keyModified['recipient'] = 1; 

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
