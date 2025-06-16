<?php 
namespace com\zoho\crm\api\usertypeusers;

use com\zoho\crm\api\util\Model;

class Users implements Model
{

	private  $personalityId;
	private  $confirm;
	private  $statusReasonS;
	private  $invitedTime;
	private  $module;
	private  $name;
	private  $active;
	private  $email;
	private  $keyModified=array();

	/**
	 * The method to get the personalityId
	 * @return string A string representing the personalityId
	 */
	public function getPersonalityId()
	{
		return $this->personalityId; 

	}

	/**
	 * The method to set the value to personalityId
	 * @param string $personalityId A string
	 */
	public function setPersonalityId(string $personalityId)
	{
		$this->personalityId=$personalityId; 
		$this->keyModified['personality_id'] = 1; 

	}

	/**
	 * The method to get the confirm
	 * @return bool A bool representing the confirm
	 */
	public function getConfirm()
	{
		return $this->confirm; 

	}

	/**
	 * The method to set the value to confirm
	 * @param bool $confirm A bool
	 */
	public function setConfirm(bool $confirm)
	{
		$this->confirm=$confirm; 
		$this->keyModified['confirm'] = 1; 

	}

	/**
	 * The method to get the statusReasonS
	 * @return string A string representing the statusReasonS
	 */
	public function getStatusReasonS()
	{
		return $this->statusReasonS; 

	}

	/**
	 * The method to set the value to statusReasonS
	 * @param string $statusReasonS A string
	 */
	public function setStatusReasonS(string $statusReasonS)
	{
		$this->statusReasonS=$statusReasonS; 
		$this->keyModified['status_reason__s'] = 1; 

	}

	/**
	 * The method to get the invitedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getInvitedTime()
	{
		return $this->invitedTime; 

	}

	/**
	 * The method to set the value to invitedTime
	 * @param \DateTime $invitedTime An instance of \DateTime
	 */
	public function setInvitedTime(\DateTime $invitedTime)
	{
		$this->invitedTime=$invitedTime; 
		$this->keyModified['invited_time'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return string A string representing the module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param string $module A string
	 */
	public function setModule(string $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the active
	 * @return bool A bool representing the active
	 */
	public function getActive()
	{
		return $this->active; 

	}

	/**
	 * The method to set the value to active
	 * @param bool $active A bool
	 */
	public function setActive(bool $active)
	{
		$this->active=$active; 
		$this->keyModified['active'] = 1; 

	}

	/**
	 * The method to get the email
	 * @return string A string representing the email
	 */
	public function getEmail()
	{
		return $this->email; 

	}

	/**
	 * The method to set the value to email
	 * @param string $email A string
	 */
	public function setEmail(string $email)
	{
		$this->email=$email; 
		$this->keyModified['email'] = 1; 

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
