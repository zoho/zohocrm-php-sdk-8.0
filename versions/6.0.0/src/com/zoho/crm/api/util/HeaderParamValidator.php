<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\DataTypeConverter;

/**
 * This class is to validate API headers and parameters.
 */
class HeaderParamValidator
{
    public function validate($name, $className, $value)
    {
        $json_Details = $this->getJSONDetails();
        $className = $this->getClassName($className);
        $typeDetail = array();
        if(array_key_exists($className, $json_Details))
        {
            $typeDetail = $this->getKeyJSONDetails($name, $json_Details[$className]);
        }
        if(count($typeDetail) > 0)
        {
            if(!$this->checkDataType($typeDetail, $value))
            {
                $detailsJO = [];
                $detailsJO[Constants::HEADER_OR_PARAM_NAME] = $name;
                $detailsJO[Constants::CLASS_KEY] =  $className;
                $type = $typeDetail[Constants::TYPE];
                if( $type == "Long")
                {
                    $type = "String";
                }
                $detailsJO[Constants::EXPECTED_TYPE] = $type;
                throw new SDKException(Constants::TYPE_ERROR, "", $detailsJO, null);
            }
            $converter = new JSONConverter(new CommonAPIHandler());
            if(array_key_exists(Constants::STRUCTURE_NAME, $typeDetail))
            {
                $type = gettype($value);
                if ($type == Constants::ARRAY_KEY)
                {
                    $jsonArray = [];
                    foreach ($value as $response)
                    {
                        $jsonArray[] = $converter->formRequest($response, $typeDetail[Constants::STRUCTURE_NAME], 0, null);
                    }
                    return json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
                }
                return json_encode($converter->formRequest($value, $typeDetail[Constants::STRUCTURE_NAME], 0, null), JSON_UNESCAPED_UNICODE);
            }
            else if(array_key_exists(Constants::TYPE, $typeDetail) && $typeDetail[Constants::TYPE] == Constants::CHOICE_NAMESPACE)
            {
                $converter->checkChoiceValue(Constants::CHOICE_NAMESPACE, $typeDetail, $value);
            }
            return $this->parseData($value, $typeDetail[Constants::TYPE]);
        }
        $type = gettype($value);
        if(is_array($value))
        {
            $type = Constants::OBJECT;
        }
        return DataTypeConverter::postConvert($value, $type);
    }

    function is_assoc($array) 
	{
		return array_keys($array) !== range(0, count($array) - 1);
	}

    public function parseData($value, $type)
    {
        if (strtolower($type) == strtolower(Constants::MAP_NAMESPACE))
        {
            $jsonObject = array();
            if ($this->is_assoc($value) && count($value) > 0)
            {
                foreach ($value as $key => $keyValue)
                {
                    if (is_array($keyValue) && $this->is_assoc($keyValue) && count($keyValue) > 0)
                    {
                        $jsonObject[$key] = $this->parseData($keyValue, Constants::MAP_NAMESPACE);
                    }
                    else
                    {
                        $jsonObject[$key] = $this->parseData($keyValue, gettype($keyValue));
                    }
                } 
            }
            return $jsonObject;
        }
        else if (strtolower($type) == strtolower(Constants::ARRAY_KEY))
        {
            $jsonArray = array();
            if (sizeof($value) > 0)
            {  
                foreach ($value as $requestObject)
                {
                    if (is_array($requestObject) && $this->is_assoc($requestObject) && count($requestObject) > 0)
                    {
                        array_push($jsonArray, $this->parseData($requestObject, Constants::MAP_NAMESPACE));
                    }
                    else
                    {
                        array_push($jsonArray, $this->parseData($requestObject, gettype($requestObject)));
                    }
                }
            }
            return $jsonArray;
        }
        else if($value instanceof Choice)
        {
            return $value->getValue();
        }
        else
        {
            if(strtolower($type) == strtolower(Constants::OBJECT))
            {
                $type = get_class($value);
            }
            return DataTypeConverter::postConvert($value, $type);
        }
    }

    public function getJSONDetails()
    {
        $json_Details = Initializer::$jsonDetails;
        if(is_null($json_Details))
        {
            $json_Details = json_decode(file_get_contents(__DIR__ . '/../../../../../'. Constants::JSON_DETAILS_FILE_PATH), true);
            Initializer::$jsonDetails = $json_Details;
        }
        return $json_Details;
    }

    public function getClassName($className)
    {
        if (strpos($className, ".") !== false) 
        {
            $classNameSpace = explode('.', $className);
            $count = count($classNameSpace);
            $className = "";
            for($i = 0; $i < $count - 1; $i++)
            {
                $className = $className . strtolower($classNameSpace[$i]) . "\\";
            }
            return $className . $classNameSpace[$count - 1];
        }
        return $className;
    }

    public function getKeyJSONDetails($name, $json_Details)
    {
        foreach($json_Details as $json_Detail)
        {
            if(array_key_exists(Constants::NAME, $json_Detail) && strtolower($name) == strtolower($json_Detail[Constants::NAME]))
            {
                return $json_Detail;
            }
        }
    }

    public function checkDataType($keyDetail, $value)
    {
		$type  = $keyDetail[Constants::TYPE];
		$varType = gettype($value);
		$test = function ($varType, $type) { if(strtolower($varType) == strtolower($type)){return true; } return false;};
		$check = $test($varType, $type);
		if(array_key_exists($type, Constants::DATA_TYPE))
		{
			$type = Constants::DATA_TYPE[$type];
			$check = $test($varType, $type);
        }
        if(strtolower($varType) == strtolower(Constants::OBJECT) || strtolower($type) == strtolower(Constants::OBJECT))
		{
			if(strtolower($type) == strtolower(Constants::OBJECT))
			{
				$check = true;
			}
			else
			{
				$className = get_class($value);
				$check = $test($className, $type);
			}
		}
        return $check;
    }
}