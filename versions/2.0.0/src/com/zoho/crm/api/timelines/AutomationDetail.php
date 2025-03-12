<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\util\Model;

class AutomationDetail implements Model
{

	private  $type;
	private  $rule;
	private  $pathfinder;
	private  $keyModified=array();

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
	public function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the rule
	 * @return NameIdStructure An instance of NameIdStructure
	 */
	public function getRule()
	{
		return $this->rule; 

	}

	/**
	 * The method to set the value to rule
	 * @param NameIdStructure $rule An instance of NameIdStructure
	 */
	public function setRule(NameIdStructure $rule)
	{
		$this->rule=$rule; 
		$this->keyModified['rule'] = 1; 

	}

	/**
	 * The method to get the pathfinder
	 * @return PathFinder An instance of PathFinder
	 */
	public function getPathfinder()
	{
		return $this->pathfinder; 

	}

	/**
	 * The method to set the value to pathfinder
	 * @param PathFinder $pathfinder An instance of PathFinder
	 */
	public function setPathfinder(PathFinder $pathfinder)
	{
		$this->pathfinder=$pathfinder; 
		$this->keyModified['pathfinder'] = 1; 

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
