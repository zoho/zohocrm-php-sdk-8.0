<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Assign implements Model
{

	private  $feature;
	private  $relatedEntityId;
	private  $page;
	private  $perPage;
	private  $id;
	private  $filters;
	private  $keyModified=array();

	/**
	 * The method to get the feature
	 * @return Choice An instance of Choice
	 */
	public function getFeature()
	{
		return $this->feature; 

	}

	/**
	 * The method to set the value to feature
	 * @param Choice $feature An instance of Choice
	 */
	public function setFeature(?Choice $feature)
	{
		$this->feature=$feature; 
		$this->keyModified['feature'] = 1; 

	}

	/**
	 * The method to get the relatedEntityId
	 * @return string A string representing the relatedEntityId
	 */
	public function getRelatedEntityId()
	{
		return $this->relatedEntityId; 

	}

	/**
	 * The method to set the value to relatedEntityId
	 * @param string $relatedEntityId A string
	 */
	public function setRelatedEntityId(?string $relatedEntityId)
	{
		$this->relatedEntityId=$relatedEntityId; 
		$this->keyModified['related_entity_id'] = 1; 

	}

	/**
	 * The method to get the page
	 * @return int A int representing the page
	 */
	public function getPage()
	{
		return $this->page; 

	}

	/**
	 * The method to set the value to page
	 * @param int $page A int
	 */
	public function setPage(?int $page)
	{
		$this->page=$page; 
		$this->keyModified['page'] = 1; 

	}

	/**
	 * The method to get the perPage
	 * @return int A int representing the perPage
	 */
	public function getPerPage()
	{
		return $this->perPage; 

	}

	/**
	 * The method to set the value to perPage
	 * @param int $perPage A int
	 */
	public function setPerPage(?int $perPage)
	{
		$this->perPage=$perPage; 
		$this->keyModified['per_page'] = 1; 

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
	 * The method to get the filters
	 * @return Criteria An instance of Criteria
	 */
	public function getFilters()
	{
		return $this->filters; 

	}

	/**
	 * The method to set the value to filters
	 * @param Criteria $filters An instance of Criteria
	 */
	public function setFilters(?Criteria $filters)
	{
		$this->filters=$filters; 
		$this->keyModified['filters'] = 1; 

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
