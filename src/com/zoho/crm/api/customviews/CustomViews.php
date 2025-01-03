<?php 
namespace com\zoho\crm\api\customviews;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class CustomViews implements Model
{

	private  $displayValue;
	private  $systemName;
	private  $category;
	private  $createdTime;
	private  $modifiedTime;
	private  $lastAccessedTime;
	private  $name;
	private  $createdBy;
	private  $modifiedBy;
	private  $module;
	private  $criteria;
	private  $default;
	private  $systemDefined;
	private  $locked;
	private  $favorite;
	private  $offline;
	private  $accessType;
	private  $sharedTo;
	private  $fields;
	private  $sortBy;
	private  $sortOrder;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the displayValue
	 * @return string A string representing the displayValue
	 */
	public function getDisplayValue()
	{
		return $this->displayValue; 

	}

	/**
	 * The method to set the value to displayValue
	 * @param string $displayValue A string
	 */
	public function setDisplayValue(string $displayValue)
	{
		$this->displayValue=$displayValue; 
		$this->keyModified['display_value'] = 1; 

	}

	/**
	 * The method to get the systemName
	 * @return string A string representing the systemName
	 */
	public function getSystemName()
	{
		return $this->systemName; 

	}

	/**
	 * The method to set the value to systemName
	 * @param string $systemName A string
	 */
	public function setSystemName(string $systemName)
	{
		$this->systemName=$systemName; 
		$this->keyModified['system_name'] = 1; 

	}

	/**
	 * The method to get the category
	 * @return string A string representing the category
	 */
	public function getCategory()
	{
		return $this->category; 

	}

	/**
	 * The method to set the value to category
	 * @param string $category A string
	 */
	public function setCategory(string $category)
	{
		$this->category=$category; 
		$this->keyModified['category'] = 1; 

	}

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
	 * The method to get the lastAccessedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getLastAccessedTime()
	{
		return $this->lastAccessedTime; 

	}

	/**
	 * The method to set the value to lastAccessedTime
	 * @param \DateTime $lastAccessedTime An instance of \DateTime
	 */
	public function setLastAccessedTime(\DateTime $lastAccessedTime)
	{
		$this->lastAccessedTime=$lastAccessedTime; 
		$this->keyModified['last_accessed_time'] = 1; 

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
	 * The method to get the module
	 * @return Owner An instance of Owner
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Owner $module An instance of Owner
	 */
	public function setModule(Owner $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
	 * The method to get the default
	 * @return bool A bool representing the default
	 */
	public function getDefault()
	{
		return $this->default; 

	}

	/**
	 * The method to set the value to default
	 * @param bool $default A bool
	 */
	public function setDefault(bool $default)
	{
		$this->default=$default; 
		$this->keyModified['default'] = 1; 

	}

	/**
	 * The method to get the systemDefined
	 * @return bool A bool representing the systemDefined
	 */
	public function getSystemDefined()
	{
		return $this->systemDefined; 

	}

	/**
	 * The method to set the value to systemDefined
	 * @param bool $systemDefined A bool
	 */
	public function setSystemDefined(bool $systemDefined)
	{
		$this->systemDefined=$systemDefined; 
		$this->keyModified['system_defined'] = 1; 

	}

	/**
	 * The method to get the locked
	 * @return bool A bool representing the locked
	 */
	public function getLocked()
	{
		return $this->locked; 

	}

	/**
	 * The method to set the value to locked
	 * @param bool $locked A bool
	 */
	public function setLocked(bool $locked)
	{
		$this->locked=$locked; 
		$this->keyModified['locked'] = 1; 

	}

	/**
	 * The method to get the favorite
	 * @return int A int representing the favorite
	 */
	public function getFavorite()
	{
		return $this->favorite; 

	}

	/**
	 * The method to set the value to favorite
	 * @param int $favorite A int
	 */
	public function setFavorite(int $favorite)
	{
		$this->favorite=$favorite; 
		$this->keyModified['favorite'] = 1; 

	}

	/**
	 * The method to get the offline
	 * @return bool A bool representing the offline
	 */
	public function getOffline()
	{
		return $this->offline; 

	}

	/**
	 * The method to set the value to offline
	 * @param bool $offline A bool
	 */
	public function setOffline(bool $offline)
	{
		$this->offline=$offline; 
		$this->keyModified['offline'] = 1; 

	}

	/**
	 * The method to get the accessType
	 * @return Choice An instance of Choice
	 */
	public function getAccessType()
	{
		return $this->accessType; 

	}

	/**
	 * The method to set the value to accessType
	 * @param Choice $accessType An instance of Choice
	 */
	public function setAccessType(Choice $accessType)
	{
		$this->accessType=$accessType; 
		$this->keyModified['access_type'] = 1; 

	}

	/**
	 * The method to get the sharedTo
	 * @return array A array representing the sharedTo
	 */
	public function getSharedTo()
	{
		return $this->sharedTo; 

	}

	/**
	 * The method to set the value to sharedTo
	 * @param array $sharedTo A array
	 */
	public function setSharedTo(array $sharedTo)
	{
		$this->sharedTo=$sharedTo; 
		$this->keyModified['shared_to'] = 1; 

	}

	/**
	 * The method to get the fields
	 * @return array A array representing the fields
	 */
	public function getFields()
	{
		return $this->fields; 

	}

	/**
	 * The method to set the value to fields
	 * @param array $fields A array
	 */
	public function setFields(array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the sortBy
	 * @return SortBy An instance of SortBy
	 */
	public function getSortBy()
	{
		return $this->sortBy; 

	}

	/**
	 * The method to set the value to sortBy
	 * @param SortBy $sortBy An instance of SortBy
	 */
	public function setSortBy(SortBy $sortBy)
	{
		$this->sortBy=$sortBy; 
		$this->keyModified['sort_by'] = 1; 

	}

	/**
	 * The method to get the sortOrder
	 * @return Choice An instance of Choice
	 */
	public function getSortOrder()
	{
		return $this->sortOrder; 

	}

	/**
	 * The method to set the value to sortOrder
	 * @param Choice $sortOrder An instance of Choice
	 */
	public function setSortOrder(Choice $sortOrder)
	{
		$this->sortOrder=$sortOrder; 
		$this->keyModified['sort_order'] = 1; 

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
