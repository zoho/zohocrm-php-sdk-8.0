<?php 
namespace com\zoho\crm\api\reschedulehistory;

use com\zoho\crm\api\util\Model;

class RescheduleHistory implements Model
{

	private  $currencySymbol;
	private  $rescheduledTo;
	private  $reviewProcess;
	private  $rescheduleReason;
	private  $sharingPermission;
	private  $name;
	private  $modifiedBy;
	private  $review;
	private  $rescheduledBy;
	private  $state;
	private  $canvasId;
	private  $processFlow;
	private  $id;
	private  $rescheduledTime;
	private  $ziaVisions;
	private  $approved;
	private  $modifiedTime;
	private  $approval;
	private  $createdTime;
	private  $rescheduledFrom;
	private  $appointmentName;
	private  $editable;
	private  $orchestration;
	private  $inMerge;
	private  $createdBy;
	private  $approvalState;
	private  $rescheduleNote;
	private  $keyModified=array();

	/**
	 * The method to get the currencySymbol
	 * @return string A string representing the currencySymbol
	 */
	public function getCurrencySymbol()
	{
		return $this->currencySymbol; 

	}

	/**
	 * The method to set the value to currencySymbol
	 * @param string $currencySymbol A string
	 */
	public function setCurrencySymbol(string $currencySymbol)
	{
		$this->currencySymbol=$currencySymbol; 
		$this->keyModified['$currency_symbol'] = 1; 

	}

	/**
	 * The method to get the rescheduledTo
	 * @return \DateTime An instance of \DateTime
	 */
	public function getRescheduledTo()
	{
		return $this->rescheduledTo; 

	}

	/**
	 * The method to set the value to rescheduledTo
	 * @param \DateTime $rescheduledTo An instance of \DateTime
	 */
	public function setRescheduledTo(\DateTime $rescheduledTo)
	{
		$this->rescheduledTo=$rescheduledTo; 
		$this->keyModified['Rescheduled_To'] = 1; 

	}

	/**
	 * The method to get the reviewProcess
	 * @return bool A bool representing the reviewProcess
	 */
	public function getReviewProcess()
	{
		return $this->reviewProcess; 

	}

	/**
	 * The method to set the value to reviewProcess
	 * @param bool $reviewProcess A bool
	 */
	public function setReviewProcess(bool $reviewProcess)
	{
		$this->reviewProcess=$reviewProcess; 
		$this->keyModified['$review_process'] = 1; 

	}

	/**
	 * The method to get the rescheduleReason
	 * @return string A string representing the rescheduleReason
	 */
	public function getRescheduleReason()
	{
		return $this->rescheduleReason; 

	}

	/**
	 * The method to set the value to rescheduleReason
	 * @param string $rescheduleReason A string
	 */
	public function setRescheduleReason(string $rescheduleReason)
	{
		$this->rescheduleReason=$rescheduleReason; 
		$this->keyModified['Reschedule_Reason'] = 1; 

	}

	/**
	 * The method to get the sharingPermission
	 * @return string A string representing the sharingPermission
	 */
	public function getSharingPermission()
	{
		return $this->sharingPermission; 

	}

	/**
	 * The method to set the value to sharingPermission
	 * @param string $sharingPermission A string
	 */
	public function setSharingPermission(string $sharingPermission)
	{
		$this->sharingPermission=$sharingPermission; 
		$this->keyModified['$sharing_permission'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['Name'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public function setModifiedBy(User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['Modified_By'] = 1; 

	}

	/**
	 * The method to get the review
	 * @return bool A bool representing the review
	 */
	public function getReview()
	{
		return $this->review; 

	}

	/**
	 * The method to set the value to review
	 * @param bool $review A bool
	 */
	public function setReview(bool $review)
	{
		$this->review=$review; 
		$this->keyModified['$review'] = 1; 

	}

	/**
	 * The method to get the rescheduledBy
	 * @return User An instance of User
	 */
	public function getRescheduledBy()
	{
		return $this->rescheduledBy; 

	}

	/**
	 * The method to set the value to rescheduledBy
	 * @param User $rescheduledBy An instance of User
	 */
	public function setRescheduledBy(User $rescheduledBy)
	{
		$this->rescheduledBy=$rescheduledBy; 
		$this->keyModified['Rescheduled_By'] = 1; 

	}

	/**
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public function setState(string $state)
	{
		$this->state=$state; 
		$this->keyModified['$state'] = 1; 

	}

	/**
	 * The method to get the canvasId
	 * @return string A string representing the canvasId
	 */
	public function getCanvasId()
	{
		return $this->canvasId; 

	}

	/**
	 * The method to set the value to canvasId
	 * @param string $canvasId A string
	 */
	public function setCanvasId(string $canvasId)
	{
		$this->canvasId=$canvasId; 
		$this->keyModified['$canvas_id'] = 1; 

	}

	/**
	 * The method to get the processFlow
	 * @return bool A bool representing the processFlow
	 */
	public function getProcessFlow()
	{
		return $this->processFlow; 

	}

	/**
	 * The method to set the value to processFlow
	 * @param bool $processFlow A bool
	 */
	public function setProcessFlow(bool $processFlow)
	{
		$this->processFlow=$processFlow; 
		$this->keyModified['$process_flow'] = 1; 

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
	 * The method to get the rescheduledTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getRescheduledTime()
	{
		return $this->rescheduledTime; 

	}

	/**
	 * The method to set the value to rescheduledTime
	 * @param \DateTime $rescheduledTime An instance of \DateTime
	 */
	public function setRescheduledTime(\DateTime $rescheduledTime)
	{
		$this->rescheduledTime=$rescheduledTime; 
		$this->keyModified['Rescheduled_Time'] = 1; 

	}

	/**
	 * The method to get the ziaVisions
	 * @return bool A bool representing the ziaVisions
	 */
	public function getZiaVisions()
	{
		return $this->ziaVisions; 

	}

	/**
	 * The method to set the value to ziaVisions
	 * @param bool $ziaVisions A bool
	 */
	public function setZiaVisions(bool $ziaVisions)
	{
		$this->ziaVisions=$ziaVisions; 
		$this->keyModified['$zia_visions'] = 1; 

	}

	/**
	 * The method to get the approved
	 * @return bool A bool representing the approved
	 */
	public function getApproved()
	{
		return $this->approved; 

	}

	/**
	 * The method to set the value to approved
	 * @param bool $approved A bool
	 */
	public function setApproved(bool $approved)
	{
		$this->approved=$approved; 
		$this->keyModified['$approved'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['Modified_Time'] = 1; 

	}

	/**
	 * The method to get the approval
	 * @return Approval An instance of Approval
	 */
	public function getApproval()
	{
		return $this->approval; 

	}

	/**
	 * The method to set the value to approval
	 * @param Approval $approval An instance of Approval
	 */
	public function setApproval(Approval $approval)
	{
		$this->approval=$approval; 
		$this->keyModified['$approval'] = 1; 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['Created_Time'] = 1; 

	}

	/**
	 * The method to get the rescheduledFrom
	 * @return \DateTime An instance of \DateTime
	 */
	public function getRescheduledFrom()
	{
		return $this->rescheduledFrom; 

	}

	/**
	 * The method to set the value to rescheduledFrom
	 * @param \DateTime $rescheduledFrom An instance of \DateTime
	 */
	public function setRescheduledFrom(\DateTime $rescheduledFrom)
	{
		$this->rescheduledFrom=$rescheduledFrom; 
		$this->keyModified['Rescheduled_From'] = 1; 

	}

	/**
	 * The method to get the appointmentName
	 * @return AppointmentName An instance of AppointmentName
	 */
	public function getAppointmentName()
	{
		return $this->appointmentName; 

	}

	/**
	 * The method to set the value to appointmentName
	 * @param AppointmentName $appointmentName An instance of AppointmentName
	 */
	public function setAppointmentName(AppointmentName $appointmentName)
	{
		$this->appointmentName=$appointmentName; 
		$this->keyModified['Appointment_Name'] = 1; 

	}

	/**
	 * The method to get the editable
	 * @return bool A bool representing the editable
	 */
	public function getEditable()
	{
		return $this->editable; 

	}

	/**
	 * The method to set the value to editable
	 * @param bool $editable A bool
	 */
	public function setEditable(bool $editable)
	{
		$this->editable=$editable; 
		$this->keyModified['$editable'] = 1; 

	}

	/**
	 * The method to get the orchestration
	 * @return bool A bool representing the orchestration
	 */
	public function getOrchestration()
	{
		return $this->orchestration; 

	}

	/**
	 * The method to set the value to orchestration
	 * @param bool $orchestration A bool
	 */
	public function setOrchestration(bool $orchestration)
	{
		$this->orchestration=$orchestration; 
		$this->keyModified['$orchestration'] = 1; 

	}

	/**
	 * The method to get the inMerge
	 * @return bool A bool representing the inMerge
	 */
	public function getInMerge()
	{
		return $this->inMerge; 

	}

	/**
	 * The method to set the value to inMerge
	 * @param bool $inMerge A bool
	 */
	public function setInMerge(bool $inMerge)
	{
		$this->inMerge=$inMerge; 
		$this->keyModified['$in_merge'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public function setCreatedBy(User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['Created_By'] = 1; 

	}

	/**
	 * The method to get the approvalState
	 * @return string A string representing the approvalState
	 */
	public function getApprovalState()
	{
		return $this->approvalState; 

	}

	/**
	 * The method to set the value to approvalState
	 * @param string $approvalState A string
	 */
	public function setApprovalState(string $approvalState)
	{
		$this->approvalState=$approvalState; 
		$this->keyModified['$approval_state'] = 1; 

	}

	/**
	 * The method to get the rescheduleNote
	 * @return string A string representing the rescheduleNote
	 */
	public function getRescheduleNote()
	{
		return $this->rescheduleNote; 

	}

	/**
	 * The method to set the value to rescheduleNote
	 * @param string $rescheduleNote A string
	 */
	public function setRescheduleNote(string $rescheduleNote)
	{
		$this->rescheduleNote=$rescheduleNote; 
		$this->keyModified['Reschedule_Note'] = 1; 

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
