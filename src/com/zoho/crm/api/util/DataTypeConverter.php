<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\util\Constants;

/**
 * This class converts JSON value to the expected data type.
 */
class DataTypeConverter
{
	private static $PRE_CONVERTER_MAP = array();
	private static $POST_CONVERTER_MAP = array();

	/**
	 * This method is to initialize the PreConverter and PostConverter lambda functions.
	 */
	static function init()
	{
	    if ((!empty(self::$PRE_CONVERTER_MAP) && count(self::$PRE_CONVERTER_MAP) != 0) && (!empty(self::$POST_CONVERTER_MAP) && count(self::$POST_CONVERTER_MAP) != 0))
		{
			return;
        }
        $string = function ($obj) { 
			if(preg_match('/\\\\u([0-9a-fA-F]{4})/', $obj))
			{
				return print_r(json_decode('' . $obj . ''), true);
			}
			return print_r($obj,true); 
		};
        $integer = function ($obj) { return intval($obj); };
        $float = function ($obj) { return floatval($obj); };
        $long = function ($obj) { return print_r($obj, true); };
		$bool = function ($obj) { return (bool)$obj; };
		$double = function ($obj) { return (double)$obj; };
        $stringToDateTime = function ($obj) { return date_create($obj)->setTimezone(new \DateTimeZone(date_default_timezone_get())); };
		$dateTimeToString = function ($obj) { return $obj->format(\Datetime::ATOM); };
		$stringToDate = function ($obj) { return date('Y-m-d', strtotime($obj)); };
		$dateToString = function ($obj) { return $obj->format('Y-m-d'); };
		$preObject = function ($obj) { return self::preConvertObjectData($obj); };
		$postObject = function ($obj) { return self::postConvertObjectData($obj); };
		$timeZonetoSting = function ($obj) { return $obj->getName(); };
		$stringtoTimeZone = function ($obj) { return new \DateTimeZone($obj); };
		$LocalTimetoSting = function ($obj) { return $obj->format("H:i"); };
		$stringtoLocalTime = function ($obj) { return \DateTime::createFromFormat("H:i", $obj); };
        self::addToMap(Constants::STRING_NAMESPACE, $string, $string);
        self::addToMap(Constants::INTEGER_NAMESPACE, $integer, $integer);
        self::addToMap(Constants::LONG_NAMESPACE, $long, $long);
        self::addToMap(Constants::FLOAT_NAMESPACE, $float, $float);
        self::addToMap(Constants::BOOLEAN_NAMESPACE, $bool, $bool);
        self::addToMap(\DateTime::class, $stringToDateTime, $dateTimeToString);
		self::addToMap(Constants::DATE, $stringToDate, $dateToString);
		self::addToMap(Constants::OBJECT, $preObject, $postObject);
		self::addToMap(Constants::DOUBLE_NAMESPACE, $double, $double);
		self::addToMap(Constants::TIMEZONE_NAMESPACE, $stringtoTimeZone, $timeZonetoSting);
		self::addToMap(Constants::LOCALTIME_NAMESPACE, $stringtoLocalTime, $LocalTimetoSting);
	}

	static function preConvertObjectData($obj)
	{
		return $obj;
	}

	static function is_assoc($array) 
	{
		return array_keys($array) !== range(0, count($array) - 1);
	}
	

	static function postConvertObjectData($obj)
	{
		if(is_array($obj) &&  count($obj) > 0 && !self::is_assoc($obj))
		{
			$list = array();
			foreach($obj as $data)
			{
				if($data instanceof \DateTime )
				{
					if($data->format('H') == "00" && $data->format('i') == "00" && $data->format('s') == "00" && $data->format('u') == "000000")
					{
						array_push($list, DataTypeConverter::postConvert($data, "Date"));
					}
					else
					{
						array_push($list, DataTypeConverter::postConvert($data, "DateTime"));
					}
				}
				else if (is_array($data)) 
				{
                    array_push($list, self::postConvertObjectData($data));
                }
				else
				{
					array_push($list, $data);
				}
			}
			return $list;
		}
		else if (is_array($obj) && self::is_assoc($obj) && sizeof($obj) > 0)
		{
			$requestObject = array();
			foreach ($obj as $keyName => $keyValue)
			{
				if(is_array($keyValue))
				{
					$requestObject[$keyName] = self::postConvertObjectData($keyValue);
				}
				else if($keyValue instanceof \DateTime )
				{
					if($keyValue->format('H') == "00" && $keyValue->format('i') == "00" && $keyValue->format('s') == "00" && $keyValue->format('u') == "000000")
					{
						$requestObject[$keyName] =  DataTypeConverter::postConvert($keyValue, "Date");
					}
					else
					{
						$requestObject[$keyName] = DataTypeConverter::postConvert($keyValue, "DateTime");
					}
				}
				else if (is_array($keyValue)) 
				{
					$requestObject[$keyName] = self::postConvertObjectData($keyValue);
                }
				else
				{
					$requestObject[$keyName] = $keyValue;
				}
			}
			return $requestObject;
		}
		else if($obj instanceof \DateTime )
		{
			if($obj->format('H') == "00" && $obj->format('i') == "00" && $obj->format('s') == "00" && $obj->format('u') == "000000")
			{
				return DataTypeConverter::postConvert($obj, "Date");
			}
			else
			{
				return DataTypeConverter::postConvert($obj, "DateTime");
			}
		}
		else
		{
			return $obj;
		}
	}

	/**
	 * This method is to add PreConverter and PostConverter instance.
	 * @param string $name A string containing the data type class name.
	 * @param object $preConverter A PreConverter interface.
	 * @param object $postConverter A PostConverter interface.
	 */
	static function addToMap($name, $preConverter, $postConverter)
	{
	    self::$PRE_CONVERTER_MAP[$name] = $preConverter;
	    self::$POST_CONVERTER_MAP[$name] = $postConverter;
	}

	/**
	 * This method is to convert JSON value to expected data value.
	 * @param object $obj A Object containing the JSON value.
	 * @param string $type A string containing the expected method return type.
	 * @return object containing the expected data value.
	 */
    static function preConvert($obj, $type)
	{
		self::init();
		if(array_key_exists($type, self::$PRE_CONVERTER_MAP))
		{
			return self::$PRE_CONVERTER_MAP[$type]($obj);
		}
        return $obj;
	}

	/**
	 * This method to convert PHP data to JSON data value.
	 * @param object $obj A object containing the PHP data value.
	 * @param string $type A string containing the expected method return type.
	 * @return object A object containing the expected data value.
	 */
	static function postConvert($obj, $type)
	{
		self::init();
		if(array_key_exists($type, self::$POST_CONVERTER_MAP))
		{
			return self::$POST_CONVERTER_MAP[$type]($obj);
		}
		return $obj;
	}
}