<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class SourcesCountWrapper implements Model, ResponseHandler
{

	private  $sourcesCount;
	private  $keyModified=array();

	/**
	 * The method to get the sourcesCount
	 * @return array A array representing the sourcesCount
	 */
	public function getSourcesCount()
	{
		return $this->sourcesCount; 

	}

	/**
	 * The method to set the value to sourcesCount
	 * @param array $sourcesCount A array
	 */
	public function setSourcesCount(array $sourcesCount)
	{
		$this->sourcesCount=$sourcesCount; 
		$this->keyModified['sources_count'] = 1; 

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
