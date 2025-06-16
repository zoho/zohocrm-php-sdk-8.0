<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class OperationType implements Model
{

	private  $webUpdate;
	private  $apiCreate;
	private  $webCreate;
	private  $apiUpdate;
	private  $keyModified=array();

	/**
	 * The method to get the webUpdate
	 * @return bool A bool representing the webUpdate
	 */
	public function getWebUpdate()
	{
		return $this->webUpdate; 

	}

	/**
	 * The method to set the value to webUpdate
	 * @param bool $webUpdate A bool
	 */
	public function setWebUpdate(bool $webUpdate)
	{
		$this->webUpdate=$webUpdate; 
		$this->keyModified['web_update'] = 1; 

	}

	/**
	 * The method to get the aPICreate
	 * @return bool A bool representing the apiCreate
	 */
	public function getAPICreate()
	{
		return $this->apiCreate; 

	}

	/**
	 * The method to set the value to aPICreate
	 * @param bool $apiCreate A bool
	 */
	public function setAPICreate(bool $apiCreate)
	{
		$this->apiCreate=$apiCreate; 
		$this->keyModified['api_create'] = 1; 

	}

	/**
	 * The method to get the webCreate
	 * @return bool A bool representing the webCreate
	 */
	public function getWebCreate()
	{
		return $this->webCreate; 

	}

	/**
	 * The method to set the value to webCreate
	 * @param bool $webCreate A bool
	 */
	public function setWebCreate(bool $webCreate)
	{
		$this->webCreate=$webCreate; 
		$this->keyModified['web_create'] = 1; 

	}

	/**
	 * The method to get the aPIUpdate
	 * @return bool A bool representing the apiUpdate
	 */
	public function getAPIUpdate()
	{
		return $this->apiUpdate; 

	}

	/**
	 * The method to set the value to aPIUpdate
	 * @param bool $apiUpdate A bool
	 */
	public function setAPIUpdate(bool $apiUpdate)
	{
		$this->apiUpdate=$apiUpdate; 
		$this->keyModified['api_update'] = 1; 

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
