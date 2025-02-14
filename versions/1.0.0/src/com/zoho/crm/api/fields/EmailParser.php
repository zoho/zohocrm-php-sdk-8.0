<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class EmailParser implements Model
{

	private  $fieldsUpdateSupported;
	private  $recordOperationsSupported;
	private  $keyModified=array();

	/**
	 * The method to get the fieldsUpdateSupported
	 * @return bool A bool representing the fieldsUpdateSupported
	 */
	public function getFieldsUpdateSupported()
	{
		return $this->fieldsUpdateSupported; 

	}

	/**
	 * The method to set the value to fieldsUpdateSupported
	 * @param bool $fieldsUpdateSupported A bool
	 */
	public function setFieldsUpdateSupported(bool $fieldsUpdateSupported)
	{
		$this->fieldsUpdateSupported=$fieldsUpdateSupported; 
		$this->keyModified['fields_update_supported'] = 1; 

	}

	/**
	 * The method to get the recordOperationsSupported
	 * @return bool A bool representing the recordOperationsSupported
	 */
	public function getRecordOperationsSupported()
	{
		return $this->recordOperationsSupported; 

	}

	/**
	 * The method to set the value to recordOperationsSupported
	 * @param bool $recordOperationsSupported A bool
	 */
	public function setRecordOperationsSupported(bool $recordOperationsSupported)
	{
		$this->recordOperationsSupported=$recordOperationsSupported; 
		$this->keyModified['record_operations_supported'] = 1; 

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
