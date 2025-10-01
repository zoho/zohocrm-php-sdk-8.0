<?php 
namespace com\zoho\crm\api\massconvert;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $deals;
	private  $moveAttachmentsTo;
	private  $assignTo;
	private  $carryOverTags;
	private  $relatedModules;
	private  $portalUserType;
	private  $ids;
	private  $applyAssignmentThreshold;
	private  $keyModified=array();

	/**
	 * The method to get the deals
	 * @return Record An instance of Record
	 */
	public function getDeals()
	{
		return $this->deals; 

	}

	/**
	 * The method to set the value to deals
	 * @param Record $deals An instance of Record
	 */
	public function setDeals(Record $deals)
	{
		$this->deals=$deals; 
		$this->keyModified['Deals'] = 1; 

	}

	/**
	 * The method to get the moveAttachmentsTo
	 * @return MoveAttachmentsTo An instance of MoveAttachmentsTo
	 */
	public function getMoveAttachmentsTo()
	{
		return $this->moveAttachmentsTo; 

	}

	/**
	 * The method to set the value to moveAttachmentsTo
	 * @param MoveAttachmentsTo $moveAttachmentsTo An instance of MoveAttachmentsTo
	 */
	public function setMoveAttachmentsTo(MoveAttachmentsTo $moveAttachmentsTo)
	{
		$this->moveAttachmentsTo=$moveAttachmentsTo; 
		$this->keyModified['move_attachments_to'] = 1; 

	}

	/**
	 * The method to get the assignTo
	 * @return AssignTo An instance of AssignTo
	 */
	public function getAssignTo()
	{
		return $this->assignTo; 

	}

	/**
	 * The method to set the value to assignTo
	 * @param AssignTo $assignTo An instance of AssignTo
	 */
	public function setAssignTo(AssignTo $assignTo)
	{
		$this->assignTo=$assignTo; 
		$this->keyModified['assign_to'] = 1; 

	}

	/**
	 * The method to get the carryOverTags
	 * @return array A array representing the carryOverTags
	 */
	public function getCarryOverTags()
	{
		return $this->carryOverTags; 

	}

	/**
	 * The method to set the value to carryOverTags
	 * @param array $carryOverTags A array
	 */
	public function setCarryOverTags(array $carryOverTags)
	{
		$this->carryOverTags=$carryOverTags; 
		$this->keyModified['carry_over_tags'] = 1; 

	}

	/**
	 * The method to get the relatedModules
	 * @return array A array representing the relatedModules
	 */
	public function getRelatedModules()
	{
		return $this->relatedModules; 

	}

	/**
	 * The method to set the value to relatedModules
	 * @param array $relatedModules A array
	 */
	public function setRelatedModules(array $relatedModules)
	{
		$this->relatedModules=$relatedModules; 
		$this->keyModified['related_modules'] = 1; 

	}

	/**
	 * The method to get the portalUserType
	 * @return PortalUserType An instance of PortalUserType
	 */
	public function getPortalUserType()
	{
		return $this->portalUserType; 

	}

	/**
	 * The method to set the value to portalUserType
	 * @param PortalUserType $portalUserType An instance of PortalUserType
	 */
	public function setPortalUserType(PortalUserType $portalUserType)
	{
		$this->portalUserType=$portalUserType; 
		$this->keyModified['portal_user_type'] = 1; 

	}

	/**
	 * The method to get the ids
	 * @return array A array representing the ids
	 */
	public function getIds()
	{
		return $this->ids; 

	}

	/**
	 * The method to set the value to ids
	 * @param array $ids A array
	 */
	public function setIds(array $ids)
	{
		$this->ids=$ids; 
		$this->keyModified['ids'] = 1; 

	}

	/**
	 * The method to get the applyAssignmentThreshold
	 * @return bool A bool representing the applyAssignmentThreshold
	 */
	public function getApplyAssignmentThreshold()
	{
		return $this->applyAssignmentThreshold; 

	}

	/**
	 * The method to set the value to applyAssignmentThreshold
	 * @param bool $applyAssignmentThreshold A bool
	 */
	public function setApplyAssignmentThreshold(bool $applyAssignmentThreshold)
	{
		$this->applyAssignmentThreshold=$applyAssignmentThreshold; 
		$this->keyModified['apply_assignment_threshold'] = 1; 

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
