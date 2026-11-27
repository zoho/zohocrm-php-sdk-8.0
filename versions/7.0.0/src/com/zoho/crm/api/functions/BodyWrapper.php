<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $body;
	private  $keyModified=array();

	/**
	 * The method to get the body
	 * @return array A array representing the body
	 */
	public function getBody()
	{
		return $this->body; 

	}

	/**
	 * The method to set the value to body
	 * @param array $body A array
	 */
	public function setBody(?array $body)
	{
		$this->body=$body; 
		$this->keyModified['body'] = 1; 

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
