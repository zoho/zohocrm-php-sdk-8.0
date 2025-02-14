<?php 
namespace com\zoho\crm\api\backup;

use com\zoho\crm\api\util\Model;

class History implements Model
{

	private  $id;
	private  $logTime;
	private  $action;
	private  $repeatType;
	private  $count;
	private  $fileName;
	private  $state;
	private  $doneBy;
	private  $keyModified=array();

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
	 * The method to get the logTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getLogTime()
	{
		return $this->logTime; 

	}

	/**
	 * The method to set the value to logTime
	 * @param \DateTime $logTime An instance of \DateTime
	 */
	public function setLogTime(\DateTime $logTime)
	{
		$this->logTime=$logTime; 
		$this->keyModified['log_time'] = 1; 

	}

	/**
	 * The method to get the action
	 * @return string A string representing the action
	 */
	public function getAction()
	{
		return $this->action; 

	}

	/**
	 * The method to set the value to action
	 * @param string $action A string
	 */
	public function setAction(string $action)
	{
		$this->action=$action; 
		$this->keyModified['action'] = 1; 

	}

	/**
	 * The method to get the repeatType
	 * @return string A string representing the repeatType
	 */
	public function getRepeatType()
	{
		return $this->repeatType; 

	}

	/**
	 * The method to set the value to repeatType
	 * @param string $repeatType A string
	 */
	public function setRepeatType(string $repeatType)
	{
		$this->repeatType=$repeatType; 
		$this->keyModified['repeat_type'] = 1; 

	}

	/**
	 * The method to get the count
	 * @return int A int representing the count
	 */
	public function getCount()
	{
		return $this->count; 

	}

	/**
	 * The method to set the value to count
	 * @param int $count A int
	 */
	public function setCount(int $count)
	{
		$this->count=$count; 
		$this->keyModified['count'] = 1; 

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
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public function setState(string $state)
	{
		$this->state=$state; 
		$this->keyModified['state'] = 1; 

	}

	/**
	 * The method to get the doneBy
	 * @return Requester An instance of Requester
	 */
	public function getDoneBy()
	{
		return $this->doneBy; 

	}

	/**
	 * The method to set the value to doneBy
	 * @param Requester $doneBy An instance of Requester
	 */
	public function setDoneBy(Requester $doneBy)
	{
		$this->doneBy=$doneBy; 
		$this->keyModified['done_by'] = 1; 

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
