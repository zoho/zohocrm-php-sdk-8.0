<?php 
namespace com\zoho\crm\api\features;

use com\zoho\crm\api\util\Model;

class Limit implements Model
{

	private  $total;
	private  $editionLimit;
	private  $keyModified=array();

	/**
	 * The method to get the total
	 * @return int A int representing the total
	 */
	public function getTotal()
	{
		return $this->total; 

	}

	/**
	 * The method to set the value to total
	 * @param int $total A int
	 */
	public function setTotal(int $total)
	{
		$this->total=$total; 
		$this->keyModified['total'] = 1; 

	}

	/**
	 * The method to get the editionLimit
	 * @return int A int representing the editionLimit
	 */
	public function getEditionLimit()
	{
		return $this->editionLimit; 

	}

	/**
	 * The method to set the value to editionLimit
	 * @param int $editionLimit A int
	 */
	public function setEditionLimit(int $editionLimit)
	{
		$this->editionLimit=$editionLimit; 
		$this->keyModified['edition_limit'] = 1; 

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
