<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class Social implements Model
{

	private  $twitter;
	private  $facebook;
	private  $linkedin;
	private  $keyModified=array();

	/**
	 * The method to get the twitter
	 * @return string A string representing the twitter
	 */
	public function getTwitter()
	{
		return $this->twitter; 

	}

	/**
	 * The method to set the value to twitter
	 * @param string $twitter A string
	 */
	public function setTwitter(string $twitter)
	{
		$this->twitter=$twitter; 
		$this->keyModified['twitter'] = 1; 

	}

	/**
	 * The method to get the facebook
	 * @return string A string representing the facebook
	 */
	public function getFacebook()
	{
		return $this->facebook; 

	}

	/**
	 * The method to set the value to facebook
	 * @param string $facebook A string
	 */
	public function setFacebook(string $facebook)
	{
		$this->facebook=$facebook; 
		$this->keyModified['facebook'] = 1; 

	}

	/**
	 * The method to get the linkedin
	 * @return string A string representing the linkedin
	 */
	public function getLinkedin()
	{
		return $this->linkedin; 

	}

	/**
	 * The method to set the value to linkedin
	 * @param string $linkedin A string
	 */
	public function setLinkedin(string $linkedin)
	{
		$this->linkedin=$linkedin; 
		$this->keyModified['linkedin'] = 1; 

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
