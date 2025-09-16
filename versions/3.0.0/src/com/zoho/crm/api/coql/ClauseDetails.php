<?php 
namespace com\zoho\crm\api\coql;

use com\zoho\crm\api\util\Model;

class ClauseDetails implements Model, DetailsWrapper
{

	private  $clause;
	private  $keyModified=array();

	/**
	 * The method to get the clause
	 * @return string A string representing the clause
	 */
	public function getClause()
	{
		return $this->clause; 

	}

	/**
	 * The method to set the value to clause
	 * @param string $clause A string
	 */
	public function setClause(string $clause)
	{
		$this->clause=$clause; 
		$this->keyModified['clause'] = 1; 

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
