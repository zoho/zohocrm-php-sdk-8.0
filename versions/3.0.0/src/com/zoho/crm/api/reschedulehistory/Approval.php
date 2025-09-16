<?php 
namespace com\zoho\crm\api\reschedulehistory;

use com\zoho\crm\api\util\Model;

class Approval implements Model
{

	private  $delegate;
	private  $approve;
	private  $reject;
	private  $resubmit;
	private  $keyModified=array();

	/**
	 * The method to get the delegate
	 * @return bool A bool representing the delegate
	 */
	public function getDelegate()
	{
		return $this->delegate; 

	}

	/**
	 * The method to set the value to delegate
	 * @param bool $delegate A bool
	 */
	public function setDelegate(bool $delegate)
	{
		$this->delegate=$delegate; 
		$this->keyModified['delegate'] = 1; 

	}

	/**
	 * The method to get the approve
	 * @return bool A bool representing the approve
	 */
	public function getApprove()
	{
		return $this->approve; 

	}

	/**
	 * The method to set the value to approve
	 * @param bool $approve A bool
	 */
	public function setApprove(bool $approve)
	{
		$this->approve=$approve; 
		$this->keyModified['approve'] = 1; 

	}

	/**
	 * The method to get the reject
	 * @return bool A bool representing the reject
	 */
	public function getReject()
	{
		return $this->reject; 

	}

	/**
	 * The method to set the value to reject
	 * @param bool $reject A bool
	 */
	public function setReject(bool $reject)
	{
		$this->reject=$reject; 
		$this->keyModified['reject'] = 1; 

	}

	/**
	 * The method to get the resubmit
	 * @return bool A bool representing the resubmit
	 */
	public function getResubmit()
	{
		return $this->resubmit; 

	}

	/**
	 * The method to set the value to resubmit
	 * @param bool $resubmit A bool
	 */
	public function setResubmit(bool $resubmit)
	{
		$this->resubmit=$resubmit; 
		$this->keyModified['resubmit'] = 1; 

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
