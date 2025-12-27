<?php 
namespace com\zoho\crm\api\ziaorgenrichment;

use com\zoho\crm\api\util\Model;

class SocialMedia implements Model
{

	private  $mediaType;
	private  $mediaUrl;
	private  $keyModified=array();

	/**
	 * The method to get the mediaType
	 * @return string A string representing the mediaType
	 */
	public function getMediaType()
	{
		return $this->mediaType; 

	}

	/**
	 * The method to set the value to mediaType
	 * @param string $mediaType A string
	 */
	public function setMediaType(?string $mediaType)
	{
		$this->mediaType=$mediaType; 
		$this->keyModified['media_type'] = 1; 

	}

	/**
	 * The method to get the mediaUrl
	 * @return array A array representing the mediaUrl
	 */
	public function getMediaUrl()
	{
		return $this->mediaUrl; 

	}

	/**
	 * The method to set the value to mediaUrl
	 * @param array $mediaUrl A array
	 */
	public function setMediaUrl(?array $mediaUrl)
	{
		$this->mediaUrl=$mediaUrl; 
		$this->keyModified['media_url'] = 1; 

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
