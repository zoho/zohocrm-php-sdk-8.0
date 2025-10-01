<?php 
namespace com\zoho\crm\api\org;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class HierarchyPreferences implements Model
{

	private  $type;
	private  $strictlyReporting;
	private  $keyModified=array();

	/**
	 * The method to get the type
	 * @return Choice An instance of Choice
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param Choice $type An instance of Choice
	 */
	public function setType(Choice $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the strictlyReporting
	 * @return bool A bool representing the strictlyReporting
	 */
	public function getStrictlyReporting()
	{
		return $this->strictlyReporting; 

	}

	/**
	 * The method to set the value to strictlyReporting
	 * @param bool $strictlyReporting A bool
	 */
	public function setStrictlyReporting(bool $strictlyReporting)
	{
		$this->strictlyReporting=$strictlyReporting; 
		$this->keyModified['strictly_reporting'] = 1; 

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
