<?php 
namespace com\zoho\crm\api\associateemail;

use com\zoho\crm\api\util\Model;

class Available implements Model
{

	private  $available;
	private  $record;
	private  $linkedRecord;
	private  $keyModified=array();

	/**
	 * The method to get the available
	 * @return bool A bool representing the available
	 */
	public function getAvailable()
	{
		return $this->available; 

	}

	/**
	 * The method to set the value to available
	 * @param bool $available A bool
	 */
	public function setAvailable(bool $available)
	{
		$this->available=$available; 
		$this->keyModified['available'] = 1; 

	}

	/**
	 * The method to get the record
	 * @return Record An instance of Record
	 */
	public function getRecord()
	{
		return $this->record; 

	}

	/**
	 * The method to set the value to record
	 * @param Record $record An instance of Record
	 */
	public function setRecord(Record $record)
	{
		$this->record=$record; 
		$this->keyModified['record'] = 1; 

	}

	/**
	 * The method to get the linkedRecord
	 * @return LinkedRecord An instance of LinkedRecord
	 */
	public function getLinkedRecord()
	{
		return $this->linkedRecord; 

	}

	/**
	 * The method to set the value to linkedRecord
	 * @param LinkedRecord $linkedRecord An instance of LinkedRecord
	 */
	public function setLinkedRecord(LinkedRecord $linkedRecord)
	{
		$this->linkedRecord=$linkedRecord; 
		$this->keyModified['linked_record'] = 1; 

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
