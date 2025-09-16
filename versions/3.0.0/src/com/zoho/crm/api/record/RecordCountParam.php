<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Param;

class RecordCountParam
{

	public static final function cvid()
	{
		return new Param('cvid', 'com.zoho.crm.api.Record.RecordCountParam'); 

	}
	public static final function criteria()
	{
		return new Param('criteria', 'com.zoho.crm.api.Record.RecordCountParam'); 

	}
	public static final function email()
	{
		return new Param('email', 'com.zoho.crm.api.Record.RecordCountParam'); 

	}
	public static final function phone()
	{
		return new Param('phone', 'com.zoho.crm.api.Record.RecordCountParam'); 

	}
	public static final function word()
	{
		return new Param('word', 'com.zoho.crm.api.Record.RecordCountParam'); 

	}
} 
