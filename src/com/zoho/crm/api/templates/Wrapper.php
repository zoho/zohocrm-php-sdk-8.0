<?php 
namespace com\zoho\crm\api\templates;

use com\zoho\crm\api\util\Model;

class Wrapper implements Model
{

	private  $templates;
	private  $keyModified=array();

	/**
	 * The method to get the templates
	 * @return array A array representing the templates
	 */
	public function getTemplates()
	{
		return $this->templates; 

	}

	/**
	 * The method to set the value to templates
	 * @param array $templates A array
	 */
	public function setTemplates(array $templates)
	{
		$this->templates=$templates; 
		$this->keyModified['templates'] = 1; 

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
