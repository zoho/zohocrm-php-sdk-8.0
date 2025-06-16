<?php 
namespace com\zoho\crm\api\apis;

use com\zoho\crm\api\util\Model;

class OperationTypes implements Model
{

	private  $method;
	private  $oauthScope;
	private  $maxCredits;
	private  $minCredits;
	private  $keyModified=array();

	/**
	 * The method to get the method
	 * @return string A string representing the method
	 */
	public function getMethod()
	{
		return $this->method; 

	}

	/**
	 * The method to set the value to method
	 * @param string $method A string
	 */
	public function setMethod(string $method)
	{
		$this->method=$method; 
		$this->keyModified['method'] = 1; 

	}

	/**
	 * The method to get the oauthScope
	 * @return string A string representing the oauthScope
	 */
	public function getOauthScope()
	{
		return $this->oauthScope; 

	}

	/**
	 * The method to set the value to oauthScope
	 * @param string $oauthScope A string
	 */
	public function setOauthScope(string $oauthScope)
	{
		$this->oauthScope=$oauthScope; 
		$this->keyModified['oauth_scope'] = 1; 

	}

	/**
	 * The method to get the maxCredits
	 * @return int A int representing the maxCredits
	 */
	public function getMaxCredits()
	{
		return $this->maxCredits; 

	}

	/**
	 * The method to set the value to maxCredits
	 * @param int $maxCredits A int
	 */
	public function setMaxCredits(int $maxCredits)
	{
		$this->maxCredits=$maxCredits; 
		$this->keyModified['max_credits'] = 1; 

	}

	/**
	 * The method to get the minCredits
	 * @return int A int representing the minCredits
	 */
	public function getMinCredits()
	{
		return $this->minCredits; 

	}

	/**
	 * The method to set the value to minCredits
	 * @param int $minCredits A int
	 */
	public function setMinCredits(int $minCredits)
	{
		$this->minCredits=$minCredits; 
		$this->keyModified['min_credits'] = 1; 

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
