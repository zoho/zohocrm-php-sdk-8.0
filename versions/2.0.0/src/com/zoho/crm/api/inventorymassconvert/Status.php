<?php 
namespace com\zoho\crm\api\inventorymassconvert;

use com\zoho\crm\api\util\Model;

class Status implements Model
{

	private  $totalCount;
	private  $convertedCount;
	private  $notConvertedCount;
	private  $failedCount;
	private  $status;
	private  $keyModified=array();

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
	 * The method to get the convertedCount
	 * @return int A int representing the convertedCount
	 */
	public function getConvertedCount()
	{
		return $this->convertedCount; 

	}

	/**
	 * The method to set the value to convertedCount
	 * @param int $convertedCount A int
	 */
	public function setConvertedCount(int $convertedCount)
	{
		$this->convertedCount=$convertedCount; 
		$this->keyModified['converted_count'] = 1; 

	}

	/**
	 * The method to get the notConvertedCount
	 * @return int A int representing the notConvertedCount
	 */
	public function getNotConvertedCount()
	{
		return $this->notConvertedCount; 

	}

	/**
	 * The method to set the value to notConvertedCount
	 * @param int $notConvertedCount A int
	 */
	public function setNotConvertedCount(int $notConvertedCount)
	{
		$this->notConvertedCount=$notConvertedCount; 
		$this->keyModified['not_converted_count'] = 1; 

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
	 * The method to get the status
	 * @return string A string representing the status
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param string $status A string
	 */
	public function setStatus(string $status)
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
