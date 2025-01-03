<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class ShowFields implements Model
{

	private  $showData;
	private  $field;
	private  $keyModified=array();

	/**
	 * The method to get the showData
	 * @return bool A bool representing the showData
	 */
	public function getShowData()
	{
		return $this->showData; 

	}

	/**
	 * The method to set the value to showData
	 * @param bool $showData A bool
	 */
	public function setShowData(bool $showData)
	{
		$this->showData=$showData; 
		$this->keyModified['show_data'] = 1; 

	}

	/**
	 * The method to get the field
	 * @return MinifiedField An instance of MinifiedField
	 */
	public function getField()
	{
		return $this->field; 

	}

	/**
	 * The method to set the value to field
	 * @param MinifiedField $field An instance of MinifiedField
	 */
	public function setField(MinifiedField $field)
	{
		$this->field=$field; 
		$this->keyModified['field'] = 1; 

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
