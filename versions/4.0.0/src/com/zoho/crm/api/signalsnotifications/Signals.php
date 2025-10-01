<?php 
namespace com\zoho\crm\api\signalsnotifications;

use com\zoho\crm\api\util\Model;

class Signals implements Model
{

	private  $signalNamespace;
	private  $email;
	private  $subject;
	private  $message;
	private  $module;
	private  $id;
	private  $actions;
	private  $keyModified=array();

	/**
	 * The method to get the signalNamespace
	 * @return string A string representing the signalNamespace
	 */
	public function getSignalNamespace()
	{
		return $this->signalNamespace; 

	}

	/**
	 * The method to set the value to signalNamespace
	 * @param string $signalNamespace A string
	 */
	public function setSignalNamespace(string $signalNamespace)
	{
		$this->signalNamespace=$signalNamespace; 
		$this->keyModified['signal_namespace'] = 1; 

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
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the actions
	 * @return array A array representing the actions
	 */
	public function getActions()
	{
		return $this->actions; 

	}

	/**
	 * The method to set the value to actions
	 * @param array $actions A array
	 */
	public function setActions(array $actions)
	{
		$this->actions=$actions; 
		$this->keyModified['actions'] = 1; 

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
