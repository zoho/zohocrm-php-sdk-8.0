<?php 
namespace com\zoho\crm\api\sharingrules;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class SharingRules implements Model
{

	private  $id;
	private  $permissionType;
	private  $superiorsAllowed;
	private  $name;
	private  $type;
	private  $sharedFrom;
	private  $sharedTo;
	private  $criteria;
	private  $module;
	private  $status;
	private  $matchLimitExceeded;
	private  $keyModified=array();

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
	 * The method to get the permissionType
	 * @return Choice An instance of Choice
	 */
	public function getPermissionType()
	{
		return $this->permissionType; 

	}

	/**
	 * The method to set the value to permissionType
	 * @param Choice $permissionType An instance of Choice
	 */
	public function setPermissionType(Choice $permissionType)
	{
		$this->permissionType=$permissionType; 
		$this->keyModified['permission_type'] = 1; 

	}

	/**
	 * The method to get the superiorsAllowed
	 * @return bool A bool representing the superiorsAllowed
	 */
	public function getSuperiorsAllowed()
	{
		return $this->superiorsAllowed; 

	}

	/**
	 * The method to set the value to superiorsAllowed
	 * @param bool $superiorsAllowed A bool
	 */
	public function setSuperiorsAllowed(bool $superiorsAllowed)
	{
		$this->superiorsAllowed=$superiorsAllowed; 
		$this->keyModified['superiors_allowed'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

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
	 * The method to get the sharedFrom
	 * @return Shared An instance of Shared
	 */
	public function getSharedFrom()
	{
		return $this->sharedFrom; 

	}

	/**
	 * The method to set the value to sharedFrom
	 * @param Shared $sharedFrom An instance of Shared
	 */
	public function setSharedFrom(Shared $sharedFrom)
	{
		$this->sharedFrom=$sharedFrom; 
		$this->keyModified['shared_from'] = 1; 

	}

	/**
	 * The method to get the sharedTo
	 * @return Shared An instance of Shared
	 */
	public function getSharedTo()
	{
		return $this->sharedTo; 

	}

	/**
	 * The method to set the value to sharedTo
	 * @param Shared $sharedTo An instance of Shared
	 */
	public function setSharedTo(Shared $sharedTo)
	{
		$this->sharedTo=$sharedTo; 
		$this->keyModified['shared_to'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return Criteria An instance of Criteria
	 */
	public function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param Criteria $criteria An instance of Criteria
	 */
	public function setCriteria(Criteria $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return Module An instance of Module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Module $module An instance of Module
	 */
	public function setModule(Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the status
	 * @return Choice An instance of Choice
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param Choice $status An instance of Choice
	 */
	public function setStatus(Choice $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

	/**
	 * The method to get the matchLimitExceeded
	 * @return bool A bool representing the matchLimitExceeded
	 */
	public function getMatchLimitExceeded()
	{
		return $this->matchLimitExceeded; 

	}

	/**
	 * The method to set the value to matchLimitExceeded
	 * @param bool $matchLimitExceeded A bool
	 */
	public function setMatchLimitExceeded(bool $matchLimitExceeded)
	{
		$this->matchLimitExceeded=$matchLimitExceeded; 
		$this->keyModified['match_limit_exceeded'] = 1; 

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
