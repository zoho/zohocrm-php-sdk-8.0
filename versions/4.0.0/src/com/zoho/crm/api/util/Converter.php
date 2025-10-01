<?php
namespace com\zoho\crm\api\util;

use com\zoho\api\authenticator\OAuthToken;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\util\Constants;

/**
 * This abstract class is to construct API request and response.
 */
abstract class Converter
{
    protected $commonAPIHandler;

    /**
     * Creates a Converter class instance with the CommonAPIHandler class instance.
     * @param CommonAPIHandler $commonAPIHandler A CommonAPIHandler class instance.
     */
    public function __construct($commonAPIHandler)
    {
       $this->commonAPIHandler = $commonAPIHandler;
    }

    /**
     * This abstract method is to process the API response.
     * @param object $response A object containing the API response contents or response.
     * @param string $pack A string containing the expected method return type.
     * @return object A object representing the POJO class instance.
     */
    public abstract function getResponse($response, $pack);

    /**
     * This abstract method is to construct the API request.
     * @param object $responseObject A object containing the POJO class instance.
     * @param string $pack A string containing the expected method return type.
     * @param integer $instanceNumber An integer containing the POJO class instance list number.
     * @param array $memberDetail An array containing the member Detail
     * @return object A object representing the API request body object.
     */
    public abstract function formRequest($responseObject, $pack, $instanceNumber, $memberDetail=null);

    /**
     * This abstract method is to construct the API request body.
     * @param object $requestBase A curl instance.
     * @param object $requestObject A object containing the API request body object.
     */
    public abstract function appendToRequest(&$requestBase, $requestObject);

    /**
     * This abstract method is to process the API response.
     * @param object $response A object containing the HttpResponse class instance.
     * @param $pack $pack A string containing the expected method return type.
     */
    public abstract function getWrappedResponse($response, $pack);

    /**
     * This method is to validate if the input values satisfy the constraints for the respective fields.
     * @param string $className A string containing the class name.
     * @param string $memberName A string containing the member name.
     * @param array $keyDetails A array containing the key JSON details.
     * @param object $value A object containing the key value.
     * @param array $uniqueValuesMap A array containing the construct objects.
     * @param integer $instanceNumber An integer containing the POJO class instance list number.
     * @throws \com\zoho\crm\api\exception\SDKException if a problem occurs.
     * @return bool A boolean representing the key value is expected pattern, unique, length, and values.
     */
    public function valueChecker($className, $memberName, $keyDetails, $value, &$uniqueValuesMap, $instanceNumber)
	{
		$detailsJO = array();
		$name = $keyDetails[Constants::NAME];
		$type  = $keyDetails[Constants::TYPE];
		$varType = gettype($value);
		$test = function ($varType, $type) { if(strtolower($varType) == strtolower($type)){return true; } return false;};
		$check = $test($varType, $type);
		if(array_key_exists($type, Constants::DATA_TYPE))
		{
			$type = Constants::DATA_TYPE[$type];
			if(is_array($value) &&  count($value) > 0 && array_key_exists(Constants::STRUCTURE_NAME, $keyDetails))
			{
				$structureName = $keyDetails[Constants::STRUCTURE_NAME];
				$index = 0;
				foreach($value as $data)
				{
					$className = get_class($data);
					$check = $test($className, $structureName);
					if(!$check)
					{
						$result = $data instanceof $structureName;
						if ($result)
						{
							$check = true;
						}
					}
					if(!$check)
					{
						$instanceNumber = $index;
						$type = Constants::ARRAY_KEY . "(" . $structureName . ")";
						$varType = Constants::ARRAY_KEY . "(" . $className . ")";
						break;
					}
					$index ++;
				}
			}
			else if(is_array($value) &&  count($value) > 0 &&  array_key_exists(Constants::SUB_TYPE, $keyDetails))
			{
				$index = 0;
				foreach($value as $data)
				{
					$subType = $keyDetails[Constants::SUB_TYPE];
					$sub_type = $subType[Constants::TYPE];
					$className = gettype($data);
					if(strtolower($sub_type) == strtolower(Constants::OBJECT))
					{
						$check = true;
					}
					else if(array_key_exists(Constants::SUB_TYPE_1, $subType))
					{
						$subType1 = $subType[Constants::SUB_TYPE_1];
						$sub_type1 = $subType1[Constants::TYPE];
						if(strtolower($sub_type1) == strtolower(Constants::OBJECT))
						{
							$check = true;
						}
					}
					else
					{
						if(array_key_exists($sub_type, Constants::DATA_TYPE))
						{
							$sub_type = Constants::DATA_TYPE[$sub_type];
							if(strtolower($className) == strtolower(Constants::OBJECT))
							{
								$className = get_class($data);
							}
						}
						$check = $test($className, $sub_type);
						if(!$check)
						{
							$result = $data instanceof $sub_type;
							if ($result)
							{
								$check = true;
							}
						}
						$varType = $className;
					}
					if(!$check)
					{
						$instanceNumber = $index;
						$type = Constants::ARRAY_KEY . "(" . $sub_type . ")";
						$varType = Constants::ARRAY_KEY . "(" . $className . ")";
						break;
					}
					$index ++;
				}
			}
			else
			{
				$check = $test($varType, $type);
				if(!$check)
				{
					$result = $value instanceof $type;
					if ($result)
					{
						$check = true;
					}
				}
			}
		}
		if(strtolower($varType) == strtolower(Constants::OBJECT) || strtolower($type) == strtolower(Constants::OBJECT))
		{
			if(strtolower($type) == strtolower(Constants::OBJECT))
			{
				$check = true;
			}
			else
			{
				$className1 = gettype($value);
				if(strtolower($className1) == strtolower(Constants::OBJECT))
				{
					$className1 = get_class($value);
				}
				$check = $test($className1, $type);
				if(!$check)
				{
					$result = $value instanceof $type;
					if ($result)
					{
						$check = true;
					}
				}
				$varType = $className1;
			}
		}
		if (!$check && $value != null)
        {
            $detailsJO[Constants::FIELD] = $memberName;
            $detailsJO[Constants::CLASS_KEY] =  $className;
            $detailsJO[Constants::INDEX] = $instanceNumber;
			$detailsJO[Constants::EXPECTED_TYPE] = $type;
			$detailsJO[Constants::GIVEN_TYPE] = $varType;
			throw new SDKException(Constants::TYPE_ERROR, "", $detailsJO, null);
        }
		if(array_key_exists(Constants::VALUES, $keyDetails) && (!array_key_exists(Constants::PICKLIST, $keyDetails) || ($keyDetails[Constants::PICKLIST] && Initializer::getInitializer()->getSDKConfig()->getPickListValidation())))
		{
			$valuesJA = $keyDetails[Constants::VALUES];
			$this->checkChoiceValue1($memberName, $className, $instanceNumber, $valuesJA, $value, $detailsJO);
		}
		if(array_key_exists(Constants::UNIQUE, $keyDetails))
		{
			$valuesArray = null;
			if(array_key_exists($name, $uniqueValuesMap))
			{
				$valuesArray = $uniqueValuesMap[$name];
				if($valuesArray != null && in_array($value, $valuesArray))
				{
					$detailsJO[Constants::FIELD] = $memberName;
					$detailsJO[Constants::CLASS_KEY] = $className;
					$detailsJO[Constants::FIRST_INDEX] = array_search($value, $valuesArray);
					$detailsJO[Constants::NEXT_INDEX] = $instanceNumber;
					throw new SDKException(Constants::UNIQUE_KEY_ERROR, "" , $detailsJO, null);
				}
			}
			else
			{
				if($valuesArray == null)
				{
					$valuesArray = array();
				}
				$valuesArray[] = $value;
				$uniqueValuesMap[$name] = $valuesArray;
			}
		}
		if(array_key_exists(Constants::MIN_LENGTH, $keyDetails) || array_key_exists(Constants::MAX_LENGTH, $keyDetails))
		{
			$count = 0;
			if(is_array($value))
			{
				$count = count($value);
			}
			else
			{
				$count = mb_strlen($value ?? '', 'utf-8');
			}
		    if(array_key_exists(Constants::MAX_LENGTH, $keyDetails) && $count > $keyDetails[Constants::MAX_LENGTH])
			{
			    $detailsJO[Constants::FIELD] =  $memberName;
			    $detailsJO[Constants::CLASS_KEY] =  $className;
			    $detailsJO[Constants::GIVEN_LENGTH] =  $count;
			    $detailsJO[Constants::MAXIMUM_LENGTH] =  $keyDetails[Constants::MAX_LENGTH];
			    throw new SDKException(Constants::MAXIMUM_LENGTH_ERROR, "", $detailsJO, null);
			}
			if(array_key_exists(Constants::MIN_LENGTH, $keyDetails) && $count < $keyDetails[Constants::MIN_LENGTH])
			{
			    $detailsJO[Constants::FIELD] =  $memberName;
			    $detailsJO[Constants::CLASS_KEY] =  $className;
			    $detailsJO[Constants::GIVEN_LENGTH] =  $count;
			    $detailsJO[Constants::MINIMUM_LENGTH] = $keyDetails[Constants::MIN_LENGTH];
				throw new SDKException(Constants::MINIMUM_LENGTH_ERROR, "", $detailsJO, null);
			}
		}
        return true;
	}

	public function checkChoiceValue($className, $keyDetails, $value)
	{
		$name = $keyDetails[Constants::NAME];
		if(array_key_exists(Constants::VALUES, $keyDetails) && $name != null && Initializer::getInitializer()->getSDKConfig()->getPickListValidation())
		{
			$valuesJA = $keyDetails[Constants::VALUES];
			$this->checkChoiceValue1($name, $className, 0, $valuesJA, $value, []);
		}
	}

	private function checkChoiceValue1($memberName, $className, $instanceNumber, $valuesJA, $value, $detailsJO)
	{
		if (is_array($value))
		{
			$value_1 = $value;
			foreach ($value_1 as $value_2)
			{
				if ($value_2 instanceof Choice)
				{
					$choice = $value_2;
					$value_2 = $choice->getValue();
				}
				if (!in_array($value_2, $valuesJA))
				{
					$detailsJO[Constants::FIELD] =  $memberName;
					$detailsJO[Constants::CLASS_KEY] = $className;
					$detailsJO[Constants::INDEX] = $instanceNumber;
					$detailsJO[Constants::GIVEN_VALUE] = $value;
					$detailsJO[Constants::ACCEPTED_VALUES] =  $valuesJA;
					throw new SDKException(Constants::UNACCEPTED_VALUES_ERROR, "", $detailsJO, null);
				}
			}
		}
		else
		{
			if ($value instanceof Choice)
			{
				$choice = $value;
				$value = $choice->getValue();
			}
			if(!in_array($value, $valuesJA)) 
			{
				$detailsJO[Constants::FIELD] = $memberName;
				$detailsJO[Constants::CLASS_KEY] = $className;
				$detailsJO[Constants::INDEX] = $instanceNumber;
				$detailsJO[Constants::GIVEN_VALUE] = $value;
				$detailsJO[Constants::ACCEPTED_VALUES] = $valuesJA;
				throw new SDKException(Constants::UNACCEPTED_VALUES_ERROR, "", $detailsJO, null);
			}
		}
	}
}