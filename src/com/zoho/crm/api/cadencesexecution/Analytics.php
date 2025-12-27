<?php 
namespace com\zoho\crm\api\cadencesexecution;

use com\zoho\crm\api\util\Model;

class Analytics implements Model
{

	private  $analytics;
	private  $parentFollowUp;
	private  $action;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the analytics
	 * @return array A array representing the analytics
	 */
	public function getAnalytics()
	{
		return $this->analytics; 

	}

	/**
	 * The method to set the value to analytics
	 * @param array $analytics A array
	 */
	public function setAnalytics(?array $analytics)
	{
		$this->analytics=$analytics; 
		$this->keyModified['analytics'] = 1; 

	}

	/**
	 * The method to get the parentFollowUp
	 * @return ParentFollowUp An instance of ParentFollowUp
	 */
	public function getParentFollowUp()
	{
		return $this->parentFollowUp; 

	}

	/**
	 * The method to set the value to parentFollowUp
	 * @param ParentFollowUp $parentFollowUp An instance of ParentFollowUp
	 */
	public function setParentFollowUp(?ParentFollowUp $parentFollowUp)
	{
		$this->parentFollowUp=$parentFollowUp; 
		$this->keyModified['parent_follow_up'] = 1; 

	}

	/**
	 * The method to get the action
	 * @return Action An instance of Action
	 */
	public function getAction()
	{
		return $this->action; 

	}

	/**
	 * The method to set the value to action
	 * @param Action $action An instance of Action
	 */
	public function setAction(?Action $action)
	{
		$this->action=$action; 
		$this->keyModified['action'] = 1; 

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
