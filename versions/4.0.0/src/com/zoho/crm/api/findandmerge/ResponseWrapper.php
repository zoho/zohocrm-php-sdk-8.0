<?php 
namespace com\zoho\crm\api\findandmerge;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $merge;
	private  $keyModified=array();

	/**
	 * The method to get the merge
	 * @return array A array representing the merge
	 */
	public function getMerge()
	{
		return $this->merge; 

	}

	/**
	 * The method to set the value to merge
	 * @param array $merge A array
	 */
	public function setMerge(array $merge)
	{
		$this->merge=$merge; 
		$this->keyModified['merge'] = 1; 

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
