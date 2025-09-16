<?php 
namespace com\zoho\crm\api\pipeline;

use com\zoho\crm\api\util\Model;

class TransferPipeline implements Model
{

	private  $pipeline;
	private  $stages;
	private  $keyModified=array();

	/**
	 * The method to get the pipeline
	 * @return TPipeline An instance of TPipeline
	 */
	public function getPipeline()
	{
		return $this->pipeline; 

	}

	/**
	 * The method to set the value to pipeline
	 * @param TPipeline $pipeline An instance of TPipeline
	 */
	public function setPipeline(TPipeline $pipeline)
	{
		$this->pipeline=$pipeline; 
		$this->keyModified['pipeline'] = 1; 

	}

	/**
	 * The method to get the stages
	 * @return array A array representing the stages
	 */
	public function getStages()
	{
		return $this->stages; 

	}

	/**
	 * The method to set the value to stages
	 * @param array $stages A array
	 */
	public function setStages(array $stages)
	{
		$this->stages=$stages; 
		$this->keyModified['stages'] = 1; 

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
