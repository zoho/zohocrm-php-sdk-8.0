<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\util\Model;

class State implements Model
{

	private  $triggerType;
	private  $name;
	private  $isLastState;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the triggerType
	 * @return string A string representing the triggerType
	 */
	public function getTriggerType()
	{
		return $this->triggerType; 

	}

	/**
	 * The method to set the value to triggerType
	 * @param string $triggerType A string
	 */
	public function setTriggerType(string $triggerType)
	{
		$this->triggerType=$triggerType; 
		$this->keyModified['trigger_type'] = 1; 

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
	 * The method to get the isLastState
	 * @return bool A bool representing the isLastState
	 */
	public function getIsLastState()
	{
		return $this->isLastState; 

	}

	/**
	 * The method to set the value to isLastState
	 * @param bool $isLastState A bool
	 */
	public function setIsLastState(bool $isLastState)
	{
		$this->isLastState=$isLastState; 
		$this->keyModified['is_last_state'] = 1; 

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
