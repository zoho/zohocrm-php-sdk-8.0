<?php 
namespace com\zoho\crm\api\templates;

use com\zoho\crm\api\util\Model;

class Templates implements Model
{

	private  $folder;
	private  $modifiedBy;
	private  $module;
	private  $modifiedTime;
	private  $subject;
	private  $name;
	private  $consentLinked;
	private  $favourite;
	private  $attachmentPresent;
	private  $id;
	private  $keyModified=array();

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
	 * The method to get the modifiedBy
	 * @return Folder An instance of Folder
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param Folder $modifiedBy An instance of Folder
	 */
	public function setModifiedBy(Folder $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return string A string representing the module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param string $module A string
	 */
	public function setModule(string $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
	 * The method to get the subject
	 * @return string A string representing the subject
	 */
	public function getSubject()
	{
		return $this->subject; 

	}

	/**
	 * The method to set the value to subject
	 * @param string $subject A string
	 */
	public function setSubject(string $subject)
	{
		$this->subject=$subject; 
		$this->keyModified['subject'] = 1; 

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
	 * The method to get the consentLinked
	 * @return bool A bool representing the consentLinked
	 */
	public function getConsentLinked()
	{
		return $this->consentLinked; 

	}

	/**
	 * The method to set the value to consentLinked
	 * @param bool $consentLinked A bool
	 */
	public function setConsentLinked(bool $consentLinked)
	{
		$this->consentLinked=$consentLinked; 
		$this->keyModified['consent_linked'] = 1; 

	}

	/**
	 * The method to get the favourite
	 * @return bool A bool representing the favourite
	 */
	public function getFavourite()
	{
		return $this->favourite; 

	}

	/**
	 * The method to set the value to favourite
	 * @param bool $favourite A bool
	 */
	public function setFavourite(bool $favourite)
	{
		$this->favourite=$favourite; 
		$this->keyModified['favourite'] = 1; 

	}

	/**
	 * The method to get the attachmentPresent
	 * @return bool A bool representing the attachmentPresent
	 */
	public function getAttachmentPresent()
	{
		return $this->attachmentPresent; 

	}

	/**
	 * The method to set the value to attachmentPresent
	 * @param bool $attachmentPresent A bool
	 */
	public function setAttachmentPresent(bool $attachmentPresent)
	{
		$this->attachmentPresent=$attachmentPresent; 
		$this->keyModified['attachment_present'] = 1; 

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
