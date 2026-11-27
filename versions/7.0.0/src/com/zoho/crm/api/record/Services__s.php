<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\TimeRange;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Services__s
{

	public static final function JobSheetRequired()
	{
		return new Field('Job_Sheet_Required'); 

	}
	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function AvailableDays()
	{
		return new Field('Available_Days'); 

	}
	public static final function Tax()
	{
		return new Field('Tax'); 

	}
	public static final function UnavailableFrom()
	{
		return new Field('Unavailable_From'); 

	}
	public static final function RecordImage()
	{
		return new Field('Record_Image'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function AvailableDates()
	{
		return new Field('Available_Dates'); 

	}
	public static final function Status()
	{
		return new Field('Status'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function AvailableTimings()
	{
		return new Field('Available_Timings'); 

	}
	public static final function ServiceName()
	{
		return new Field('Service_Name'); 

	}
	public static final function AvailableFrom()
	{
		return new Field('Available_From'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function AvailableTill()
	{
		return new Field('Available_Till'); 

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
	public static final function Price()
	{
		return new Field('Price'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function AvailabilityType()
	{
		return new Field('Availability_Type'); 

	}
	public static final function Members()
	{
		return new Field('Members'); 

	}
	public static final function Location()
	{
		return new Field('Location'); 

	}
	public static final function UnavailableTill()
	{
		return new Field('Unavailable_Till'); 

	}
} 
