<?php 
namespace com\zoho\crm\api\changeowner;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $owner;
	private  $notify;
	private  $relatedModules;
	private  $keyModified=array();

	/**
	 * The method to get the owner
	 * @return Owner An instance of Owner
	 */
	public function getOwner()
	{
		return $this->owner; 

	}

	/**
	 * The method to set the value to owner
	 * @param Owner $owner An instance of Owner
	 */
	public function setOwner(Owner $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['owner'] = 1; 

	}

	/**
	 * The method to get the notify
	 * @return bool A bool representing the notify
	 */
	public function getNotify()
	{
		return $this->notify; 

	}

	/**
	 * The method to set the value to notify
	 * @param bool $notify A bool
	 */
	public function setNotify(bool $notify)
	{
		$this->notify=$notify; 
		$this->keyModified['notify'] = 1; 

	}

	/**
	 * The method to get the relatedModules
	 * @return array A array representing the relatedModules
	 */
	public function getRelatedModules()
	{
		return $this->relatedModules; 

	}

	/**
	 * The method to set the value to relatedModules
	 * @param array $relatedModules A array
	 */
	public function setRelatedModules(array $relatedModules)
	{
		$this->relatedModules=$relatedModules; 
		$this->keyModified['related_modules'] = 1; 

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
