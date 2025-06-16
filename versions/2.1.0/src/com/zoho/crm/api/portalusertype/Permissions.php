<?php 
namespace com\zoho\crm\api\portalusertype;

use com\zoho\crm\api\util\Model;

class Permissions implements Model
{

	private  $view;
	private  $edit;
	private  $editSharedRecords;
	private  $create;
	private  $delete;
	private  $deleteAttachment;
	private  $createAttachment;
	private  $keyModified=array();

	/**
	 * The method to get the view
	 * @return bool A bool representing the view
	 */
	public function getView()
	{
		return $this->view; 

	}

	/**
	 * The method to set the value to view
	 * @param bool $view A bool
	 */
	public function setView(bool $view)
	{
		$this->view=$view; 
		$this->keyModified['view'] = 1; 

	}

	/**
	 * The method to get the edit
	 * @return bool A bool representing the edit
	 */
	public function getEdit()
	{
		return $this->edit; 

	}

	/**
	 * The method to set the value to edit
	 * @param bool $edit A bool
	 */
	public function setEdit(bool $edit)
	{
		$this->edit=$edit; 
		$this->keyModified['edit'] = 1; 

	}

	/**
	 * The method to get the editSharedRecords
	 * @return bool A bool representing the editSharedRecords
	 */
	public function getEditSharedRecords()
	{
		return $this->editSharedRecords; 

	}

	/**
	 * The method to set the value to editSharedRecords
	 * @param bool $editSharedRecords A bool
	 */
	public function setEditSharedRecords(bool $editSharedRecords)
	{
		$this->editSharedRecords=$editSharedRecords; 
		$this->keyModified['edit_shared_records'] = 1; 

	}

	/**
	 * The method to get the create
	 * @return bool A bool representing the create
	 */
	public function getCreate()
	{
		return $this->create; 

	}

	/**
	 * The method to set the value to create
	 * @param bool $create A bool
	 */
	public function setCreate(bool $create)
	{
		$this->create=$create; 
		$this->keyModified['create'] = 1; 

	}

	/**
	 * The method to get the delete
	 * @return bool A bool representing the delete
	 */
	public function getDelete()
	{
		return $this->delete; 

	}

	/**
	 * The method to set the value to delete
	 * @param bool $delete A bool
	 */
	public function setDelete(bool $delete)
	{
		$this->delete=$delete; 
		$this->keyModified['delete'] = 1; 

	}

	/**
	 * The method to get the deleteAttachment
	 * @return bool A bool representing the deleteAttachment
	 */
	public function getDeleteAttachment()
	{
		return $this->deleteAttachment; 

	}

	/**
	 * The method to set the value to deleteAttachment
	 * @param bool $deleteAttachment A bool
	 */
	public function setDeleteAttachment(bool $deleteAttachment)
	{
		$this->deleteAttachment=$deleteAttachment; 
		$this->keyModified['delete_attachment'] = 1; 

	}

	/**
	 * The method to get the createAttachment
	 * @return bool A bool representing the createAttachment
	 */
	public function getCreateAttachment()
	{
		return $this->createAttachment; 

	}

	/**
	 * The method to set the value to createAttachment
	 * @param bool $createAttachment A bool
	 */
	public function setCreateAttachment(bool $createAttachment)
	{
		$this->createAttachment=$createAttachment; 
		$this->keyModified['create_attachment'] = 1; 

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
