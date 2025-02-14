<?php 
namespace com\zoho\crm\api\privacypreference;

use com\zoho\crm\api\util\Model;

class Tpt implements Model
{

	private  $isenabled;
	private  $name;
	private  $issupported;
	private  $keyModified=array();

	/**
	 * The method to get the isenabled
	 * @return string A string representing the isenabled
	 */
	public function getIsenabled()
	{
		return $this->isenabled; 

	}

	/**
	 * The method to set the value to isenabled
	 * @param string $isenabled A string
	 */
	public function setIsenabled(string $isenabled)
	{
		$this->isenabled=$isenabled; 
		$this->keyModified['isEnabled'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the issupported
	 * @return string A string representing the issupported
	 */
	public function getIssupported()
	{
		return $this->issupported; 

	}

	/**
	 * The method to set the value to issupported
	 * @param string $issupported A string
	 */
	public function setIssupported(string $issupported)
	{
		$this->issupported=$issupported; 
		$this->keyModified['isSupported'] = 1; 

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
