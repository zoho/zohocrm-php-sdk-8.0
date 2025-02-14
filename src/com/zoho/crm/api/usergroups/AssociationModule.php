<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\modules\MinifiedModule;
use com\zoho\crm\api\util\Model;

class AssociationModule implements Model
{

	private  $module;
	private  $keyModified=array();

	/**
	 * The method to get the module
	 * @return MinifiedModule An instance of MinifiedModule
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param MinifiedModule $module An instance of MinifiedModule
	 */
	public function setModule(MinifiedModule $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
