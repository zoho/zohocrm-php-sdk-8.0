<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class Connection implements Model
{

	private  $sourceButton;
	private  $targetScreen;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the sourceButton
	 * @return Button An instance of Button
	 */
	public function getSourceButton()
	{
		return $this->sourceButton; 

	}

	/**
	 * The method to set the value to sourceButton
	 * @param Button $sourceButton An instance of Button
	 */
	public function setSourceButton(Button $sourceButton)
	{
		$this->sourceButton=$sourceButton; 
		$this->keyModified['source_button'] = 1; 

	}

	/**
	 * The method to get the targetScreen
	 * @return Screen An instance of Screen
	 */
	public function getTargetScreen()
	{
		return $this->targetScreen; 

	}

	/**
	 * The method to set the value to targetScreen
	 * @param Screen $targetScreen An instance of Screen
	 */
	public function setTargetScreen(Screen $targetScreen)
	{
		$this->targetScreen=$targetScreen; 
		$this->keyModified['target_screen'] = 1; 

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
