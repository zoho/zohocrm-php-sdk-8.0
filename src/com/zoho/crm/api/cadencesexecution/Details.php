<?php 
namespace com\zoho\crm\api\cadencesexecution;

use com\zoho\crm\api\util\Model;

class Details implements Model
{

	private  $name;
	private  $template;
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
	public function setName(?string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the template
	 * @return Template An instance of Template
	 */
	public function getTemplate()
	{
		return $this->template; 

	}

	/**
	 * The method to set the value to template
	 * @param Template $template An instance of Template
	 */
	public function setTemplate(?Template $template)
	{
		$this->template=$template; 
		$this->keyModified['template'] = 1; 

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
