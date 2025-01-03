<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Model;

class PricingDetails extends Record implements Model
{


	/**
	 * The method to get the toRange
	 * @return float A float representing the toRange
	 */
	public function getToRange()
	{
		return $this->getKeyValue('to_range'); 

	}

	/**
	 * The method to set the value to toRange
	 * @param float $toRange A float
	 */
	public function setToRange(float $toRange)
	{
		$this->addKeyValue('to_range', $toRange); 

	}

	/**
	 * The method to get the discount
	 * @return float A float representing the discount
	 */
	public function getDiscount()
	{
		return $this->getKeyValue('discount'); 

	}

	/**
	 * The method to set the value to discount
	 * @param float $discount A float
	 */
	public function setDiscount(float $discount)
	{
		$this->addKeyValue('discount', $discount); 

	}

	/**
	 * The method to get the fromRange
	 * @return float A float representing the fromRange
	 */
	public function getFromRange()
	{
		return $this->getKeyValue('from_range'); 

	}

	/**
	 * The method to set the value to fromRange
	 * @param float $fromRange A float
	 */
	public function setFromRange(float $fromRange)
	{
		$this->addKeyValue('from_range', $fromRange); 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->getKeyValue('id'); 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->addKeyValue('id', $id); 

	}

	/**
	 * The method to get the createdBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy()
	{
		return $this->getKeyValue('Created_By'); 

	}

	/**
	 * The method to set the value to createdBy
	 * @param MinifiedUser $createdBy An instance of MinifiedUser
	 */
	public function setCreatedBy(MinifiedUser $createdBy)
	{
		$this->addKeyValue('Created_By', $createdBy); 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->getKeyValue('Created_Time'); 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->addKeyValue('Created_Time', $createdTime); 

	}

	/**
	 * The method to get the modifiedBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getModifiedBy()
	{
		return $this->getKeyValue('Modified_By'); 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param MinifiedUser $modifiedBy An instance of MinifiedUser
	 */
	public function setModifiedBy(MinifiedUser $modifiedBy)
	{
		$this->addKeyValue('Modified_By', $modifiedBy); 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->getKeyValue('Modified_Time'); 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->addKeyValue('Modified_Time', $modifiedTime); 

	}

	/**
	 * The method to get the tag
	 * @return array A array representing the tag
	 */
	public function getTag()
	{
		return $this->getKeyValue('Tag'); 

	}

	/**
	 * The method to set the value to tag
	 * @param array $tag A array
	 */
	public function setTag(array $tag)
	{
		$this->addKeyValue('Tag', $tag); 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->getKeyValue('name'); 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->addKeyValue('name', $name); 

	}
} 
