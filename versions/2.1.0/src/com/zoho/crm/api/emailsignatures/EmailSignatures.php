<?php 
namespace com\zoho\crm\api\emailsignatures;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class EmailSignatures implements Model
{

	private  $name;
	private  $from;
	private  $editorMode;
	private  $id;
	private  $content;
	private  $keyModified=array();

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
	 * The method to get the from
	 * @return array A array representing the from
	 */
	public function getFrom()
	{
		return $this->from; 

	}

	/**
	 * The method to set the value to from
	 * @param array $from A array
	 */
	public function setFrom(array $from)
	{
		$this->from=$from; 
		$this->keyModified['from'] = 1; 

	}

	/**
	 * The method to get the editorMode
	 * @return Choice An instance of Choice
	 */
	public function getEditorMode()
	{
		return $this->editorMode; 

	}

	/**
	 * The method to set the value to editorMode
	 * @param Choice $editorMode An instance of Choice
	 */
	public function setEditorMode(Choice $editorMode)
	{
		$this->editorMode=$editorMode; 
		$this->keyModified['editor_mode'] = 1; 

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
