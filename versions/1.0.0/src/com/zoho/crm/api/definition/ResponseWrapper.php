<?php 
namespace com\zoho\crm\api\definition;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model
{

	private  $definition;
	private  $keyModified=array();

	/**
	 * The method to get the definition
	 * @return Definition An instance of Definition
	 */
	public function getDefinition()
	{
		return $this->definition; 

	}

	/**
	 * The method to set the value to definition
	 * @param Definition $definition An instance of Definition
	 */
	public function setDefinition(Definition $definition)
	{
		$this->definition=$definition; 
		$this->keyModified['definition'] = 1; 

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
