<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Multiselectlookup implements Model
{

	private  $linkingDetails;
	private  $connectedDetails;
	private  $relatedList;
	private  $recordAccess;
	private  $keyModified=array();

	/**
	 * The method to get the linkingDetails
	 * @return LinkingDetails An instance of LinkingDetails
	 */
	public function getLinkingDetails()
	{
		return $this->linkingDetails; 

	}

	/**
	 * The method to set the value to linkingDetails
	 * @param LinkingDetails $linkingDetails An instance of LinkingDetails
	 */
	public function setLinkingDetails(LinkingDetails $linkingDetails)
	{
		$this->linkingDetails=$linkingDetails; 
		$this->keyModified['linking_details'] = 1; 

	}

	/**
	 * The method to get the connectedDetails
	 * @return ConnectedDetails An instance of ConnectedDetails
	 */
	public function getConnectedDetails()
	{
		return $this->connectedDetails; 

	}

	/**
	 * The method to set the value to connectedDetails
	 * @param ConnectedDetails $connectedDetails An instance of ConnectedDetails
	 */
	public function setConnectedDetails(ConnectedDetails $connectedDetails)
	{
		$this->connectedDetails=$connectedDetails; 
		$this->keyModified['connected_details'] = 1; 

	}

	/**
	 * The method to get the relatedList
	 * @return LookupRelatedList An instance of LookupRelatedList
	 */
	public function getRelatedList()
	{
		return $this->relatedList; 

	}

	/**
	 * The method to set the value to relatedList
	 * @param LookupRelatedList $relatedList An instance of LookupRelatedList
	 */
	public function setRelatedList(LookupRelatedList $relatedList)
	{
		$this->relatedList=$relatedList; 
		$this->keyModified['related_list'] = 1; 

	}

	/**
	 * The method to get the recordAccess
	 * @return bool A bool representing the recordAccess
	 */
	public function getRecordAccess()
	{
		return $this->recordAccess; 

	}

	/**
	 * The method to set the value to recordAccess
	 * @param bool $recordAccess A bool
	 */
	public function setRecordAccess(bool $recordAccess)
	{
		$this->recordAccess=$recordAccess; 
		$this->keyModified['record_access'] = 1; 

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
