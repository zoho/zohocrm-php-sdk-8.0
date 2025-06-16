<?php 
namespace com\zoho\crm\api\cadences;

use com\zoho\crm\api\util\Model;

class Summary implements Model
{

	private  $taskFollowUpCount;
	private  $callFollowUpCount;
	private  $emailFollowUpCount;
	private  $keyModified=array();

	/**
	 * The method to get the taskFollowUpCount
	 * @return int A int representing the taskFollowUpCount
	 */
	public function getTaskFollowUpCount()
	{
		return $this->taskFollowUpCount; 

	}

	/**
	 * The method to set the value to taskFollowUpCount
	 * @param int $taskFollowUpCount A int
	 */
	public function setTaskFollowUpCount(int $taskFollowUpCount)
	{
		$this->taskFollowUpCount=$taskFollowUpCount; 
		$this->keyModified['task_follow_up_count'] = 1; 

	}

	/**
	 * The method to get the callFollowUpCount
	 * @return int A int representing the callFollowUpCount
	 */
	public function getCallFollowUpCount()
	{
		return $this->callFollowUpCount; 

	}

	/**
	 * The method to set the value to callFollowUpCount
	 * @param int $callFollowUpCount A int
	 */
	public function setCallFollowUpCount(int $callFollowUpCount)
	{
		$this->callFollowUpCount=$callFollowUpCount; 
		$this->keyModified['call_follow_up_count'] = 1; 

	}

	/**
	 * The method to get the emailFollowUpCount
	 * @return int A int representing the emailFollowUpCount
	 */
	public function getEmailFollowUpCount()
	{
		return $this->emailFollowUpCount; 

	}

	/**
	 * The method to set the value to emailFollowUpCount
	 * @param int $emailFollowUpCount A int
	 */
	public function setEmailFollowUpCount(int $emailFollowUpCount)
	{
		$this->emailFollowUpCount=$emailFollowUpCount; 
		$this->keyModified['email_follow_up_count'] = 1; 

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
