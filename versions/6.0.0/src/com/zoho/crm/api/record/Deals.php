<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\Territory;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Deals
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function CampaignSource()
	{
		return new Field('Campaign_Source'); 

	}
	public static final function ClosingDate()
	{
		return new Field('Closing_Date'); 

	}
	public static final function LastActivityTime()
	{
		return new Field('Last_Activity_Time'); 

	}
	public static final function ReasonForLossS()
	{
		return new Field('Reason_For_Loss__s'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function LeadConversionTime()
	{
		return new Field('Lead_Conversion_Time'); 

	}
	public static final function DealName()
	{
		return new Field('Deal_Name'); 

	}
	public static final function ExchangeRate()
	{
		return new Field('Exchange_Rate'); 

	}
	public static final function ExpectedRevenue()
	{
		return new Field('Expected_Revenue'); 

	}
	public static final function Currency()
	{
		return new Field('Currency'); 

	}
	public static final function OverallSalesDuration()
	{
		return new Field('Overall_Sales_Duration'); 

	}
	public static final function Stage()
	{
		return new Field('Stage'); 

	}
	public static final function AccountName()
	{
		return new Field('Account_Name'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function Territory()
	{
		return new Field('Territory'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function Amount()
	{
		return new Field('Amount'); 

	}
	public static final function Probability()
	{
		return new Field('Probability'); 

	}
	public static final function NextStep()
	{
		return new Field('Next_Step'); 

	}
	public static final function ChangeLogTimeS()
	{
		return new Field('Change_Log_Time__s'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function ContactName()
	{
		return new Field('Contact_Name'); 

	}
	public static final function Pipeline()
	{
		return new Field('Pipeline'); 

	}
	public static final function SalesCycleDuration()
	{
		return new Field('Sales_Cycle_Duration'); 

	}
	public static final function Type()
	{
		return new Field('Type'); 

	}
	public static final function LockedS()
	{
		return new Field('Locked__s'); 

	}
	public static final function LeadSource()
	{
		return new Field('Lead_Source'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
} 
