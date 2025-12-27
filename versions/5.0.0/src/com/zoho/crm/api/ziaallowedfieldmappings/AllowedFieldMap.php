<?php 
namespace com\zoho\crm\api\ziaallowedfieldmappings;

use com\zoho\crm\api\util\Model;

class AllowedFieldMap implements Model
{

	private  $outputDataFieldMapping;
	private  $inputDataFieldMapping;
	private  $keyModified=array();

	/**
	 * The method to get the outputDataFieldMapping
	 * @return array A array representing the outputDataFieldMapping
	 */
	public function getOutputDataFieldMapping()
	{
		return $this->outputDataFieldMapping; 

	}

	/**
	 * The method to set the value to outputDataFieldMapping
	 * @param array $outputDataFieldMapping A array
	 */
	public function setOutputDataFieldMapping(?array $outputDataFieldMapping)
	{
		$this->outputDataFieldMapping=$outputDataFieldMapping; 
		$this->keyModified['output_data_field_mapping'] = 1; 

	}

	/**
	 * The method to get the inputDataFieldMapping
	 * @return array A array representing the inputDataFieldMapping
	 */
	public function getInputDataFieldMapping()
	{
		return $this->inputDataFieldMapping; 

	}

	/**
	 * The method to set the value to inputDataFieldMapping
	 * @param array $inputDataFieldMapping A array
	 */
	public function setInputDataFieldMapping(?array $inputDataFieldMapping)
	{
		$this->inputDataFieldMapping=$inputDataFieldMapping; 
		$this->keyModified['input_data_field_mapping'] = 1; 

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
