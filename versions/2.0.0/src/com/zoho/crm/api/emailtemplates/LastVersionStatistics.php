<?php 
namespace com\zoho\crm\api\emailtemplates;

use com\zoho\crm\api\util\Model;

class LastVersionStatistics implements Model
{

	private  $tracked;
	private  $delivered;
	private  $opened;
	private  $bounced;
	private  $sent;
	private  $clicked;
	private  $keyModified=array();

	/**
	 * The method to get the tracked
	 * @return int A int representing the tracked
	 */
	public function getTracked()
	{
		return $this->tracked; 

	}

	/**
	 * The method to set the value to tracked
	 * @param int $tracked A int
	 */
	public function setTracked(int $tracked)
	{
		$this->tracked=$tracked; 
		$this->keyModified['tracked'] = 1; 

	}

	/**
	 * The method to get the delivered
	 * @return int A int representing the delivered
	 */
	public function getDelivered()
	{
		return $this->delivered; 

	}

	/**
	 * The method to set the value to delivered
	 * @param int $delivered A int
	 */
	public function setDelivered(int $delivered)
	{
		$this->delivered=$delivered; 
		$this->keyModified['delivered'] = 1; 

	}

	/**
	 * The method to get the opened
	 * @return int A int representing the opened
	 */
	public function getOpened()
	{
		return $this->opened; 

	}

	/**
	 * The method to set the value to opened
	 * @param int $opened A int
	 */
	public function setOpened(int $opened)
	{
		$this->opened=$opened; 
		$this->keyModified['opened'] = 1; 

	}

	/**
	 * The method to get the bounced
	 * @return int A int representing the bounced
	 */
	public function getBounced()
	{
		return $this->bounced; 

	}

	/**
	 * The method to set the value to bounced
	 * @param int $bounced A int
	 */
	public function setBounced(int $bounced)
	{
		$this->bounced=$bounced; 
		$this->keyModified['bounced'] = 1; 

	}

	/**
	 * The method to get the sent
	 * @return int A int representing the sent
	 */
	public function getSent()
	{
		return $this->sent; 

	}

	/**
	 * The method to set the value to sent
	 * @param int $sent A int
	 */
	public function setSent(int $sent)
	{
		$this->sent=$sent; 
		$this->keyModified['sent'] = 1; 

	}

	/**
	 * The method to get the clicked
	 * @return int A int representing the clicked
	 */
	public function getClicked()
	{
		return $this->clicked; 

	}

	/**
	 * The method to set the value to clicked
	 * @param int $clicked A int
	 */
	public function setClicked(int $clicked)
	{
		$this->clicked=$clicked; 
		$this->keyModified['clicked'] = 1; 

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
