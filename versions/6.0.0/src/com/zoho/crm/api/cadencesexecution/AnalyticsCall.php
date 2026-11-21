<?php 
namespace com\zoho\crm\api\cadencesexecution;

use com\zoho\crm\api\util\Model;

class AnalyticsCall implements Model
{

	private  $createdCallsCount;
	private  $cancelledCallsCount;
	private  $failedCallsCount;
	private  $completedCallsCount;
	private  $scheduledCallsCount;
	private  $callsCount;
	private  $overdueCallsCount;
	private  $missedCallsCount;
	private  $keyModified=array();

	/**
	 * The method to get the createdCallsCount
	 * @return int A int representing the createdCallsCount
	 */
	public function getCreatedCallsCount()
	{
		return $this->createdCallsCount; 

	}

	/**
	 * The method to set the value to createdCallsCount
	 * @param int $createdCallsCount A int
	 */
	public function setCreatedCallsCount(?int $createdCallsCount)
	{
		$this->createdCallsCount=$createdCallsCount; 
		$this->keyModified['created_calls_count'] = 1; 

	}

	/**
	 * The method to get the cancelledCallsCount
	 * @return int A int representing the cancelledCallsCount
	 */
	public function getCancelledCallsCount()
	{
		return $this->cancelledCallsCount; 

	}

	/**
	 * The method to set the value to cancelledCallsCount
	 * @param int $cancelledCallsCount A int
	 */
	public function setCancelledCallsCount(?int $cancelledCallsCount)
	{
		$this->cancelledCallsCount=$cancelledCallsCount; 
		$this->keyModified['cancelled_calls_count'] = 1; 

	}

	/**
	 * The method to get the failedCallsCount
	 * @return int A int representing the failedCallsCount
	 */
	public function getFailedCallsCount()
	{
		return $this->failedCallsCount; 

	}

	/**
	 * The method to set the value to failedCallsCount
	 * @param int $failedCallsCount A int
	 */
	public function setFailedCallsCount(?int $failedCallsCount)
	{
		$this->failedCallsCount=$failedCallsCount; 
		$this->keyModified['failed_calls_count'] = 1; 

	}

	/**
	 * The method to get the completedCallsCount
	 * @return int A int representing the completedCallsCount
	 */
	public function getCompletedCallsCount()
	{
		return $this->completedCallsCount; 

	}

	/**
	 * The method to set the value to completedCallsCount
	 * @param int $completedCallsCount A int
	 */
	public function setCompletedCallsCount(?int $completedCallsCount)
	{
		$this->completedCallsCount=$completedCallsCount; 
		$this->keyModified['completed_calls_count'] = 1; 

	}

	/**
	 * The method to get the scheduledCallsCount
	 * @return int A int representing the scheduledCallsCount
	 */
	public function getScheduledCallsCount()
	{
		return $this->scheduledCallsCount; 

	}

	/**
	 * The method to set the value to scheduledCallsCount
	 * @param int $scheduledCallsCount A int
	 */
	public function setScheduledCallsCount(?int $scheduledCallsCount)
	{
		$this->scheduledCallsCount=$scheduledCallsCount; 
		$this->keyModified['scheduled_calls_count'] = 1; 

	}

	/**
	 * The method to get the callsCount
	 * @return int A int representing the callsCount
	 */
	public function getCallsCount()
	{
		return $this->callsCount; 

	}

	/**
	 * The method to set the value to callsCount
	 * @param int $callsCount A int
	 */
	public function setCallsCount(?int $callsCount)
	{
		$this->callsCount=$callsCount; 
		$this->keyModified['calls_count'] = 1; 

	}

	/**
	 * The method to get the overdueCallsCount
	 * @return int A int representing the overdueCallsCount
	 */
	public function getOverdueCallsCount()
	{
		return $this->overdueCallsCount; 

	}

	/**
	 * The method to set the value to overdueCallsCount
	 * @param int $overdueCallsCount A int
	 */
	public function setOverdueCallsCount(?int $overdueCallsCount)
	{
		$this->overdueCallsCount=$overdueCallsCount; 
		$this->keyModified['overdue_calls_count'] = 1; 

	}

	/**
	 * The method to get the missedCallsCount
	 * @return int A int representing the missedCallsCount
	 */
	public function getMissedCallsCount()
	{
		return $this->missedCallsCount; 

	}

	/**
	 * The method to set the value to missedCallsCount
	 * @param int $missedCallsCount A int
	 */
	public function setMissedCallsCount(?int $missedCallsCount)
	{
		$this->missedCallsCount=$missedCallsCount; 
		$this->keyModified['missed_calls_count'] = 1; 

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
