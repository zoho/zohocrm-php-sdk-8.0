<?php 
namespace com\zoho\crm\api\hipaacompliance;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model
{

	private  $hipaaCompliance;
	private  $keyModified=array();

	/**
	 * The method to get the hipaaCompliance
	 * @return ActionResponse An instance of ActionResponse
	 */
	public function getHipaaCompliance()
	{
		return $this->hipaaCompliance; 

	}

	/**
	 * The method to set the value to hipaaCompliance
	 * @param ActionResponse $hipaaCompliance An instance of ActionResponse
	 */
	public function setHipaaCompliance(ActionResponse $hipaaCompliance)
	{
		$this->hipaaCompliance=$hipaaCompliance; 
		$this->keyModified['hipaa_compliance'] = 1; 

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
