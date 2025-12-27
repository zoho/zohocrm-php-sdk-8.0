<?php 
namespace com\zoho\crm\api\cadencesexecution;

use com\zoho\crm\api\util\Model;

class AnalyticsTask implements Model
{

	private  $openTasksCount;
	private  $failedTasksCount;
	private  $subject;
	private  $completedTasksCount;
	private  $createdTasksCount;
	private  $tasksCount;
	private  $keyModified=array();

	/**
	 * The method to get the openTasksCount
	 * @return int A int representing the openTasksCount
	 */
	public function getOpenTasksCount()
	{
		return $this->openTasksCount; 

	}

	/**
	 * The method to set the value to openTasksCount
	 * @param int $openTasksCount A int
	 */
	public function setOpenTasksCount(?int $openTasksCount)
	{
		$this->openTasksCount=$openTasksCount; 
		$this->keyModified['open_tasks_count'] = 1; 

	}

	/**
	 * The method to get the failedTasksCount
	 * @return int A int representing the failedTasksCount
	 */
	public function getFailedTasksCount()
	{
		return $this->failedTasksCount; 

	}

	/**
	 * The method to set the value to failedTasksCount
	 * @param int $failedTasksCount A int
	 */
	public function setFailedTasksCount(?int $failedTasksCount)
	{
		$this->failedTasksCount=$failedTasksCount; 
		$this->keyModified['failed_tasks_count'] = 1; 

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
	public function setSubject(?string $subject)
	{
		$this->subject=$subject; 
		$this->keyModified['subject'] = 1; 

	}

	/**
	 * The method to get the completedTasksCount
	 * @return int A int representing the completedTasksCount
	 */
	public function getCompletedTasksCount()
	{
		return $this->completedTasksCount; 

	}

	/**
	 * The method to set the value to completedTasksCount
	 * @param int $completedTasksCount A int
	 */
	public function setCompletedTasksCount(?int $completedTasksCount)
	{
		$this->completedTasksCount=$completedTasksCount; 
		$this->keyModified['completed_tasks_count'] = 1; 

	}

	/**
	 * The method to get the createdTasksCount
	 * @return int A int representing the createdTasksCount
	 */
	public function getCreatedTasksCount()
	{
		return $this->createdTasksCount; 

	}

	/**
	 * The method to set the value to createdTasksCount
	 * @param int $createdTasksCount A int
	 */
	public function setCreatedTasksCount(?int $createdTasksCount)
	{
		$this->createdTasksCount=$createdTasksCount; 
		$this->keyModified['created_tasks_count'] = 1; 

	}

	/**
	 * The method to get the tasksCount
	 * @return int A int representing the tasksCount
	 */
	public function getTasksCount()
	{
		return $this->tasksCount; 

	}

	/**
	 * The method to set the value to tasksCount
	 * @param int $tasksCount A int
	 */
	public function setTasksCount(?int $tasksCount)
	{
		$this->tasksCount=$tasksCount; 
		$this->keyModified['tasks_count'] = 1; 

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
