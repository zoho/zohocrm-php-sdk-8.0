<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class SourcesWrapper implements Model, ResponseHandler
{

	private  $sources;
	private  $info;
	private  $keyModified=array();

	/**
	 * The method to get the sources
	 * @return array A array representing the sources
	 */
	public function getSources()
	{
		return $this->sources; 

	}

	/**
	 * The method to set the value to sources
	 * @param array $sources A array
	 */
	public function setSources(array $sources)
	{
		$this->sources=$sources; 
		$this->keyModified['sources'] = 1; 

	}

	/**
	 * The method to get the info
	 * @return Info An instance of Info
	 */
	public function getInfo()
	{
		return $this->info; 

	}

	/**
	 * The method to set the value to info
	 * @param Info $info An instance of Info
	 */
	public function setInfo(Info $info)
	{
		$this->info=$info; 
		$this->keyModified['info'] = 1; 

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
