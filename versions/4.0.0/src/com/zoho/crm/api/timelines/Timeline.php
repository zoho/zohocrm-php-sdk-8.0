<?php 
namespace com\zoho\crm\api\timelines;

use com\zoho\crm\api\util\Model;

class Timeline implements Model
{

	private  $auditedTime;
	private  $action;
	private  $id;
	private  $source;
	private  $extension;
	private  $type;
	private  $doneBy;
	private  $relatedRecord;
	private  $automationDetails;
	private  $record;
	private  $fieldHistory;
	private  $keyModified=array();

	/**
	 * The method to get the auditedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getAuditedTime()
	{
		return $this->auditedTime; 

	}

	/**
	 * The method to set the value to auditedTime
	 * @param \DateTime $auditedTime An instance of \DateTime
	 */
	public function setAuditedTime(\DateTime $auditedTime)
	{
		$this->auditedTime=$auditedTime; 
		$this->keyModified['audited_time'] = 1; 

	}

	/**
	 * The method to get the action
	 * @return string A string representing the action
	 */
	public function getAction()
	{
		return $this->action; 

	}

	/**
	 * The method to set the value to action
	 * @param string $action A string
	 */
	public function setAction(string $action)
	{
		$this->action=$action; 
		$this->keyModified['action'] = 1; 

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
	 * The method to get the source
	 * @return string A string representing the source
	 */
	public function getSource()
	{
		return $this->source; 

	}

	/**
	 * The method to set the value to source
	 * @param string $source A string
	 */
	public function setSource(string $source)
	{
		$this->source=$source; 
		$this->keyModified['source'] = 1; 

	}

	/**
	 * The method to get the extension
	 * @return string A string representing the extension
	 */
	public function getExtension()
	{
		return $this->extension; 

	}

	/**
	 * The method to set the value to extension
	 * @param string $extension A string
	 */
	public function setExtension(string $extension)
	{
		$this->extension=$extension; 
		$this->keyModified['extension'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the doneBy
	 * @return NameIdStructure An instance of NameIdStructure
	 */
	public function getDoneBy()
	{
		return $this->doneBy; 

	}

	/**
	 * The method to set the value to doneBy
	 * @param NameIdStructure $doneBy An instance of NameIdStructure
	 */
	public function setDoneBy(NameIdStructure $doneBy)
	{
		$this->doneBy=$doneBy; 
		$this->keyModified['done_by'] = 1; 

	}

	/**
	 * The method to get the relatedRecord
	 * @return RelatedRecord An instance of RelatedRecord
	 */
	public function getRelatedRecord()
	{
		return $this->relatedRecord; 

	}

	/**
	 * The method to set the value to relatedRecord
	 * @param RelatedRecord $relatedRecord An instance of RelatedRecord
	 */
	public function setRelatedRecord(RelatedRecord $relatedRecord)
	{
		$this->relatedRecord=$relatedRecord; 
		$this->keyModified['related_record'] = 1; 

	}

	/**
	 * The method to get the automationDetails
	 * @return AutomationDetail An instance of AutomationDetail
	 */
	public function getAutomationDetails()
	{
		return $this->automationDetails; 

	}

	/**
	 * The method to set the value to automationDetails
	 * @param AutomationDetail $automationDetails An instance of AutomationDetail
	 */
	public function setAutomationDetails(AutomationDetail $automationDetails)
	{
		$this->automationDetails=$automationDetails; 
		$this->keyModified['automation_details'] = 1; 

	}

	/**
	 * The method to get the record
	 * @return Record An instance of Record
	 */
	public function getRecord()
	{
		return $this->record; 

	}

	/**
	 * The method to set the value to record
	 * @param Record $record An instance of Record
	 */
	public function setRecord(Record $record)
	{
		$this->record=$record; 
		$this->keyModified['record'] = 1; 

	}

	/**
	 * The method to get the fieldHistory
	 * @return array A array representing the fieldHistory
	 */
	public function getFieldHistory()
	{
		return $this->fieldHistory; 

	}

	/**
	 * The method to set the value to fieldHistory
	 * @param array $fieldHistory A array
	 */
	public function setFieldHistory(array $fieldHistory)
	{
		$this->fieldHistory=$fieldHistory; 
		$this->keyModified['field_history'] = 1; 

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
