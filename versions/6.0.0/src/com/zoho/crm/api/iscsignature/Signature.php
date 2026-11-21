<?php 
namespace com\zoho\crm\api\iscsignature;

use com\zoho\crm\api\util\Model;

class Signature implements Model
{

	private  $iscSignature;
	private  $keyModified=array();

	/**
	 * The method to get the iscSignature
	 */
	public function getIscSignature()
	{
		return $this->iscSignature; 

	}

	/**
	 * The method to set the value to iscSignature
	 * @param 
	 */
	public function setIscSignature( $iscSignature)
	{
		$this->iscSignature=$iscSignature; 
		$this->keyModified['isc_signature'] = 1; 

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
