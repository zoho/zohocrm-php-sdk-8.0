<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Consents
{

	public static final function ContactThroughEmail()
	{
		return new Field('Contact_Through_Email'); 

	}
	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function Email()
	{
		return new Field('Email'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function ConsentThrough()
	{
		return new Field('Consent_Through'); 

	}
	public static final function ContactThroughSurvey()
	{
		return new Field('Contact_Through_Survey'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function DataProcessingBasis()
	{
		return new Field('Data_Processing_Basis'); 

	}
	public static final function ContactThroughPhone()
	{
		return new Field('Contact_Through_Phone'); 

	}
	public static final function LawfulReason()
	{
		return new Field('Lawful_Reason'); 

	}
	public static final function MailSentTime()
	{
		return new Field('Mail_Sent_Time'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function ConsentDate()
	{
		return new Field('Consent_Date'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function ConsentRemarks()
	{
		return new Field('Consent_Remarks'); 

	}
} 
