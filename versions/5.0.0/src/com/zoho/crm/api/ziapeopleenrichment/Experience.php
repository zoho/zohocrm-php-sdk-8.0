<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class Experience implements Model
{

	private  $endDate;
	private  $companyName;
	private  $title;
	private  $startDate;
	private  $primary;
	private  $keyModified=array();

	/**
	 * The method to get the endDate
	 * @return string A string representing the endDate
	 */
	public function getEndDate()
	{
		return $this->endDate; 

	}

	/**
	 * The method to set the value to endDate
	 * @param string $endDate A string
	 */
	public function setEndDate(?string $endDate)
	{
		$this->endDate=$endDate; 
		$this->keyModified['end_date'] = 1; 

	}

	/**
	 * The method to get the companyName
	 * @return string A string representing the companyName
	 */
	public function getCompanyName()
	{
		return $this->companyName; 

	}

	/**
	 * The method to set the value to companyName
	 * @param string $companyName A string
	 */
	public function setCompanyName(?string $companyName)
	{
		$this->companyName=$companyName; 
		$this->keyModified['company_name'] = 1; 

	}

	/**
	 * The method to get the title
	 * @return string A string representing the title
	 */
	public function getTitle()
	{
		return $this->title; 

	}

	/**
	 * The method to set the value to title
	 * @param string $title A string
	 */
	public function setTitle(?string $title)
	{
		$this->title=$title; 
		$this->keyModified['title'] = 1; 

	}

	/**
	 * The method to get the startDate
	 * @return string A string representing the startDate
	 */
	public function getStartDate()
	{
		return $this->startDate; 

	}

	/**
	 * The method to set the value to startDate
	 * @param string $startDate A string
	 */
	public function setStartDate(?string $startDate)
	{
		$this->startDate=$startDate; 
		$this->keyModified['start_date'] = 1; 

	}

	/**
	 * The method to get the primary
	 * @return bool A bool representing the primary
	 */
	public function getPrimary()
	{
		return $this->primary; 

	}

	/**
	 * The method to set the value to primary
	 * @param bool $primary A bool
	 */
	public function setPrimary(?bool $primary)
	{
		$this->primary=$primary; 
		$this->keyModified['primary'] = 1; 

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
