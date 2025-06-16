<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\util\Model;

class PathFinder implements Model
{

	private  $processEntry;
	private  $processExit;
	private  $state;
	private  $keyModified=array();

	/**
	 * The method to get the processEntry
	 * @return bool A bool representing the processEntry
	 */
	public function getProcessEntry()
	{
		return $this->processEntry; 

	}

	/**
	 * The method to set the value to processEntry
	 * @param bool $processEntry A bool
	 */
	public function setProcessEntry(bool $processEntry)
	{
		$this->processEntry=$processEntry; 
		$this->keyModified['process_entry'] = 1; 

	}

	/**
	 * The method to get the processExit
	 * @return bool A bool representing the processExit
	 */
	public function getProcessExit()
	{
		return $this->processExit; 

	}

	/**
	 * The method to set the value to processExit
	 * @param bool $processExit A bool
	 */
	public function setProcessExit(bool $processExit)
	{
		$this->processExit=$processExit; 
		$this->keyModified['process_exit'] = 1; 

	}

	/**
	 * The method to get the state
	 * @return State An instance of State
	 */
	public function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param State $state An instance of State
	 */
	public function setState(State $state)
	{
		$this->state=$state; 
		$this->keyModified['state'] = 1; 

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
