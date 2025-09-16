<?php 
namespace com\zoho\crm\api\pipeline;

use com\zoho\crm\api\util\Model;

class TransferPipelineActionWrapper implements Model, TransferPipelineActionHandler
{

	private  $transferPipeline;
	private  $keyModified=array();

	/**
	 * The method to get the transferPipeline
	 * @return array A array representing the transferPipeline
	 */
	public function getTransferPipeline()
	{
		return $this->transferPipeline; 

	}

	/**
	 * The method to set the value to transferPipeline
	 * @param array $transferPipeline A array
	 */
	public function setTransferPipeline(array $transferPipeline)
	{
		$this->transferPipeline=$transferPipeline; 
		$this->keyModified['transfer_pipeline'] = 1; 

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
