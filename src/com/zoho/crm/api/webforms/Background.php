<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class Background implements Model
{

	private  $imageName;
	private  $color;
	private  $keyModified=array();

	/**
	 * The method to get the imageName
	 * @return string A string representing the imageName
	 */
	public function getImageName()
	{
		return $this->imageName; 

	}

	/**
	 * The method to set the value to imageName
	 * @param string $imageName A string
	 */
	public function setImageName(?string $imageName)
	{
		$this->imageName=$imageName; 
		$this->keyModified['image_name'] = 1; 

	}

	/**
	 * The method to get the color
	 * @return string A string representing the color
	 */
	public function getColor()
	{
		return $this->color; 

	}

	/**
	 * The method to set the value to color
	 * @param string $color A string
	 */
	public function setColor(?string $color)
	{
		$this->color=$color; 
		$this->keyModified['color'] = 1; 

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
