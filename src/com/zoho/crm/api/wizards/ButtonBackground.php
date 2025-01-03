<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class ButtonBackground implements Model
{

	private  $buttonBackground;
	private  $keyModified=array();

	/**
	 * The method to get the buttonBackground
	 * @return array A array representing the buttonBackground
	 */
	public function getButtonBackground()
	{
		return $this->buttonBackground; 

	}

	/**
	 * The method to set the value to buttonBackground
	 * @param array $buttonBackground A array
	 */
	public function setButtonBackground(array $buttonBackground)
	{
		$this->buttonBackground=$buttonBackground; 
		$this->keyModified['button_background'] = 1; 

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
