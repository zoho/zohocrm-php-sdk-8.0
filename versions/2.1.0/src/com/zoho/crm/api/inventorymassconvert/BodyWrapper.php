<?php 
namespace com\zoho\crm\api\inventorymassconvert;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $convertTo;
	private  $assignTo;
	private  $relatedModules;
	private  $ids;
	private  $keyModified=array();

	/**
	 * The method to get the convertTo
	 * @return array A array representing the convertTo
	 */
	public function getConvertTo()
	{
		return $this->convertTo; 

	}

	/**
	 * The method to set the value to convertTo
	 * @param array $convertTo A array
	 */
	public function setConvertTo(array $convertTo)
	{
		$this->convertTo=$convertTo; 
		$this->keyModified['convert_to'] = 1; 

	}

	/**
	 * The method to get the assignTo
	 * @return User An instance of User
	 */
	public function getAssignTo()
	{
		return $this->assignTo; 

	}

	/**
	 * The method to set the value to assignTo
	 * @param User $assignTo An instance of User
	 */
	public function setAssignTo(User $assignTo)
	{
		$this->assignTo=$assignTo; 
		$this->keyModified['assign_to'] = 1; 

	}

	/**
	 * The method to get the relatedModules
	 * @return array A array representing the relatedModules
	 */
	public function getRelatedModules()
	{
		return $this->relatedModules; 

	}

	/**
	 * The method to set the value to relatedModules
	 * @param array $relatedModules A array
	 */
	public function setRelatedModules(array $relatedModules)
	{
		$this->relatedModules=$relatedModules; 
		$this->keyModified['related_modules'] = 1; 

	}

	/**
	 * The method to get the ids
	 * @return array A array representing the ids
	 */
	public function getIds()
	{
		return $this->ids; 

	}

	/**
	 * The method to set the value to ids
	 * @param array $ids A array
	 */
	public function setIds(array $ids)
	{
		$this->ids=$ids; 
		$this->keyModified['ids'] = 1; 

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
