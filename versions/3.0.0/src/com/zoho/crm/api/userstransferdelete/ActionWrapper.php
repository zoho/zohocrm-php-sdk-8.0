<?php 
namespace com\zoho\crm\api\userstransferdelete;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $transferAndDelete;
	private  $keyModified=array();

	/**
	 * The method to get the transferAndDelete
	 * @return array A array representing the transferAndDelete
	 */
	public function getTransferAndDelete()
	{
		return $this->transferAndDelete; 

	}

	/**
	 * The method to set the value to transferAndDelete
	 * @param array $transferAndDelete A array
	 */
	public function setTransferAndDelete(array $transferAndDelete)
	{
		$this->transferAndDelete=$transferAndDelete; 
		$this->keyModified['transfer_and_delete'] = 1; 

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
