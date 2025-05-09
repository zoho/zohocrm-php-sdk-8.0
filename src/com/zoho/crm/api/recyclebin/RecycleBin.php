<?php 
namespace com\zoho\crm\api\recyclebin;

use com\zoho\crm\api\modules\MinifiedModule;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class RecycleBin implements Model
{

	private  $displayName;
	private  $deletedTime;
	private  $owner;
	private  $module;
	private  $deletedBy;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the displayName
	 * @return string A string representing the displayName
	 */
	public function getDisplayName()
	{
		return $this->displayName; 

	}

	/**
	 * The method to set the value to displayName
	 * @param string $displayName A string
	 */
	public function setDisplayName(string $displayName)
	{
		$this->displayName=$displayName; 
		$this->keyModified['display_name'] = 1; 

	}

	/**
	 * The method to get the deletedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getDeletedTime()
	{
		return $this->deletedTime; 

	}

	/**
	 * The method to set the value to deletedTime
	 * @param \DateTime $deletedTime An instance of \DateTime
	 */
	public function setDeletedTime(\DateTime $deletedTime)
	{
		$this->deletedTime=$deletedTime; 
		$this->keyModified['deleted_time'] = 1; 

	}

	/**
	 * The method to get the owner
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getOwner()
	{
		return $this->owner; 

	}

	/**
	 * The method to set the value to owner
	 * @param MinifiedUser $owner An instance of MinifiedUser
	 */
	public function setOwner(MinifiedUser $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['owner'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return MinifiedModule An instance of MinifiedModule
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param MinifiedModule $module An instance of MinifiedModule
	 */
	public function setModule(MinifiedModule $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the deletedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getDeletedBy()
	{
		return $this->deletedBy; 

	}

	/**
	 * The method to set the value to deletedBy
	 * @param MinifiedUser $deletedBy An instance of MinifiedUser
	 */
	public function setDeletedBy(MinifiedUser $deletedBy)
	{
		$this->deletedBy=$deletedBy; 
		$this->keyModified['deleted_by'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
