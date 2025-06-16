<?php 
namespace com\zoho\crm\api\userstransferdelete;

use com\zoho\crm\api\util\Model;

class TransferAndDelete implements Model
{

	private  $id;
	private  $transfer;
	private  $moveSubordinate;
	private  $keyModified=array();

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
	 * The method to get the transfer
	 * @return Transfer An instance of Transfer
	 */
	public function getTransfer()
	{
		return $this->transfer; 

	}

	/**
	 * The method to set the value to transfer
	 * @param Transfer $transfer An instance of Transfer
	 */
	public function setTransfer(Transfer $transfer)
	{
		$this->transfer=$transfer; 
		$this->keyModified['transfer'] = 1; 

	}

	/**
	 * The method to get the moveSubordinate
	 * @return MoveSubordinate An instance of MoveSubordinate
	 */
	public function getMoveSubordinate()
	{
		return $this->moveSubordinate; 

	}

	/**
	 * The method to set the value to moveSubordinate
	 * @param MoveSubordinate $moveSubordinate An instance of MoveSubordinate
	 */
	public function setMoveSubordinate(MoveSubordinate $moveSubordinate)
	{
		$this->moveSubordinate=$moveSubordinate; 
		$this->keyModified['move_subordinate'] = 1; 

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
