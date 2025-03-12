<?php 
namespace com\zoho\crm\api\getrelatedrecordscount;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Params implements Model
{

	private  $approved;
	private  $converted;
	private  $associated;
	private  $category;
	private  $approvalState;
	private  $filters;
	private  $keyModified=array();

	/**
	 * The method to get the approved
	 * @return bool A bool representing the approved
	 */
	public function getApproved()
	{
		return $this->approved; 

	}

	/**
	 * The method to set the value to approved
	 * @param bool $approved A bool
	 */
	public function setApproved(bool $approved)
	{
		$this->approved=$approved; 
		$this->keyModified['approved'] = 1; 

	}

	/**
	 * The method to get the converted
	 * @return bool A bool representing the converted
	 */
	public function getConverted()
	{
		return $this->converted; 

	}

	/**
	 * The method to set the value to converted
	 * @param bool $converted A bool
	 */
	public function setConverted(bool $converted)
	{
		$this->converted=$converted; 
		$this->keyModified['converted'] = 1; 

	}

	/**
	 * The method to get the associated
	 * @return bool A bool representing the associated
	 */
	public function getAssociated()
	{
		return $this->associated; 

	}

	/**
	 * The method to set the value to associated
	 * @param bool $associated A bool
	 */
	public function setAssociated(bool $associated)
	{
		$this->associated=$associated; 
		$this->keyModified['associated'] = 1; 

	}

	/**
	 * The method to get the category
	 * @return Choice An instance of Choice
	 */
	public function getCategory()
	{
		return $this->category; 

	}

	/**
	 * The method to set the value to category
	 * @param Choice $category An instance of Choice
	 */
	public function setCategory(Choice $category)
	{
		$this->category=$category; 
		$this->keyModified['category'] = 1; 

	}

	/**
	 * The method to get the approvalState
	 * @return Choice An instance of Choice
	 */
	public function getApprovalState()
	{
		return $this->approvalState; 

	}

	/**
	 * The method to set the value to approvalState
	 * @param Choice $approvalState An instance of Choice
	 */
	public function setApprovalState(Choice $approvalState)
	{
		$this->approvalState=$approvalState; 
		$this->keyModified['approval_state'] = 1; 

	}

	/**
	 * The method to get the filters
	 * @return Filters An instance of Filters
	 */
	public function getFilters()
	{
		return $this->filters; 

	}

	/**
	 * The method to set the value to filters
	 * @param Filters $filters An instance of Filters
	 */
	public function setFilters(Filters $filters)
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
