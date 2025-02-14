<?php 
namespace com\zoho\crm\api\coql;

use com\zoho\crm\api\util\Model;

class ParseErrorDetails implements Model, DetailsWrapper
{

	private  $line;
	private  $column;
	private  $near;
	private  $keyModified=array();

	/**
	 * The method to get the line
	 * @return int A int representing the line
	 */
	public function getLine()
	{
		return $this->line; 

	}

	/**
	 * The method to set the value to line
	 * @param int $line A int
	 */
	public function setLine(int $line)
	{
		$this->line=$line; 
		$this->keyModified['line'] = 1; 

	}

	/**
	 * The method to get the column
	 * @return int A int representing the column
	 */
	public function getColumn()
	{
		return $this->column; 

	}

	/**
	 * The method to set the value to column
	 * @param int $column A int
	 */
	public function setColumn(int $column)
	{
		$this->column=$column; 
		$this->keyModified['column'] = 1; 

	}

	/**
	 * The method to get the near
	 * @return string A string representing the near
	 */
	public function getNear()
	{
		return $this->near; 

	}

	/**
	 * The method to set the value to near
	 * @param string $near A string
	 */
	public function setNear(string $near)
	{
		$this->near=$near; 
		$this->keyModified['near'] = 1; 

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
