<?php 
namespace com\zoho\crm\api\backup;

use com\zoho\crm\api\util\Model;

class Urls implements Model
{

	private  $dataLinks;
	private  $attachmentLinks;
	private  $expiryDate;
	private  $keyModified=array();

	/**
	 * The method to get the dataLinks
	 * @return array A array representing the dataLinks
	 */
	public function getDataLinks()
	{
		return $this->dataLinks; 

	}

	/**
	 * The method to set the value to dataLinks
	 * @param array $dataLinks A array
	 */
	public function setDataLinks(array $dataLinks)
	{
		$this->dataLinks=$dataLinks; 
		$this->keyModified['data_links'] = 1; 

	}

	/**
	 * The method to get the attachmentLinks
	 * @return array A array representing the attachmentLinks
	 */
	public function getAttachmentLinks()
	{
		return $this->attachmentLinks; 

	}

	/**
	 * The method to set the value to attachmentLinks
	 * @param array $attachmentLinks A array
	 */
	public function setAttachmentLinks(array $attachmentLinks)
	{
		$this->attachmentLinks=$attachmentLinks; 
		$this->keyModified['attachment_links'] = 1; 

	}

	/**
	 * The method to get the expiryDate
	 * @return \DateTime An instance of \DateTime
	 */
	public function getExpiryDate()
	{
		return $this->expiryDate; 

	}

	/**
	 * The method to set the value to expiryDate
	 * @param \DateTime $expiryDate An instance of \DateTime
	 */
	public function setExpiryDate(\DateTime $expiryDate)
	{
		$this->expiryDate=$expiryDate; 
		$this->keyModified['expiry_date'] = 1; 

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
