<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\util\Model;

class Info implements Model
{

	private  $perPage;
	private  $page;
	private  $count;
	private  $moreRecords;
	private  $nextPageToken;
	private  $previousPageToken;
	private  $keyModified=array();

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
	public function setPerPage(int $perPage)
	{
		$this->perPage=$perPage; 
		$this->keyModified['per_page'] = 1; 

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
	public function setPage(int $page)
	{
		$this->page=$page; 
		$this->keyModified['page'] = 1; 

	}

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
	public function setCount(int $count)
	{
		$this->count=$count; 
		$this->keyModified['count'] = 1; 

	}

	/**
	 * The method to get the moreRecords
	 * @return bool A bool representing the moreRecords
	 */
	public function getMoreRecords()
	{
		return $this->moreRecords; 

	}

	/**
	 * The method to set the value to moreRecords
	 * @param bool $moreRecords A bool
	 */
	public function setMoreRecords(bool $moreRecords)
	{
		$this->moreRecords=$moreRecords; 
		$this->keyModified['more_records'] = 1; 

	}

	/**
	 * The method to get the nextPageToken
	 * @return string A string representing the nextPageToken
	 */
	public function getNextPageToken()
	{
		return $this->nextPageToken; 

	}

	/**
	 * The method to set the value to nextPageToken
	 * @param string $nextPageToken A string
	 */
	public function setNextPageToken(string $nextPageToken)
	{
		$this->nextPageToken=$nextPageToken; 
		$this->keyModified['next_page_token'] = 1; 

	}

	/**
	 * The method to get the previousPageToken
	 * @return string A string representing the previousPageToken
	 */
	public function getPreviousPageToken()
	{
		return $this->previousPageToken; 

	}

	/**
	 * The method to set the value to previousPageToken
	 * @param string $previousPageToken A string
	 */
	public function setPreviousPageToken(string $previousPageToken)
	{
		$this->previousPageToken=$previousPageToken; 
		$this->keyModified['previous_page_token'] = 1; 

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
