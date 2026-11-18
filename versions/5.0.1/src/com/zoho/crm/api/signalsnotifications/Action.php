<?php 
namespace com\zoho\crm\api\signalsnotifications;

use com\zoho\crm\api\util\Model;

class Action implements Model
{

	private  $type;
	private  $openIn;
	private  $displayName;
	private  $url;
	private  $keyModified=array();

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(?string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the openIn
	 * @return string A string representing the openIn
	 */
	public function getOpenIn()
	{
		return $this->openIn; 

	}

	/**
	 * The method to set the value to openIn
	 * @param string $openIn A string
	 */
	public function setOpenIn(?string $openIn)
	{
		$this->openIn=$openIn; 
		$this->keyModified['open_in'] = 1; 

	}

	/**
	 * The method to get the displayName
	 * @return string A string representing the displayName
	 */
	public function getDisplayName()
	{
		return $this->displayName; 

	}

	/**
	 * The method to set the value to displayName
	 * @param string $displayName A string
	 */
	public function setDisplayName(?string $displayName)
	{
		$this->displayName=$displayName; 
		$this->keyModified['display_name'] = 1; 

	}

	/**
	 * The method to get the url
	 * @return string A string representing the url
	 */
	public function getUrl()
	{
		return $this->url; 

	}

	/**
	 * The method to set the value to url
	 * @param string $url A string
	 */
	public function setUrl(?string $url)
	{
		$this->url=$url; 
		$this->keyModified['url'] = 1; 

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
