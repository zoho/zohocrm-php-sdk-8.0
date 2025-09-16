<?php 
namespace com\zoho\crm\api\pipeline;

use com\zoho\crm\api\util\Model;

class DPipeline implements Model
{

	private  $delete;
	private  $keyModified=array();

	/**
	 * The method to get the delete
	 * @return Delete An instance of Delete
	 */
	public function getDelete()
	{
		return $this->delete; 

	}

	/**
	 * The method to set the value to delete
	 * @param Delete $delete An instance of Delete
	 */
	public function setDelete(Delete $delete)
	{
		$this->delete=$delete; 
		$this->keyModified['_delete'] = 1; 

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
