<?php 
namespace com\zoho\crm\api\functions;

use com\zoho\crm\api\Header;

class ExecuteFunctionUsingFileHeader
{

	public static final function uploadFileHeader()
	{
		return new Header('upload_file_header', 'com.zoho.crm.api.Functions.ExecuteFunctionUsingFileHeader'); 

	}
} 
