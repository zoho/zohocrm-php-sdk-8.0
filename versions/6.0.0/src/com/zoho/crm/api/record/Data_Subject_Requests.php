<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Data_Subject_Requests
{

	public static final function RequestType()
	{
		return new Field('Request_Type'); 

	}
	public static final function IsClosed()
	{
		return new Field('Is_Closed'); 

	}
	public static final function ParentId()
	{
		return new Field('Parent_Id'); 

	}
	public static final function RequestSource()
	{
		return new Field('Request_Source'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function ClosedBy()
	{
		return new Field('Closed_By'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function RequestedBy()
	{
		return new Field('Requested_By'); 

	}
	public static final function RequestedDate()
	{
		return new Field('Requested_Date'); 

	}
	public static final function ClosedDate()
	{
		return new Field('Closed_Date'); 

	}
} 
