<?php 
namespace com\zoho\crm\api\emaildrafts;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class InventoryDetails implements Model
{

	private  $inventoryTemplate;
	private  $record;
	private  $paperType;
	private  $viewType;
	private  $keyModified=array();

	/**
	 * The method to get the inventoryTemplate
	 * @return InventoryTemplate An instance of InventoryTemplate
	 */
	public function getInventoryTemplate()
	{
		return $this->inventoryTemplate; 

	}

	/**
	 * The method to set the value to inventoryTemplate
	 * @param InventoryTemplate $inventoryTemplate An instance of InventoryTemplate
	 */
	public function setInventoryTemplate(InventoryTemplate $inventoryTemplate)
	{
		$this->inventoryTemplate=$inventoryTemplate; 
		$this->keyModified['inventory_template'] = 1; 

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
	 * The method to get the paperType
	 * @return string A string representing the paperType
	 */
	public function getPaperType()
	{
		return $this->paperType; 

	}

	/**
	 * The method to set the value to paperType
	 * @param string $paperType A string
	 */
	public function setPaperType(string $paperType)
	{
		$this->paperType=$paperType; 
		$this->keyModified['paper_type'] = 1; 

	}

	/**
	 * The method to get the viewType
	 * @return string A string representing the viewType
	 */
	public function getViewType()
	{
		return $this->viewType; 

	}

	/**
	 * The method to set the value to viewType
	 * @param string $viewType A string
	 */
	public function setViewType(string $viewType)
	{
		$this->viewType=$viewType; 
		$this->keyModified['view_type'] = 1; 

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
