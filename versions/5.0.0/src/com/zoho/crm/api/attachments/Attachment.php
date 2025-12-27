<?php 
namespace com\zoho\crm\api\attachments;

use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class Attachment implements Model
{

	private  $owner;
	private  $modifiedBy;
	private  $createdBy;
	private  $parentId;
	private  $sharingPermission;
	private  $recordStatusS;
	private  $attachmentType;
	private  $id;
	private  $modifiedTime;
	private  $createdTime;
	private  $fileName;
	private  $size;
	private  $editable;
	private  $fileId;
	private  $type;
	private  $seModule;
	private  $state;
	private  $linkUrl;
	private  $attachmentSourceS;
	private  $fileIdS;
	private  $fieldStates;
	private  $ziaVisions;
	private  $keyModified=array();

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
	public function setOwner(?MinifiedUser $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['Owner'] = 1; 

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
	public function setModifiedBy(?MinifiedUser $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['Modified_By'] = 1; 

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
	public function setCreatedBy(?MinifiedUser $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['Created_By'] = 1; 

	}

	/**
	 * The method to get the parentId
	 * @return ParentId An instance of ParentId
	 */
	public function getParentId()
	{
		return $this->parentId; 

	}

	/**
	 * The method to set the value to parentId
	 * @param ParentId $parentId An instance of ParentId
	 */
	public function setParentId(?ParentId $parentId)
	{
		$this->parentId=$parentId; 
		$this->keyModified['Parent_Id'] = 1; 

	}

	/**
	 * The method to get the sharingPermission
	 * @return string A string representing the sharingPermission
	 */
	public function getSharingPermission()
	{
		return $this->sharingPermission; 

	}

	/**
	 * The method to set the value to sharingPermission
	 * @param string $sharingPermission A string
	 */
	public function setSharingPermission(?string $sharingPermission)
	{
		$this->sharingPermission=$sharingPermission; 
		$this->keyModified['$sharing_permission'] = 1; 

	}

	/**
	 * The method to get the recordStatusS
	 * @return string A string representing the recordStatusS
	 */
	public function getRecordStatusS()
	{
		return $this->recordStatusS; 

	}

	/**
	 * The method to set the value to recordStatusS
	 * @param string $recordStatusS A string
	 */
	public function setRecordStatusS(?string $recordStatusS)
	{
		$this->recordStatusS=$recordStatusS; 
		$this->keyModified['Record_Status__s'] = 1; 

	}

	/**
	 * The method to get the attachmentType
	 * @return int A int representing the attachmentType
	 */
	public function getAttachmentType()
	{
		return $this->attachmentType; 

	}

	/**
	 * The method to set the value to attachmentType
	 * @param int $attachmentType A int
	 */
	public function setAttachmentType(?int $attachmentType)
	{
		$this->attachmentType=$attachmentType; 
		$this->keyModified['$attachment_type'] = 1; 

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
	public function setId(?string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
	public function setModifiedTime(?\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['Modified_Time'] = 1; 

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
	public function setCreatedTime(?\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['Created_Time'] = 1; 

	}

	/**
	 * The method to get the fileName
	 * @return string A string representing the fileName
	 */
	public function getFileName()
	{
		return $this->fileName; 

	}

	/**
	 * The method to set the value to fileName
	 * @param string $fileName A string
	 */
	public function setFileName(?string $fileName)
	{
		$this->fileName=$fileName; 
		$this->keyModified['File_Name'] = 1; 

	}

	/**
	 * The method to get the size
	 * @return string A string representing the size
	 */
	public function getSize()
	{
		return $this->size; 

	}

	/**
	 * The method to set the value to size
	 * @param string $size A string
	 */
	public function setSize(?string $size)
	{
		$this->size=$size; 
		$this->keyModified['Size'] = 1; 

	}

	/**
	 * The method to get the editable
	 * @return bool A bool representing the editable
	 */
	public function getEditable()
	{
		return $this->editable; 

	}

	/**
	 * The method to set the value to editable
	 * @param bool $editable A bool
	 */
	public function setEditable(?bool $editable)
	{
		$this->editable=$editable; 
		$this->keyModified['$editable'] = 1; 

	}

	/**
	 * The method to get the fileId
	 * @return string A string representing the fileId
	 */
	public function getFileId()
	{
		return $this->fileId; 

	}

	/**
	 * The method to set the value to fileId
	 * @param string $fileId A string
	 */
	public function setFileId(?string $fileId)
	{
		$this->fileId=$fileId; 
		$this->keyModified['$file_id'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(?string $type)
	{
		$this->type=$type; 
		$this->keyModified['$type'] = 1; 

	}

	/**
	 * The method to get the seModule
	 * @return string A string representing the seModule
	 */
	public function getSeModule()
	{
		return $this->seModule; 

	}

	/**
	 * The method to set the value to seModule
	 * @param string $seModule A string
	 */
	public function setSeModule(?string $seModule)
	{
		$this->seModule=$seModule; 
		$this->keyModified['$se_module'] = 1; 

	}

	/**
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public function setState(?string $state)
	{
		$this->state=$state; 
		$this->keyModified['$state'] = 1; 

	}

	/**
	 * The method to get the linkUrl
	 * @return string A string representing the linkUrl
	 */
	public function getLinkUrl()
	{
		return $this->linkUrl; 

	}

	/**
	 * The method to set the value to linkUrl
	 * @param string $linkUrl A string
	 */
	public function setLinkUrl(?string $linkUrl)
	{
		$this->linkUrl=$linkUrl; 
		$this->keyModified['$link_url'] = 1; 

	}

	/**
	 * The method to get the attachmentSourceS
	 * @return string A string representing the attachmentSourceS
	 */
	public function getAttachmentSourceS()
	{
		return $this->attachmentSourceS; 

	}

	/**
	 * The method to set the value to attachmentSourceS
	 * @param string $attachmentSourceS A string
	 */
	public function setAttachmentSourceS(?string $attachmentSourceS)
	{
		$this->attachmentSourceS=$attachmentSourceS; 
		$this->keyModified['Attachment_Source__s'] = 1; 

	}

	/**
	 * The method to get the fileIdS
	 * @return string A string representing the fileIdS
	 */
	public function getFileIdS()
	{
		return $this->fileIdS; 

	}

	/**
	 * The method to set the value to fileIdS
	 * @param string $fileIdS A string
	 */
	public function setFileIdS(?string $fileIdS)
	{
		$this->fileIdS=$fileIdS; 
		$this->keyModified['File_Id__s'] = 1; 

	}

	/**
	 * The method to get the fieldStates
	 * @return string A string representing the fieldStates
	 */
	public function getFieldStates()
	{
		return $this->fieldStates; 

	}

	/**
	 * The method to set the value to fieldStates
	 * @param string $fieldStates A string
	 */
	public function setFieldStates(?string $fieldStates)
	{
		$this->fieldStates=$fieldStates; 
		$this->keyModified['$field_states'] = 1; 

	}

	/**
	 * The method to get the ziaVisions
	 * @return string A string representing the ziaVisions
	 */
	public function getZiaVisions()
	{
		return $this->ziaVisions; 

	}

	/**
	 * The method to set the value to ziaVisions
	 * @param string $ziaVisions A string
	 */
	public function setZiaVisions(?string $ziaVisions)
	{
		$this->ziaVisions=$ziaVisions; 
		$this->keyModified['$zia_visions'] = 1; 

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
