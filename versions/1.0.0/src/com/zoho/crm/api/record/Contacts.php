<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Consent;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\Territory;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Contacts
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Email()
	{
		return new Field('Email'); 

	}
	public static final function VisitorScore()
	{
		return new Field('Visitor_Score'); 

	}
	public static final function OtherPhone()
	{
		return new Field('Other_Phone'); 

	}
	public static final function MailingState()
	{
		return new Field('Mailing_State'); 

	}
	public static final function OtherState()
	{
		return new Field('Other_State'); 

	}
	public static final function OtherCountry()
	{
		return new Field('Other_Country'); 

	}
	public static final function LastActivityTime()
	{
		return new Field('Last_Activity_Time'); 

	}
	public static final function Department()
	{
		return new Field('Department'); 

	}
	public static final function UnsubscribedMode()
	{
		return new Field('Unsubscribed_Mode'); 

	}
	public static final function Assistant()
	{
		return new Field('Assistant'); 

	}
	public static final function MailingCountry()
	{
		return new Field('Mailing_Country'); 

	}
	public static final function DataProcessingBasisDetails()
	{
		return new Field('Data_Processing_Basis_Details'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function DataSource()
	{
		return new Field('Data_Source'); 

	}
	public static final function ReportingTo()
	{
		return new Field('Reporting_To'); 

	}
	public static final function EnrichStatusS()
	{
		return new Field('Enrich_Status__s'); 

	}
	public static final function FirstVisitedURL()
	{
		return new Field('First_Visited_URL'); 

	}
	public static final function DaysVisited()
	{
		return new Field('Days_Visited'); 

	}
	public static final function OtherCity()
	{
		return new Field('Other_City'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function ChangeLogTimeS()
	{
		return new Field('Change_Log_Time__s'); 

	}
	public static final function DataProcessingBasis()
	{
		return new Field('Data_Processing_Basis'); 

	}
	public static final function HomePhone()
	{
		return new Field('Home_Phone'); 

	}
	public static final function LastVisitedTime()
	{
		return new Field('Last_Visited_Time'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function SecondaryEmail()
	{
		return new Field('Secondary_Email'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function VendorName()
	{
		return new Field('Vendor_Name'); 

	}
	public static final function MailingZip()
	{
		return new Field('Mailing_Zip'); 

	}
	public static final function ReportsTo()
	{
		return new Field('Reports_To'); 

	}
	public static final function NumberOfChats()
	{
		return new Field('Number_Of_Chats'); 

	}
	public static final function OtherZip()
	{
		return new Field('Other_Zip'); 

	}
	public static final function Twitter()
	{
		return new Field('Twitter'); 

	}
	public static final function MailingStreet()
	{
		return new Field('Mailing_Street'); 

	}
	public static final function AverageTimeSpentMinutes()
	{
		return new Field('Average_Time_Spent_Minutes'); 

	}
	public static final function Salutation()
	{
		return new Field('Salutation'); 

	}
	public static final function FirstName()
	{
		return new Field('First_Name'); 

	}
	public static final function AsstPhone()
	{
		return new Field('Asst_Phone'); 

	}
	public static final function FullName()
	{
		return new Field('Full_Name'); 

	}
	public static final function RecordImage()
	{
		return new Field('Record_Image'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function SkypeID()
	{
		return new Field('Skype_ID'); 

	}
	public static final function Phone()
	{
		return new Field('Phone'); 

	}
	public static final function AccountName()
	{
		return new Field('Account_Name'); 

	}
	public static final function EmailOptOut()
	{
		return new Field('Email_Opt_Out'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function DateOfBirth()
	{
		return new Field('Date_of_Birth'); 

	}
	public static final function MailingCity()
	{
		return new Field('Mailing_City'); 

	}
	public static final function UnsubscribedTime()
	{
		return new Field('Unsubscribed_Time'); 

	}
	public static final function Title()
	{
		return new Field('Title'); 

	}
	public static final function OtherStreet()
	{
		return new Field('Other_Street'); 

	}
	public static final function Mobile()
	{
		return new Field('Mobile'); 

	}
	public static final function Territories()
	{
		return new Field('Territories'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function FirstVisitedTime()
	{
		return new Field('First_Visited_Time'); 

	}
	public static final function LastName()
	{
		return new Field('Last_Name'); 

	}
	public static final function Referrer()
	{
		return new Field('Referrer'); 

	}
	public static final function LockedS()
	{
		return new Field('Locked__s'); 

	}
	public static final function LeadSource()
	{
		return new Field('Lead_Source'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function Fax()
	{
		return new Field('Fax'); 

	}
	public static final function LastEnrichedTimeS()
	{
		return new Field('Last_Enriched_Time__s'); 

	}
} 
