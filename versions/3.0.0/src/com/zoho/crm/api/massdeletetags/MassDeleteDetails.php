<?php 
namespace com\zoho\crm\api\massdeletetags;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class MassDeleteDetails implements Model, StatusActionResponse
{

	private  $jobId;
	private  $totalCount;
	private  $failedCount;
	private  $deletedCount;
	private  $status;
	private  $keyModified=array();

	/**
	 * The method to get the jobId
	 * @return string A string representing the jobId
	 */
	public function getJobId()
	{
		return $this->jobId; 

	}

	/**
	 * The method to set the value to jobId
	 * @param string $jobId A string
	 */
	public function setJobId(string $jobId)
	{
		$this->jobId=$jobId; 
		$this->keyModified['job_id'] = 1; 

	}

	/**
	 * The method to get the totalCount
	 * @return int A int representing the totalCount
	 */
	public function getTotalCount()
	{
		return $this->totalCount; 

	}

	/**
	 * The method to set the value to totalCount
	 * @param int $totalCount A int
	 */
	public function setTotalCount(int $totalCount)
	{
		$this->totalCount=$totalCount; 
		$this->keyModified['total_count'] = 1; 

	}

	/**
	 * The method to get the failedCount
	 * @return int A int representing the failedCount
	 */
	public function getFailedCount()
	{
		return $this->failedCount; 

	}

	/**
	 * The method to set the value to failedCount
	 * @param int $failedCount A int
	 */
	public function setFailedCount(int $failedCount)
	{
		$this->failedCount=$failedCount; 
		$this->keyModified['failed_count'] = 1; 

	}

	/**
	 * The method to get the deletedCount
	 * @return int A int representing the deletedCount
	 */
	public function getDeletedCount()
	{
		return $this->deletedCount; 

	}

	/**
	 * The method to set the value to deletedCount
	 * @param int $deletedCount A int
	 */
	public function setDeletedCount(int $deletedCount)
	{
		$this->deletedCount=$deletedCount; 
		$this->keyModified['deleted_count'] = 1; 

	}

	/**
	 * The method to get the status
	 * @return Choice An instance of Choice
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param Choice $status An instance of Choice
	 */
	public function setStatus(Choice $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

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
