<?php 
namespace com\zoho\crm\api\mailmerge;

use com\zoho\crm\api\util\Model;

class SignMailMergeWrapper implements Model
{

	private  $signMailMerge;
	private  $keyModified=array();

	/**
	 * The method to get the signMailMerge
	 * @return array A array representing the signMailMerge
	 */
	public function getSignMailMerge()
	{
		return $this->signMailMerge; 

	}

	/**
	 * The method to set the value to signMailMerge
	 * @param array $signMailMerge A array
	 */
	public function setSignMailMerge(array $signMailMerge)
	{
		$this->signMailMerge=$signMailMerge; 
		$this->keyModified['sign_mail_merge'] = 1; 

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
