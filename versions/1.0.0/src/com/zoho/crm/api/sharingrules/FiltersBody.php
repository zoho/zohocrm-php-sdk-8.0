<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\util\Model;

class FiltersBody implements Model
{

	private  $filters;
	private  $keyModified=array();

	/**
	 * The method to get the filters
	 * @return array A array representing the filters
	 */
	public function getFilters()
	{
		return $this->filters; 

	}

	/**
	 * The method to set the value to filters
	 * @param array $filters A array
	 */
	public function setFilters(array $filters)
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
