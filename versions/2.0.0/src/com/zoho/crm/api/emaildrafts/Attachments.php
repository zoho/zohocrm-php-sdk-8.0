<?php 
namespace com\zoho\crm\api\emaildrafts;

use com\zoho\crm\api\util\Model;

class Attachments implements Model
{

	private  $serviceName;
	private  $fileSize;
	private  $id;
	private  $fileName;
	private  $keyModified=array();

	/**
	 * The method to get the serviceName
	 * @return string A string representing the serviceName
	 */
	public function getServiceName()
	{
		return $this->serviceName; 

	}

	/**
	 * The method to set the value to serviceName
	 * @param string $serviceName A string
	 */
	public function setServiceName(string $serviceName)
	{
		$this->serviceName=$serviceName; 
		$this->keyModified['service_name'] = 1; 

	}

	/**
	 * The method to get the fileSize
	 * @return string A string representing the fileSize
	 */
	public function getFileSize()
	{
		return $this->fileSize; 

	}

	/**
	 * The method to set the value to fileSize
	 * @param string $fileSize A string
	 */
	public function setFileSize(string $fileSize)
	{
		$this->fileSize=$fileSize; 
		$this->keyModified['file_size'] = 1; 

	}

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
	 * The method to get the fileName
	 * @return string A string representing the fileName
	 */
	public function getFileName()
	{
		return $this->fileName; 

	}

	/**
	 * The method to set the value to fileName
	 * @param string $fileName A string
	 */
	public function setFileName(string $fileName)
	{
		$this->fileName=$fileName; 
		$this->keyModified['file_name'] = 1; 

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
