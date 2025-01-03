<?php 
namespace com\zoho\crm\api\backup;

use com\zoho\crm\api\util\Model;

class UrlsWrapper implements Model, ResponseHandler
{

	private  $urls;
	private  $keyModified=array();

	/**
	 * The method to get the urls
	 * @return Urls An instance of Urls
	 */
	public function getUrls()
	{
		return $this->urls; 

	}

	/**
	 * The method to set the value to urls
	 * @param Urls $urls An instance of Urls
	 */
	public function setUrls(Urls $urls)
	{
		$this->urls=$urls; 
		$this->keyModified['urls'] = 1; 

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
