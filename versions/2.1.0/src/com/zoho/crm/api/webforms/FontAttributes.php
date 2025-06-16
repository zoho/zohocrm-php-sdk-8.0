<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class FontAttributes implements Model
{

	private  $size;
	private  $color;
	private  $family;
	private  $keyModified=array();

	/**
	 * The method to get the size
	 * @return int A int representing the size
	 */
	public function getSize()
	{
		return $this->size; 

	}

	/**
	 * The method to set the value to size
	 * @param int $size A int
	 */
	public function setSize(int $size)
	{
		$this->size=$size; 
		$this->keyModified['size'] = 1; 

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
	public function setColor(string $color)
	{
		$this->color=$color; 
		$this->keyModified['color'] = 1; 

	}

	/**
	 * The method to get the family
	 * @return string A string representing the family
	 */
	public function getFamily()
	{
		return $this->family; 

	}

	/**
	 * The method to set the value to family
	 * @param string $family A string
	 */
	public function setFamily(string $family)
	{
		$this->family=$family; 
		$this->keyModified['family'] = 1; 

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
