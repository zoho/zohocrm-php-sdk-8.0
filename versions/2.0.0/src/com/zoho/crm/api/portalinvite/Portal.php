<?php 
namespace com\zoho\crm\api\portalinvite;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Portal implements Model
{

	private  $id;
	private  $userTypeId;
	private  $type;
	private  $language;
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
	 * The method to get the userTypeId
	 * @return string A string representing the userTypeId
	 */
	public function getUserTypeId()
	{
		return $this->userTypeId; 

	}

	/**
	 * The method to set the value to userTypeId
	 * @param string $userTypeId A string
	 */
	public function setUserTypeId(string $userTypeId)
	{
		$this->userTypeId=$userTypeId; 
		$this->keyModified['user_type_id'] = 1; 

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
	 * The method to get the language
	 * @return Choice An instance of Choice
	 */
	public function getLanguage()
	{
		return $this->language; 

	}

	/**
	 * The method to set the value to language
	 * @param Choice $language An instance of Choice
	 */
	public function setLanguage(Choice $language)
	{
		$this->language=$language; 
		$this->keyModified['language'] = 1; 

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
