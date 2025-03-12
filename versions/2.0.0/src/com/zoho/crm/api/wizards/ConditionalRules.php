<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class ConditionalRules implements Model
{

	private  $queryId;
	private  $executeOn;
	private  $criteria;
	private  $actions;
	private  $keyModified=array();

	/**
	 * The method to get the queryId
	 * @return string A string representing the queryId
	 */
	public function getQueryId()
	{
		return $this->queryId; 

	}

	/**
	 * The method to set the value to queryId
	 * @param string $queryId A string
	 */
	public function setQueryId(string $queryId)
	{
		$this->queryId=$queryId; 
		$this->keyModified['query_id'] = 1; 

	}

	/**
	 * The method to get the executeOn
	 * @return Choice An instance of Choice
	 */
	public function getExecuteOn()
	{
		return $this->executeOn; 

	}

	/**
	 * The method to set the value to executeOn
	 * @param Choice $executeOn An instance of Choice
	 */
	public function setExecuteOn(Choice $executeOn)
	{
		$this->executeOn=$executeOn; 
		$this->keyModified['execute_on'] = 1; 

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
	 * The method to get the actions
	 * @return array A array representing the actions
	 */
	public function getActions()
	{
		return $this->actions; 

	}

	/**
	 * The method to set the value to actions
	 * @param array $actions A array
	 */
	public function setActions(array $actions)
	{
		$this->actions=$actions; 
		$this->keyModified['actions'] = 1; 

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
