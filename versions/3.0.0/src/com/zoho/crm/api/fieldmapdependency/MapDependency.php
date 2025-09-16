<?php 
namespace com\zoho\crm\api\fieldmapdependency;

use com\zoho\crm\api\util\Model;

class MapDependency implements Model
{

	private  $parent;
	private  $child;
	private  $pickListValues;
	private  $internal;
	private  $active;
	private  $id;
	private  $source;
	private  $category;
	private  $subModule;
	private  $keyModified=array();

	/**
	 * The method to get the parent
	 * @return Parent1 An instance of Parent1
	 */
	public function getParent()
	{
		return $this->parent; 

	}

	/**
	 * The method to set the value to parent
	 * @param Parent1 $parent An instance of Parent1
	 */
	public function setParent(Parent1 $parent)
	{
		$this->parent=$parent; 
		$this->keyModified['parent'] = 1; 

	}

	/**
	 * The method to get the child
	 * @return Child An instance of Child
	 */
	public function getChild()
	{
		return $this->child; 

	}

	/**
	 * The method to set the value to child
	 * @param Child $child An instance of Child
	 */
	public function setChild(Child $child)
	{
		$this->child=$child; 
		$this->keyModified['child'] = 1; 

	}

	/**
	 * The method to get the pickListValues
	 * @return array A array representing the pickListValues
	 */
	public function getPickListValues()
	{
		return $this->pickListValues; 

	}

	/**
	 * The method to set the value to pickListValues
	 * @param array $pickListValues A array
	 */
	public function setPickListValues(array $pickListValues)
	{
		$this->pickListValues=$pickListValues; 
		$this->keyModified['pick_list_values'] = 1; 

	}

	/**
	 * The method to get the internal
	 * @return bool A bool representing the internal
	 */
	public function getInternal()
	{
		return $this->internal; 

	}

	/**
	 * The method to set the value to internal
	 * @param bool $internal A bool
	 */
	public function setInternal(bool $internal)
	{
		$this->internal=$internal; 
		$this->keyModified['internal'] = 1; 

	}

	/**
	 * The method to get the active
	 * @return bool A bool representing the active
	 */
	public function getActive()
	{
		return $this->active; 

	}

	/**
	 * The method to set the value to active
	 * @param bool $active A bool
	 */
	public function setActive(bool $active)
	{
		$this->active=$active; 
		$this->keyModified['active'] = 1; 

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
	 * The method to get the source
	 * @return int A int representing the source
	 */
	public function getSource()
	{
		return $this->source; 

	}

	/**
	 * The method to set the value to source
	 * @param int $source A int
	 */
	public function setSource(int $source)
	{
		$this->source=$source; 
		$this->keyModified['source'] = 1; 

	}

	/**
	 * The method to get the category
	 * @return int A int representing the category
	 */
	public function getCategory()
	{
		return $this->category; 

	}

	/**
	 * The method to set the value to category
	 * @param int $category A int
	 */
	public function setCategory(int $category)
	{
		$this->category=$category; 
		$this->keyModified['category'] = 1; 

	}

	/**
	 * The method to get the subModule
	 * @return SubModule An instance of SubModule
	 */
	public function getSubModule()
	{
		return $this->subModule; 

	}

	/**
	 * The method to set the value to subModule
	 * @param SubModule $subModule An instance of SubModule
	 */
	public function setSubModule(SubModule $subModule)
	{
		$this->subModule=$subModule; 
		$this->keyModified['sub_module'] = 1; 

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
