<?php 
namespace com\zoho\crm\api\emailsharingdetails;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $emailsSharingDetails;
	private  $keyModified=array();

	/**
	 * The method to get the emailsSharingDetails
	 * @return array A array representing the emailsSharingDetails
	 */
	public function getEmailsSharingDetails()
	{
		return $this->emailsSharingDetails; 

	}

	/**
	 * The method to set the value to emailsSharingDetails
	 * @param array $emailsSharingDetails A array
	 */
	public function setEmailsSharingDetails(?array $emailsSharingDetails)
	{
		$this->emailsSharingDetails=$emailsSharingDetails; 
		$this->keyModified['__emails_sharing_details'] = 1; 

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
