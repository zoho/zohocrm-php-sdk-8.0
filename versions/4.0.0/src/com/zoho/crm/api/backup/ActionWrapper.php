<?php 
namespace com\zoho\crm\api\backup;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $backup;
	private  $keyModified=array();

	/**
	 * The method to get the backup
	 * @return ActionResponse An instance of ActionResponse
	 */
	public function getBackup()
	{
		return $this->backup; 

	}

	/**
	 * The method to set the value to backup
	 * @param ActionResponse $backup An instance of ActionResponse
	 */
	public function setBackup(ActionResponse $backup)
	{
		$this->backup=$backup; 
		$this->keyModified['backup'] = 1; 

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
