<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Quotes
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function Discount()
	{
		return new Field('Discount'); 

	}
	public static final function ShippingState()
	{
		return new Field('Shipping_State'); 

	}
	public static final function Tax()
	{
		return new Field('Tax'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function DealName()
	{
		return new Field('Deal_Name'); 

	}
	public static final function ExchangeRate()
	{
		return new Field('Exchange_Rate'); 

	}
	public static final function ValidTill()
	{
		return new Field('Valid_Till'); 

	}
	public static final function BillingCountry()
	{
		return new Field('Billing_Country'); 

	}
	public static final function Currency()
	{
		return new Field('Currency'); 

	}
	public static final function Team()
	{
		return new Field('Team'); 

	}
	public static final function AccountName()
	{
		return new Field('Account_Name'); 

	}
	public static final function Carrier()
	{
		return new Field('Carrier'); 

	}
	public static final function QuotedItems()
	{
		return new Field('Quoted_Items'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function QuoteStage()
	{
		return new Field('Quote_Stage'); 

	}
	public static final function GrandTotal()
	{
		return new Field('Grand_Total'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function Adjustment()
	{
		return new Field('Adjustment'); 

	}
	public static final function BillingStreet()
	{
		return new Field('Billing_Street'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function TermsAndConditions()
	{
		return new Field('Terms_and_Conditions'); 

	}
	public static final function SubTotal()
	{
		return new Field('Sub_Total'); 

	}
	public static final function BillingCode()
	{
		return new Field('Billing_Code'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function Subject()
	{
		return new Field('Subject'); 

	}
	public static final function ContactName()
	{
		return new Field('Contact_Name'); 

	}
	public static final function ShippingCity()
	{
		return new Field('Shipping_City'); 

	}
	public static final function ShippingCountry()
	{
		return new Field('Shipping_Country'); 

	}
	public static final function ShippingCode()
	{
		return new Field('Shipping_Code'); 

	}
	public static final function BillingCity()
	{
		return new Field('Billing_City'); 

	}
	public static final function QuoteNumber()
	{
		return new Field('Quote_Number'); 

	}
	public static final function LockedS()
	{
		return new Field('Locked__s'); 

	}
	public static final function BillingState()
	{
		return new Field('Billing_State'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function ShippingStreet()
	{
		return new Field('Shipping_Street'); 

	}
} 
