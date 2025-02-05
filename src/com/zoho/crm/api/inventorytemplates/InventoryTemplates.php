<?php 
namespace com\zoho\crm\api\inventorytemplates;

use com\zoho\crm\api\sendmail\Template;
use com\zoho\crm\api\util\Model;

class InventoryTemplates implements Model, Template
{

	private  $createdTime;
	private  $modifiedTime;
	private  $lastUsageTime;
	private  $folder;
	private  $module;
	private  $createdBy;
	private  $modifiedBy;
	private  $name;
	private  $id;
	private  $editorMode;
	private  $category;
	private  $favorite;
	private  $content;
	private  $active;
	private  $mailContent;
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
	 * The method to get the lastUsageTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getLastUsageTime()
	{
		return $this->lastUsageTime; 

	}

	/**
	 * The method to set the value to lastUsageTime
	 * @param \DateTime $lastUsageTime An instance of \DateTime
	 */
	public function setLastUsageTime(\DateTime $lastUsageTime)
	{
		$this->lastUsageTime=$lastUsageTime; 
		$this->keyModified['last_usage_time'] = 1; 

	}

	/**
	 * The method to get the folder
	 * @return Folder An instance of Folder
	 */
	public function getFolder()
	{
		return $this->folder; 

	}

	/**
	 * The method to set the value to folder
	 * @param Folder $folder An instance of Folder
	 */
	public function setFolder(Folder $folder)
	{
		$this->folder=$folder; 
		$this->keyModified['folder'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return ModuleMap An instance of ModuleMap
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param ModuleMap $module An instance of ModuleMap
	 */
	public function setModule(ModuleMap $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public function setCreatedBy(User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public function setModifiedBy(User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

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
	 * The method to get the editorMode
	 * @return string A string representing the editorMode
	 */
	public function getEditorMode()
	{
		return $this->editorMode; 

	}

	/**
	 * The method to set the value to editorMode
	 * @param string $editorMode A string
	 */
	public function setEditorMode(string $editorMode)
	{
		$this->editorMode=$editorMode; 
		$this->keyModified['editor_mode'] = 1; 

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
	 * The method to get the favorite
	 * @return bool A bool representing the favorite
	 */
	public function getFavorite()
	{
		return $this->favorite; 

	}

	/**
	 * The method to set the value to favorite
	 * @param bool $favorite A bool
	 */
	public function setFavorite(bool $favorite)
	{
		$this->favorite=$favorite; 
		$this->keyModified['favorite'] = 1; 

	}

	/**
	 * The method to get the content
	 * @return string A string representing the content
	 */
	public function getContent()
	{
		return $this->content; 

	}

	/**
	 * The method to set the value to content
	 * @param string $content A string
	 */
	public function setContent(string $content)
	{
		$this->content=$content; 
		$this->keyModified['content'] = 1; 

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
	 * The method to get the mailContent
	 * @return string A string representing the mailContent
	 */
	public function getMailContent()
	{
		return $this->mailContent; 

	}

	/**
	 * The method to set the value to mailContent
	 * @param string $mailContent A string
	 */
	public function setMailContent(string $mailContent)
	{
		$this->mailContent=$mailContent; 
		$this->keyModified['mail_content'] = 1; 

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
