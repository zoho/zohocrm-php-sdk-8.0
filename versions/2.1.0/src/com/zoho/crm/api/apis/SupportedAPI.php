<?php 
namespace com\zoho\crm\api\apis;

use com\zoho\crm\api\util\Model;

class SupportedAPI implements Model
{

	private  $path;
	private  $operationTypes;
	private  $keyModified=array();

	/**
	 * The method to get the path
	 * @return string A string representing the path
	 */
	public function getPath()
	{
		return $this->path; 

	}

	/**
	 * The method to set the value to path
	 * @param string $path A string
	 */
	public function setPath(string $path)
	{
		$this->path=$path; 
		$this->keyModified['path'] = 1; 

	}

	/**
	 * The method to get the operationTypes
	 * @return array A array representing the operationTypes
	 */
	public function getOperationTypes()
	{
		return $this->operationTypes; 

	}

	/**
	 * The method to set the value to operationTypes
	 * @param array $operationTypes A array
	 */
	public function setOperationTypes(array $operationTypes)
	{
		$this->operationTypes=$operationTypes; 
		$this->keyModified['operation_types'] = 1; 

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
