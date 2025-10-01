<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Sources implements Model
{

	private  $type;
	private  $source;
	private  $subordinates;
	private  $subTerritories;
	private  $keyModified=array();

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
	 * The method to get the source
	 * @return Source An instance of Source
	 */
	public function getSource()
	{
		return $this->source; 

	}

	/**
	 * The method to set the value to source
	 * @param Source $source An instance of Source
	 */
	public function setSource(Source $source)
	{
		$this->source=$source; 
		$this->keyModified['source'] = 1; 

	}

	/**
	 * The method to get the subordinates
	 * @return bool A bool representing the subordinates
	 */
	public function getSubordinates()
	{
		return $this->subordinates; 

	}

	/**
	 * The method to set the value to subordinates
	 * @param bool $subordinates A bool
	 */
	public function setSubordinates(bool $subordinates)
	{
		$this->subordinates=$subordinates; 
		$this->keyModified['subordinates'] = 1; 

	}

	/**
	 * The method to get the subTerritories
	 * @return bool A bool representing the subTerritories
	 */
	public function getSubTerritories()
	{
		return $this->subTerritories; 

	}

	/**
	 * The method to set the value to subTerritories
	 * @param bool $subTerritories A bool
	 */
	public function setSubTerritories(bool $subTerritories)
	{
		$this->subTerritories=$subTerritories; 
		$this->keyModified['sub_territories'] = 1; 

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
