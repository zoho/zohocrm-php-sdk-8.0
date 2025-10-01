<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\PricingDetails;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

class Price_Books
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function PricingDetails()
	{
		return new Field('Pricing_Details'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function RecordStatusS()
	{
		return new Field('Record_Status__s'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function Active()
	{
		return new Field('Active'); 

	}
	public static final function PricingModel()
	{
		return new Field('Pricing_Model'); 

	}
	public static final function LockedS()
	{
		return new Field('Locked__s'); 

	}
	public static final function PriceBookName()
	{
		return new Field('Price_Book_Name'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
} 
