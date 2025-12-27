<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\util\Constants;

/**
 * This class is to process the download file and stream response.
 */
class Downloader extends Converter
{

    public function __construct($commonAPIHandler)
    {
        parent::__construct($commonAPIHandler);
    }

    public function formRequest($requestObject, $pack, $instanceNumber, $classMemberDetail = NULL)
    {
        return null;
    }

    public function appendToRequest(&$requestBase, $requestObject)
    {
        return null;
    }

    public function getWrappedResponse($response, $pack, $headerMap)
    {
        $responseBody = array();
        $responseBody[Constants::HEADERS] = $headerMap;
        $responseBody[Constants::CONTENT] = $response;
        return [$this->getResponse($responseBody, $pack)];
    }

    public function getResponse($response, $pack)
    {
        $recordJsonDetails = Initializer::$jsonDetails[$pack];
        $instance = null;
        if (array_key_exists(Constants::INTERFACE_KEY, $recordJsonDetails) && $recordJsonDetails[Constants::INTERFACE_KEY] == true) // if interface
        {
            $classes = $recordJsonDetails[Constants::CLASSES];
            foreach($classes as $className)
			{
				if(strpos($className, Constants::FILEBODYWRAPPER))
				{
					return $this->getResponse($response, $className);
				}
			}
			return $instance;
        }
        else
        {
            $instance = new $pack();
            foreach ($recordJsonDetails as $memberName => $memberJsonDetails)
            {
                $reflector = new \ReflectionClass($instance);
                $field = $reflector->getProperty($memberName);
                $field->setAccessible(true);
                $type = $memberJsonDetails[Constants::TYPE];
                $instanceValue = null;
                if (strtolower($type) == strtolower(Constants::STREAM_WRAPPER_CLASS_PATH))
                {
                    $responseHeaders = $response[Constants::HEADERS];
                    $responseContent = $response[Constants::CONTENT];
                    $contentDisposition = "";
                    if(array_key_exists(Constants::CONTENT_DISPOSITION, $responseHeaders))
                    {
                        $contentDisposition = $responseHeaders[Constants::CONTENT_DISPOSITION];
                    }
                    else if(array_key_exists(Constants::CONTENT_DISPOSITION1, $responseHeaders))
                    {
                        $contentDisposition = $responseHeaders[Constants::CONTENT_DISPOSITION1];
                    }
                    else if(array_key_exists(Constants::CONTENT_DISPOSITION2, $responseHeaders))
                    {
                        $contentDisposition = $responseHeaders[Constants::CONTENT_DISPOSITION2];
                    }
                    $fileName = substr($contentDisposition, strrpos($contentDisposition, "'") + 1, mb_strlen($contentDisposition ?? "", 'utf-8'));
                    if (strpos($fileName, "=") !== false)
                    {
                        $fileName = substr($fileName, strrpos($fileName, "=") + 1, mb_strlen($fileName ?? "", 'utf-8'));
                        $fileName = str_replace(array(
                            '\'',
                            '"'
                        ), '', $fileName);
                    }
                    $fileContent = $responseContent;
                    $fileInstance = new $type($fileName, $fileContent, null);
                    $instanceValue = $fileInstance;
                    $field->setValue($instance, $instanceValue);
                }
            }
        }
        return $instance;
    }
}