<?php 
namespace com\zoho\crm\api\signals;

use com\zoho\crm\api\util\Model;

class FeatureAvailability implements Model
{

	private  $scoring;
	private  $signals;
	private  $keyModified=array();

	/**
	 * The method to get the scoring
	 * @return bool A bool representing the scoring
	 */
	public function getScoring()
	{
		return $this->scoring; 

	}

	/**
	 * The method to set the value to scoring
	 * @param bool $scoring A bool
	 */
	public function setScoring(?bool $scoring)
	{
		$this->scoring=$scoring; 
		$this->keyModified['scoring'] = 1; 

	}

	/**
	 * The method to get the signals
	 * @return bool A bool representing the signals
	 */
	public function getSignals()
	{
		return $this->signals; 

	}

	/**
	 * The method to set the value to signals
	 * @param bool $signals A bool
	 */
	public function setSignals(?bool $signals)
	{
		$this->signals=$signals; 
		$this->keyModified['signals'] = 1; 

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
