<?php 
namespace com\zoho\crm\api\getrelatedrecordscount;

use com\zoho\crm\api\util\Model;

class SuccessResponse implements Model, ActionResponse
{

	private  $count;
	private  $relatedList;
	private  $keyModified=array();

	/**
	 * The method to get the count
	 * @return int A int representing the count
	 */
	public function getCount()
	{
		return $this->count; 

	}

	/**
	 * The method to set the value to count
	 * @param int $count A int
	 */
	public function setCount(?int $count)
	{
		$this->count=$count; 
		$this->keyModified['count'] = 1; 

	}

	/**
	 * The method to get the relatedList
	 * @return RelatedList An instance of RelatedList
	 */
	public function getRelatedList()
	{
		return $this->relatedList; 

	}

	/**
	 * The method to set the value to relatedList
	 * @param RelatedList $relatedList An instance of RelatedList
	 */
	public function setRelatedList(?RelatedList $relatedList)
	{
		$this->relatedList=$relatedList; 
		$this->keyModified['related_list'] = 1; 

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
