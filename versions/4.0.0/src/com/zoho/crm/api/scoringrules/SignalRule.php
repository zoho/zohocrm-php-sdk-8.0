<?php 
namespace com\zoho\crm\api\scoringrules;

use com\zoho\crm\api\util\Model;

class SignalRule implements Model
{

	private  $score;
	private  $signal;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the score
	 * @return int A int representing the score
	 */
	public function getScore()
	{
		return $this->score; 

	}

	/**
	 * The method to set the value to score
	 * @param int $score A int
	 */
	public function setScore(int $score)
	{
		$this->score=$score; 
		$this->keyModified['score'] = 1; 

	}

	/**
	 * The method to get the signal
	 * @return Signal An instance of Signal
	 */
	public function getSignal()
	{
		return $this->signal; 

	}

	/**
	 * The method to set the value to signal
	 * @param Signal $signal An instance of Signal
	 */
	public function setSignal(Signal $signal)
	{
		$this->signal=$signal; 
		$this->keyModified['signal'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
