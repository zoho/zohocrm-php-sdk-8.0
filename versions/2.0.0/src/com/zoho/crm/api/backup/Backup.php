<?php 
namespace com\zoho\crm\api\backup;

use com\zoho\crm\api\util\Model;

class Backup implements Model
{

	private  $rrule;
	private  $id;
	private  $startDate;
	private  $scheduledDate;
	private  $status;
	private  $requester;
	private  $keyModified=array();

	/**
	 * The method to get the rrule
	 * @return string A string representing the rrule
	 */
	public function getRrule()
	{
		return $this->rrule; 

	}

	/**
	 * The method to set the value to rrule
	 * @param string $rrule A string
	 */
	public function setRrule(string $rrule)
	{
		$this->rrule=$rrule; 
		$this->keyModified['rrule'] = 1; 

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
	 * The method to get the startDate
	 * @return \DateTime An instance of \DateTime
	 */
	public function getStartDate()
	{
		return $this->startDate; 

	}

	/**
	 * The method to set the value to startDate
	 * @param \DateTime $startDate An instance of \DateTime
	 */
	public function setStartDate(\DateTime $startDate)
	{
		$this->startDate=$startDate; 
		$this->keyModified['start_date'] = 1; 

	}

	/**
	 * The method to get the scheduledDate
	 * @return \DateTime An instance of \DateTime
	 */
	public function getScheduledDate()
	{
		return $this->scheduledDate; 

	}

	/**
	 * The method to set the value to scheduledDate
	 * @param \DateTime $scheduledDate An instance of \DateTime
	 */
	public function setScheduledDate(\DateTime $scheduledDate)
	{
		$this->scheduledDate=$scheduledDate; 
		$this->keyModified['scheduled_date'] = 1; 

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
	 * The method to get the requester
	 * @return Requester An instance of Requester
	 */
	public function getRequester()
	{
		return $this->requester; 

	}

	/**
	 * The method to set the value to requester
	 * @param Requester $requester An instance of Requester
	 */
	public function setRequester(Requester $requester)
	{
		$this->requester=$requester; 
		$this->keyModified['requester'] = 1; 

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
