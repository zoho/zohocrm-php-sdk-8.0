<?php 
namespace com\zoho\crm\api\auditlogexport;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $auditLogExport;
	private  $keyModified=array();

	/**
	 * The method to get the auditLogExport
	 * @return array A array representing the auditLogExport
	 */
	public function getAuditLogExport()
	{
		return $this->auditLogExport; 

	}

	/**
	 * The method to set the value to auditLogExport
	 * @param array $auditLogExport A array
	 */
	public function setAuditLogExport(array $auditLogExport)
	{
		$this->auditLogExport=$auditLogExport; 
		$this->keyModified['audit_log_export'] = 1; 

	}

	/**
	 * The method to check if the user has modified the given key
	 * @param string $key A string
	 * @return int A int representing the modification
	 */
	public function isKeyModified(string $key)
	{
		if(((array_key_exists($key, $this->keyModified))))
		{
			return $this->keyModified[$key]; 

		}
		return null; 

	}

	/**
	 * The method to mark the given key as modified
	 * @param string $key A string
	 * @param int $modification A int
	 */
	public function setKeyModified(string $key, int $modification)
	{
		$this->keyModified[$key] = $modification; 

	}
} 
