<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class MultiSelectLookup implements Model
{

	private  $id;
	private  $fieldname;
	private  $hasMore;
	private  $keyModified=array();

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
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the fieldname
	 * @return array A array representing the fieldname
	 */
	public function getFieldname()
	{
		return $this->fieldname; 

	}

	/**
	 * The method to set the value to fieldname
	 * @param array $fieldname A array
	 */
	public function setFieldname(array $fieldname)
	{
		$this->fieldname=$fieldname; 
		$this->keyModified['fieldName'] = 1; 

	}

	/**
	 * The method to get the hasMore
	 * @return array A array representing the hasMore
	 */
	public function getHasMore()
	{
		return $this->hasMore; 

	}

	/**
	 * The method to set the value to hasMore
	 * @param array $hasMore A array
	 */
	public function setHasMore(array $hasMore)
	{
		$this->hasMore=$hasMore; 
		$this->keyModified['$has_more'] = 1; 

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
