<?php 
namespace com\zoho\crm\api\findandmerge;

use com\zoho\crm\api\util\Model;

class Merge implements Model
{

	private  $jobId;
	private  $status;
	private  $data;
	private  $masterRecordFields;
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
	 * The method to get the data
	 * @return array A array representing the data
	 */
	public function getData()
	{
		return $this->data; 

	}

	/**
	 * The method to set the value to data
	 * @param array $data A array
	 */
	public function setData(array $data)
	{
		$this->data=$data; 
		$this->keyModified['data'] = 1; 

	}

	/**
	 * The method to get the masterRecordFields
	 * @return array A array representing the masterRecordFields
	 */
	public function getMasterRecordFields()
	{
		return $this->masterRecordFields; 

	}

	/**
	 * The method to set the value to masterRecordFields
	 * @param array $masterRecordFields A array
	 */
	public function setMasterRecordFields(array $masterRecordFields)
	{
		$this->masterRecordFields=$masterRecordFields; 
		$this->keyModified['master_record_fields'] = 1; 

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
