<?php 
namespace com\zoho\crm\api\portals;

use com\zoho\crm\api\util\Model;

class Portals implements Model
{

	private  $createdTime;
	private  $modifiedTime;
	private  $modifiedBy;
	private  $createdBy;
	private  $zaid;
	private  $name;
	private  $active;
	private  $keyModified=array();

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return Owner An instance of Owner
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param Owner $modifiedBy An instance of Owner
	 */
	public function setModifiedBy(Owner $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return Owner An instance of Owner
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param Owner $createdBy An instance of Owner
	 */
	public function setCreatedBy(Owner $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the zaid
	 * @return string A string representing the zaid
	 */
	public function getZaid()
	{
		return $this->zaid; 

	}

	/**
	 * The method to set the value to zaid
	 * @param string $zaid A string
	 */
	public function setZaid(string $zaid)
	{
		$this->zaid=$zaid; 
		$this->keyModified['zaid'] = 1; 

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
	 * The method to get the active
	 * @return bool A bool representing the active
	 */
	public function getActive()
	{
		return $this->active; 

	}

	/**
	 * The method to set the value to active
	 * @param bool $active A bool
	 */
	public function setActive(bool $active)
	{
		$this->active=$active; 
		$this->keyModified['active'] = 1; 

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
