<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class Logo implements Model
{

	private  $imageName;
	private  $align;
	private  $size;
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
	 * The method to get the align
	 * @return string A string representing the align
	 */
	public function getAlign()
	{
		return $this->align; 

	}

	/**
	 * The method to set the value to align
	 * @param string $align A string
	 */
	public function setAlign(?string $align)
	{
		$this->align=$align; 
		$this->keyModified['align'] = 1; 

	}

	/**
	 * The method to get the size
	 * @return string A string representing the size
	 */
	public function getSize()
	{
		return $this->size; 

	}

	/**
	 * The method to set the value to size
	 * @param string $size A string
	 */
	public function setSize(?string $size)
	{
		$this->size=$size; 
		$this->keyModified['size'] = 1; 

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
