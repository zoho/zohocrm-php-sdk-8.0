<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\modules\Modules;
use com\zoho\crm\api\profiles\Profile;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class Wizard implements Model
{

	private  $createdTime;
	private  $modifiedTime;
	private  $module;
	private  $name;
	private  $modifiedBy;
	private  $profiles;
	private  $active;
	private  $containers;
	private  $id;
	private  $createdBy;
	private  $portalUserTypes;
	private  $exemptedPortalUserTypes;
	private  $parentWizard;
	private  $draft;
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
	 * The method to get the module
	 * @return Modules An instance of Modules
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Modules $module An instance of Modules
	 */
	public function setModule(Modules $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
	 * The method to get the modifiedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param MinifiedUser $modifiedBy An instance of MinifiedUser
	 */
	public function setModifiedBy(MinifiedUser $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the profiles
	 * @return array A array representing the profiles
	 */
	public function getProfiles()
	{
		return $this->profiles; 

	}

	/**
	 * The method to set the value to profiles
	 * @param array $profiles A array
	 */
	public function setProfiles(array $profiles)
	{
		$this->profiles=$profiles; 
		$this->keyModified['profiles'] = 1; 

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
	 * The method to get the containers
	 * @return array A array representing the containers
	 */
	public function getContainers()
	{
		return $this->containers; 

	}

	/**
	 * The method to set the value to containers
	 * @param array $containers A array
	 */
	public function setContainers(array $containers)
	{
		$this->containers=$containers; 
		$this->keyModified['containers'] = 1; 

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
	 * The method to get the createdBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param MinifiedUser $createdBy An instance of MinifiedUser
	 */
	public function setCreatedBy(MinifiedUser $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the portalUserTypes
	 * @return array A array representing the portalUserTypes
	 */
	public function getPortalUserTypes()
	{
		return $this->portalUserTypes; 

	}

	/**
	 * The method to set the value to portalUserTypes
	 * @param array $portalUserTypes A array
	 */
	public function setPortalUserTypes(array $portalUserTypes)
	{
		$this->portalUserTypes=$portalUserTypes; 
		$this->keyModified['portal_user_types'] = 1; 

	}

	/**
	 * The method to get the exemptedPortalUserTypes
	 * @return array A array representing the exemptedPortalUserTypes
	 */
	public function getExemptedPortalUserTypes()
	{
		return $this->exemptedPortalUserTypes; 

	}

	/**
	 * The method to set the value to exemptedPortalUserTypes
	 * @param array $exemptedPortalUserTypes A array
	 */
	public function setExemptedPortalUserTypes(array $exemptedPortalUserTypes)
	{
		$this->exemptedPortalUserTypes=$exemptedPortalUserTypes; 
		$this->keyModified['exempted_portal_user_types'] = 1; 

	}

	/**
	 * The method to get the parentWizard
	 * @return Wizard An instance of Wizard
	 */
	public function getParentWizard()
	{
		return $this->parentWizard; 

	}

	/**
	 * The method to set the value to parentWizard
	 * @param Wizard $parentWizard An instance of Wizard
	 */
	public function setParentWizard(Wizard $parentWizard)
	{
		$this->parentWizard=$parentWizard; 
		$this->keyModified['parent_wizard'] = 1; 

	}

	/**
	 * The method to get the draft
	 * @return bool A bool representing the draft
	 */
	public function getDraft()
	{
		return $this->draft; 

	}

	/**
	 * The method to set the value to draft
	 * @param bool $draft A bool
	 */
	public function setDraft(bool $draft)
	{
		$this->draft=$draft; 
		$this->keyModified['draft'] = 1; 

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
