<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\Constants;
use com\zoho\api\logger\SDKLogger;

/**
 * The class contains methods to manipulate the module fields only when autoRefreshFields is set to false in Initializer.
 */
class ModuleFieldsHandler
{
	/**
	 * The method to obtain resources directory path.
	 * @return string - A String representing the directory's absolute path.
	 */
	private static function getDirectory()
	{
		return Initializer::getInitializer()->getResourcePath() . DIRECTORY_SEPARATOR . Constants::FIELD_DETAILS_DIRECTORY;
	}

	/**
	 * The method to delete fields JSON File of the current user.
	 * @throws SDKException
	 */
	public static function deleteFieldsFile()
	{
		try
		{
            $recordFieldDetailsPath = Utility::getEncodedFileName();
            if (file_exists($recordFieldDetailsPath))
            {
                unlink($recordFieldDetailsPath);
            }
		}
		catch (\Exception $e)
		{
			$sdkException = new SDKException(null, null, null, $e);
			SDKLogger::severeError(Constants::DELETE_FIELD_FILE_ERROR, $sdkException);
			throw $sdkException;
		}
	}

	/**
	 * The method to delete all the field JSON files under resources directory.
	 */
	public static function deleteAllFieldFiles()
	{
		try
		{
            $recordFieldDetailsDirectory = self::getDirectory();
			$files = glob($recordFieldDetailsDirectory . '/*.json');
            // Deleting all the files in the list
            foreach($files as $file)
            {
                if(is_file($file))
				{
					unlink($file);
				}
            }
		}
		catch (\Exception $e)
		{
			$sdkException = new SDKException(null, null, null, $e);
			SDKLogger::severeError(Constants::DELETE_FIELD_FILES_ERROR, $e);
			throw $sdkException;
		}
	}

	/**
	 * The method to delete fields of the given module from the current user's fields JSON file.
	 * @param string $module A string representing the module.
	 */
	public static function deleteFields(String $module)
	{
		try
		{
            $recordFieldDetailsPath = Utility::getEncodedFileName();
            if (file_exists($recordFieldDetailsPath))
            {
				$recordFieldDetailsJSON = Initializer::getJSON($recordFieldDetailsPath);
				if(array_key_exists(strtolower($module), $recordFieldDetailsJSON))
                {
                    Utility::deleteFields($recordFieldDetailsJSON, $module);
					file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJSON));
                }
            }
		}
		catch (\Exception $e)
		{
			throw new SDKException(null, null, null, $e);
		}
	}

	/**
	 * The method to force-refresh fields of a module.
	 * @param string $module A string representing the module.
	 * @throws SDKException
	 */
	public static function refreshFields(string $module)
	{
		try 
		{
			self::deleteFields($module);
			Utility::getFieldsInfo($module);
		}
		catch (SDKException $ex)
		{
			SDKLogger::severeError(Constants::REFRESH_SINGLE_MODULE_FIELDS_ERROR . $module, $ex);
			throw $ex;
		}
		catch(\Exception $e)
		{
			$sdkException = new SDKException(null, null, null, $e);
			SDKLogger::severeError(Constants::REFRESH_SINGLE_MODULE_FIELDS_ERROR . $module, $sdkException);
			throw $sdkException;
		}
	}

	public static function refreshAllModules()
	{
		try
		{
			Utility::refreshModules();
		}
		catch (SDKException $ex)
		{
			SDKLogger::severeError(Constants::REFRESH_ALL_MODULE_FIELDS_ERROR, $ex);
			throw $ex;
		}
		catch(\Exception $e)
		{
			$sdkException = new SDKException(null, null, null, $e);
			SDKLogger::severeError(Constants::REFRESH_ALL_MODULE_FIELDS_ERROR, $sdkException);
			throw $sdkException;
		}
	}
}