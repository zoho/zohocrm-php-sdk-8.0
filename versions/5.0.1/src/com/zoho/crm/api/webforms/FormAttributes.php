<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class FormAttributes implements Model
{

	private  $color;
	private  $width;
	private  $fontAttributes;
	private  $align;
	private  $logo;
	private  $background;
	private  $displayFormName;
	private  $keyModified=array();

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
	 * The method to get the width
	 * @return int A int representing the width
	 */
	public function getWidth()
	{
		return $this->width; 

	}

	/**
	 * The method to set the value to width
	 * @param int $width A int
	 */
	public function setWidth(?int $width)
	{
		$this->width=$width; 
		$this->keyModified['width'] = 1; 

	}

	/**
	 * The method to get the fontAttributes
	 * @return FontAttributes An instance of FontAttributes
	 */
	public function getFontAttributes()
	{
		return $this->fontAttributes; 

	}

	/**
	 * The method to set the value to fontAttributes
	 * @param FontAttributes $fontAttributes An instance of FontAttributes
	 */
	public function setFontAttributes(?FontAttributes $fontAttributes)
	{
		$this->fontAttributes=$fontAttributes; 
		$this->keyModified['font_attributes'] = 1; 

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
	 * The method to get the logo
	 * @return Logo An instance of Logo
	 */
	public function getLogo()
	{
		return $this->logo; 

	}

	/**
	 * The method to set the value to logo
	 * @param Logo $logo An instance of Logo
	 */
	public function setLogo(?Logo $logo)
	{
		$this->logo=$logo; 
		$this->keyModified['logo'] = 1; 

	}

	/**
	 * The method to get the background
	 * @return Background An instance of Background
	 */
	public function getBackground()
	{
		return $this->background; 

	}

	/**
	 * The method to set the value to background
	 * @param Background $background An instance of Background
	 */
	public function setBackground(?Background $background)
	{
		$this->background=$background; 
		$this->keyModified['background'] = 1; 

	}

	/**
	 * The method to get the displayFormName
	 * @return bool A bool representing the displayFormName
	 */
	public function getDisplayFormName()
	{
		return $this->displayFormName; 

	}

	/**
	 * The method to set the value to displayFormName
	 * @param bool $displayFormName A bool
	 */
	public function setDisplayFormName(?bool $displayFormName)
	{
		$this->displayFormName=$displayFormName; 
		$this->keyModified['display_form_name'] = 1; 

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
