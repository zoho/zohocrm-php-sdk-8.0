<?php 
namespace com\zoho\crm\api\auditlogexport;

use com\zoho\crm\api\util\Model;

class AuditLogExport implements Model
{

	private  $criteria;
	private  $id;
	private  $status;
	private  $createdBy;
	private  $downloadLinks;
	private  $jobStartTime;
	private  $jobEndTime;
	private  $expiryDate;
	private  $keyModified=array();

	/**
	 * The method to get the criteria
	 * @return Criteria An instance of Criteria
	 */
	public function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param Criteria $criteria An instance of Criteria
	 */
	public function setCriteria(?Criteria $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

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
	public function setId(?string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
	public function setStatus(?string $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public function setCreatedBy(?User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the downloadLinks
	 * @return array A array representing the downloadLinks
	 */
	public function getDownloadLinks()
	{
		return $this->downloadLinks; 

	}

	/**
	 * The method to set the value to downloadLinks
	 * @param array $downloadLinks A array
	 */
	public function setDownloadLinks(?array $downloadLinks)
	{
		$this->downloadLinks=$downloadLinks; 
		$this->keyModified['download_links'] = 1; 

	}

	/**
	 * The method to get the jobStartTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getJobStartTime()
	{
		return $this->jobStartTime; 

	}

	/**
	 * The method to set the value to jobStartTime
	 * @param \DateTime $jobStartTime An instance of \DateTime
	 */
	public function setJobStartTime(?\DateTime $jobStartTime)
	{
		$this->jobStartTime=$jobStartTime; 
		$this->keyModified['job_start_time'] = 1; 

	}

	/**
	 * The method to get the jobEndTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getJobEndTime()
	{
		return $this->jobEndTime; 

	}

	/**
	 * The method to set the value to jobEndTime
	 * @param \DateTime $jobEndTime An instance of \DateTime
	 */
	public function setJobEndTime(?\DateTime $jobEndTime)
	{
		$this->jobEndTime=$jobEndTime; 
		$this->keyModified['job_end_time'] = 1; 

	}

	/**
	 * The method to get the expiryDate
	 * @return \DateTime An instance of \DateTime
	 */
	public function getExpiryDate()
	{
		return $this->expiryDate; 

	}

	/**
	 * The method to set the value to expiryDate
	 * @param \DateTime $expiryDate An instance of \DateTime
	 */
	public function setExpiryDate(?\DateTime $expiryDate)
	{
		$this->expiryDate=$expiryDate; 
		$this->keyModified['expiry_date'] = 1; 

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
