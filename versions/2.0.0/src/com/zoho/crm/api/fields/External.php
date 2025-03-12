<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class External implements Model
{

	private  $show;
	private  $type;
	private  $allowMultipleConfig;
	private  $keyModified=array();

	/**
	 * The method to get the show
	 * @return bool A bool representing the show
	 */
	public function getShow()
	{
		return $this->show; 

	}

	/**
	 * The method to set the value to show
	 * @param bool $show A bool
	 */
	public function setShow(bool $show)
	{
		$this->show=$show; 
		$this->keyModified['show'] = 1; 

	}

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
	 * The method to get the allowMultipleConfig
	 * @return bool A bool representing the allowMultipleConfig
	 */
	public function getAllowMultipleConfig()
	{
		return $this->allowMultipleConfig; 

	}

	/**
	 * The method to set the value to allowMultipleConfig
	 * @param bool $allowMultipleConfig A bool
	 */
	public function setAllowMultipleConfig(bool $allowMultipleConfig)
	{
		$this->allowMultipleConfig=$allowMultipleConfig; 
		$this->keyModified['allow_multiple_config'] = 1; 

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
