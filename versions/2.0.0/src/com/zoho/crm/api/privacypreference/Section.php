<?php 
namespace com\zoho\crm\api\privacypreference;

use com\zoho\crm\api\util\Model;

class Section implements Model
{

	private  $name;
	private  $tooltip;
	private  $showType;
	private  $title;
	private  $options;
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
	 * The method to get the tooltip
	 * @return string A string representing the tooltip
	 */
	public function getTooltip()
	{
		return $this->tooltip; 

	}

	/**
	 * The method to set the value to tooltip
	 * @param string $tooltip A string
	 */
	public function setTooltip(string $tooltip)
	{
		$this->tooltip=$tooltip; 
		$this->keyModified['tooltip'] = 1; 

	}

	/**
	 * The method to get the showType
	 * @return string A string representing the showType
	 */
	public function getShowType()
	{
		return $this->showType; 

	}

	/**
	 * The method to set the value to showType
	 * @param string $showType A string
	 */
	public function setShowType(string $showType)
	{
		$this->showType=$showType; 
		$this->keyModified['show_type'] = 1; 

	}

	/**
	 * The method to get the title
	 * @return string A string representing the title
	 */
	public function getTitle()
	{
		return $this->title; 

	}

	/**
	 * The method to set the value to title
	 * @param string $title A string
	 */
	public function setTitle(string $title)
	{
		$this->title=$title; 
		$this->keyModified['title'] = 1; 

	}

	/**
	 * The method to get the options
	 * @return array A array representing the options
	 */
	public function getOptions()
	{
		return $this->options; 

	}

	/**
	 * The method to set the value to options
	 * @param array $options A array
	 */
	public function setOptions(array $options)
	{
		$this->options=$options; 
		$this->keyModified['options'] = 1; 

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
