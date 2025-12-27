<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Expression implements Model
{

	private  $functionParameters;
	private  $criteria;
	private  $function;
	private  $keyModified=array();

	/**
	 * The method to get the functionParameters
	 * @return array A array representing the functionParameters
	 */
	public function getFunctionParameters()
	{
		return $this->functionParameters; 

	}

	/**
	 * The method to set the value to functionParameters
	 * @param array $functionParameters A array
	 */
	public function setFunctionParameters(?array $functionParameters)
	{
		$this->functionParameters=$functionParameters; 
		$this->keyModified['function_parameters'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return Criteria An instance of Criteria
	 */
	public function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param Criteria $criteria An instance of Criteria
	 */
	public function setCriteria(?Criteria $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

	}

	/**
	 * The method to get the function
	 * @return string A string representing the function
	 */
	public function getFunction()
	{
		return $this->function; 

	}

	/**
	 * The method to set the value to function
	 * @param string $function A string
	 */
	public function setFunction(?string $function)
	{
		$this->function=$function; 
		$this->keyModified['function'] = 1; 

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
