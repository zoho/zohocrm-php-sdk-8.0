<?php 
namespace com\zoho\crm\api\emailcompose;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class EmailCompose implements Model
{

	private  $defaultFromAddress;
	private  $defaultReplytoAddress;
	private  $font;
	private  $type;
	private  $keyModified=array();

	/**
	 * The method to get the defaultFromAddress
	 * @return DefaultFromAddress An instance of DefaultFromAddress
	 */
	public function getDefaultFromAddress()
	{
		return $this->defaultFromAddress; 

	}

	/**
	 * The method to set the value to defaultFromAddress
	 * @param DefaultFromAddress $defaultFromAddress An instance of DefaultFromAddress
	 */
	public function setDefaultFromAddress(?DefaultFromAddress $defaultFromAddress)
	{
		$this->defaultFromAddress=$defaultFromAddress; 
		$this->keyModified['default_from_address'] = 1; 

	}

	/**
	 * The method to get the defaultReplytoAddress
	 * @return DefaultReplytoAddress An instance of DefaultReplytoAddress
	 */
	public function getDefaultReplytoAddress()
	{
		return $this->defaultReplytoAddress; 

	}

	/**
	 * The method to set the value to defaultReplytoAddress
	 * @param DefaultReplytoAddress $defaultReplytoAddress An instance of DefaultReplytoAddress
	 */
	public function setDefaultReplytoAddress(?DefaultReplytoAddress $defaultReplytoAddress)
	{
		$this->defaultReplytoAddress=$defaultReplytoAddress; 
		$this->keyModified['default_replyto_address'] = 1; 

	}

	/**
	 * The method to get the font
	 * @return Font An instance of Font
	 */
	public function getFont()
	{
		return $this->font; 

	}

	/**
	 * The method to set the value to font
	 * @param Font $font An instance of Font
	 */
	public function setFont(?Font $font)
	{
		$this->font=$font; 
		$this->keyModified['font'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return Choice An instance of Choice
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param Choice $type An instance of Choice
	 */
	public function setType(?Choice $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

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
