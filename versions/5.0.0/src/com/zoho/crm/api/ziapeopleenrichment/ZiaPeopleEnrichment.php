<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class ZiaPeopleEnrichment implements Model
{

	private  $createdTime;
	private  $id;
	private  $createdBy;
	private  $status;
	private  $enrichedData;
	private  $enrichBasedOn;
	private  $keyModified=array();

	/**
	 * The method to get the createdTime
	 * @return string A string representing the createdTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param string $createdTime A string
	 */
	public function setCreatedTime(?string $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

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
	 * The method to get the enrichedData
	 * @return EnrichedData An instance of EnrichedData
	 */
	public function getEnrichedData()
	{
		return $this->enrichedData; 

	}

	/**
	 * The method to set the value to enrichedData
	 * @param EnrichedData $enrichedData An instance of EnrichedData
	 */
	public function setEnrichedData(?EnrichedData $enrichedData)
	{
		$this->enrichedData=$enrichedData; 
		$this->keyModified['enriched_data'] = 1; 

	}

	/**
	 * The method to get the enrichBasedOn
	 * @return EnrichBasedOn An instance of EnrichBasedOn
	 */
	public function getEnrichBasedOn()
	{
		return $this->enrichBasedOn; 

	}

	/**
	 * The method to set the value to enrichBasedOn
	 * @param EnrichBasedOn $enrichBasedOn An instance of EnrichBasedOn
	 */
	public function setEnrichBasedOn(?EnrichBasedOn $enrichBasedOn)
	{
		$this->enrichBasedOn=$enrichBasedOn; 
		$this->keyModified['enrich_based_on'] = 1; 

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
