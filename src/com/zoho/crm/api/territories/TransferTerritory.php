<?php 
namespace com\zoho\crm\api\territories;

use com\zoho\crm\api\util\Model;

class TransferTerritory implements Model
{

	private  $id;
	private  $transferToId;
	private  $deletePreviousForecasts;
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
	 * The method to get the transferToId
	 * @return string A string representing the transferToId
	 */
	public function getTransferToId()
	{
		return $this->transferToId; 

	}

	/**
	 * The method to set the value to transferToId
	 * @param string $transferToId A string
	 */
	public function setTransferToId(string $transferToId)
	{
		$this->transferToId=$transferToId; 
		$this->keyModified['transfer_to_id'] = 1; 

	}

	/**
	 * The method to get the deletePreviousForecasts
	 * @return bool A bool representing the deletePreviousForecasts
	 */
	public function getDeletePreviousForecasts()
	{
		return $this->deletePreviousForecasts; 

	}

	/**
	 * The method to set the value to deletePreviousForecasts
	 * @param bool $deletePreviousForecasts A bool
	 */
	public function setDeletePreviousForecasts(bool $deletePreviousForecasts)
	{
		$this->deletePreviousForecasts=$deletePreviousForecasts; 
		$this->keyModified['delete_previous_forecasts'] = 1; 

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
