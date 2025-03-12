<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\modules\MinifiedModule;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Resource implements Model
{

	private  $status;
	private  $type;
	private  $module;
	private  $code;
	private  $fileId;
	private  $fileNames;
	private  $ignoreEmpty;
	private  $findBy;
	private  $fieldMappings;
	private  $file;
	private  $keyModified=array();

	/**
	 * The method to get the status
	 * @return Choice An instance of Choice
	 */
	public function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param Choice $status An instance of Choice
	 */
	public function setStatus(Choice $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return Choice An instance of Choice
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param Choice $type An instance of Choice
	 */
	public function setType(Choice $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return MinifiedModule An instance of MinifiedModule
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param MinifiedModule $module An instance of MinifiedModule
	 */
	public function setModule(MinifiedModule $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the code
	 * @return string A string representing the code
	 */
	public function getCode()
	{
		return $this->code; 

	}

	/**
	 * The method to set the value to code
	 * @param string $code A string
	 */
	public function setCode(string $code)
	{
		$this->code=$code; 
		$this->keyModified['code'] = 1; 

	}

	/**
	 * The method to get the fileId
	 * @return string A string representing the fileId
	 */
	public function getFileId()
	{
		return $this->fileId; 

	}

	/**
	 * The method to set the value to fileId
	 * @param string $fileId A string
	 */
	public function setFileId(string $fileId)
	{
		$this->fileId=$fileId; 
		$this->keyModified['file_id'] = 1; 

	}

	/**
	 * The method to get the fileNames
	 * @return array A array representing the fileNames
	 */
	public function getFileNames()
	{
		return $this->fileNames; 

	}

	/**
	 * The method to set the value to fileNames
	 * @param array $fileNames A array
	 */
	public function setFileNames(array $fileNames)
	{
		$this->fileNames=$fileNames; 
		$this->keyModified['file_names'] = 1; 

	}

	/**
	 * The method to get the ignoreEmpty
	 * @return bool A bool representing the ignoreEmpty
	 */
	public function getIgnoreEmpty()
	{
		return $this->ignoreEmpty; 

	}

	/**
	 * The method to set the value to ignoreEmpty
	 * @param bool $ignoreEmpty A bool
	 */
	public function setIgnoreEmpty(bool $ignoreEmpty)
	{
		$this->ignoreEmpty=$ignoreEmpty; 
		$this->keyModified['ignore_empty'] = 1; 

	}

	/**
	 * The method to get the findBy
	 * @return string A string representing the findBy
	 */
	public function getFindBy()
	{
		return $this->findBy; 

	}

	/**
	 * The method to set the value to findBy
	 * @param string $findBy A string
	 */
	public function setFindBy(string $findBy)
	{
		$this->findBy=$findBy; 
		$this->keyModified['find_by'] = 1; 

	}

	/**
	 * The method to get the fieldMappings
	 * @return array A array representing the fieldMappings
	 */
	public function getFieldMappings()
	{
		return $this->fieldMappings; 

	}

	/**
	 * The method to set the value to fieldMappings
	 * @param array $fieldMappings A array
	 */
	public function setFieldMappings(array $fieldMappings)
	{
		$this->fieldMappings=$fieldMappings; 
		$this->keyModified['field_mappings'] = 1; 

	}

	/**
	 * The method to get the file
	 * @return File An instance of File
	 */
	public function getFile()
	{
		return $this->file; 

	}

	/**
	 * The method to set the value to file
	 * @param File $file An instance of File
	 */
	public function setFile(File $file)
	{
		$this->file=$file; 
		$this->keyModified['file'] = 1; 

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
