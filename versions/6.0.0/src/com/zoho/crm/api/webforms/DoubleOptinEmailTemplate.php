<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class DoubleOptinEmailTemplate implements Model
{

	private  $fromAddress;
	private  $content;
	private  $keyModified=array();

	/**
	 * The method to get the fromAddress
	 * @return FromAddress An instance of FromAddress
	 */
	public function getFromAddress()
	{
		return $this->fromAddress; 

	}

	/**
	 * The method to set the value to fromAddress
	 * @param FromAddress $fromAddress An instance of FromAddress
	 */
	public function setFromAddress(?FromAddress $fromAddress)
	{
		$this->fromAddress=$fromAddress; 
		$this->keyModified['from_address'] = 1; 

	}

	/**
	 * The method to get the content
	 * @return string A string representing the content
	 */
	public function getContent()
	{
		return $this->content; 

	}

	/**
	 * The method to set the value to content
	 * @param string $content A string
	 */
	public function setContent(?string $content)
	{
		$this->content=$content; 
		$this->keyModified['content'] = 1; 

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
