<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class JobsWrapper implements Model
{

	private  $deletionJobs;
	private  $keyModified=array();

	/**
	 * The method to get the deletionJobs
	 * @return array A array representing the deletionJobs
	 */
	public function getDeletionJobs()
	{
		return $this->deletionJobs; 

	}

	/**
	 * The method to set the value to deletionJobs
	 * @param array $deletionJobs A array
	 */
	public function setDeletionJobs(array $deletionJobs)
	{
		$this->deletionJobs=$deletionJobs; 
		$this->keyModified['deletion_jobs'] = 1; 

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
