<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Formula implements Model
{

	private  $returnType;
	private  $assumeDefault;
	private  $expression;
	private  $dynamic;
	private  $stopComputeConditionally;
	private  $stopComputeExpression;
	private  $keyModified=array();

	/**
	 * The method to get the returnType
	 * @return string A string representing the returnType
	 */
	public function getReturnType()
	{
		return $this->returnType; 

	}

	/**
	 * The method to set the value to returnType
	 * @param string $returnType A string
	 */
	public function setReturnType(string $returnType)
	{
		$this->returnType=$returnType; 
		$this->keyModified['return_type'] = 1; 

	}

	/**
	 * The method to get the assumeDefault
	 * @return bool A bool representing the assumeDefault
	 */
	public function getAssumeDefault()
	{
		return $this->assumeDefault; 

	}

	/**
	 * The method to set the value to assumeDefault
	 * @param bool $assumeDefault A bool
	 */
	public function setAssumeDefault(bool $assumeDefault)
	{
		$this->assumeDefault=$assumeDefault; 
		$this->keyModified['assume_default'] = 1; 

	}

	/**
	 * The method to get the expression
	 * @return string A string representing the expression
	 */
	public function getExpression()
	{
		return $this->expression; 

	}

	/**
	 * The method to set the value to expression
	 * @param string $expression A string
	 */
	public function setExpression(string $expression)
	{
		$this->expression=$expression; 
		$this->keyModified['expression'] = 1; 

	}

	/**
	 * The method to get the dynamic
	 * @return bool A bool representing the dynamic
	 */
	public function getDynamic()
	{
		return $this->dynamic; 

	}

	/**
	 * The method to set the value to dynamic
	 * @param bool $dynamic A bool
	 */
	public function setDynamic(bool $dynamic)
	{
		$this->dynamic=$dynamic; 
		$this->keyModified['dynamic'] = 1; 

	}

	/**
	 * The method to get the stopComputeConditionally
	 * @return bool A bool representing the stopComputeConditionally
	 */
	public function getStopComputeConditionally()
	{
		return $this->stopComputeConditionally; 

	}

	/**
	 * The method to set the value to stopComputeConditionally
	 * @param bool $stopComputeConditionally A bool
	 */
	public function setStopComputeConditionally(bool $stopComputeConditionally)
	{
		$this->stopComputeConditionally=$stopComputeConditionally; 
		$this->keyModified['stop_compute_conditionally'] = 1; 

	}

	/**
	 * The method to get the stopComputeExpression
	 * @return string A string representing the stopComputeExpression
	 */
	public function getStopComputeExpression()
	{
		return $this->stopComputeExpression; 

	}

	/**
	 * The method to set the value to stopComputeExpression
	 * @param string $stopComputeExpression A string
	 */
	public function setStopComputeExpression(string $stopComputeExpression)
	{
		$this->stopComputeExpression=$stopComputeExpression; 
		$this->keyModified['stop_compute_expression'] = 1; 

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
