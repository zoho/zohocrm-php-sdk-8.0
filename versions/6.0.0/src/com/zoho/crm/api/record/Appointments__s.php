<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\Reminder;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Appointments__s
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Address()
	{
		return new Field('Address'); 

	}
	public static final function AppointmentStartTime()
	{
		return new Field('Appointment_Start_Time'); 

	}
	public static final function CancellationReason()
	{
		return new Field('Cancellation_Reason'); 

	}
	public static final function AppointmentFor()
	{
		return new Field('Appointment_For'); 

	}
	public static final function RescheduledTo()
	{
		return new Field('Rescheduled_To'); 

	}
	public static final function RescheduleReason()
	{
		return new Field('Reschedule_Reason'); 

	}
	public static final function JobSheetNameS()
	{
		return new Field('Job_Sheet_Name__s'); 

	}
	public static final function AdditionalInformation()
	{
		return new Field('Additional_Information'); 

	}
	public static final function JobSheetCreatedS()
	{
		return new Field('Job_Sheet_Created__s'); 

	}
	public static final function CancelledTime()
	{
		return new Field('Cancelled_Time'); 

	}
	public static final function CancellationNote()
	{
		return new Field('Cancellation_Note'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function RescheduleCount()
	{
		return new Field('Reschedule_Count'); 

	}
	public static final function RescheduledBy()
	{
		return new Field('Rescheduled_By'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function RescheduledTime()
	{
		return new Field('Rescheduled_Time'); 

	}
	public static final function RemindAt()
	{
		return new Field('Remind_At'); 

	}
	public static final function AppointmentEndTime()
	{
		return new Field('Appointment_End_Time'); 

	}
	public static final function Status()
	{
		return new Field('Status'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function ServiceName()
	{
		return new Field('Service_Name'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function RescheduledFrom()
	{
		return new Field('Rescheduled_From'); 

	}
	public static final function CancelledBy()
	{
		return new Field('Cancelled_By'); 

	}
	public static final function AppointmentName()
	{
		return new Field('Appointment_Name'); 

	}
	public static final function Duration()
	{
		return new Field('Duration'); 

	}
	public static final function JobSheetSectionS()
	{
		return new Field('Job_Sheet_Section__s'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function JobSheetDescriptionS()
	{
		return new Field('Job_Sheet_Description__s'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function Location()
	{
		return new Field('Location'); 

	}
	public static final function RescheduleNote()
	{
		return new Field('Reschedule_Note'); 

	}
} 
