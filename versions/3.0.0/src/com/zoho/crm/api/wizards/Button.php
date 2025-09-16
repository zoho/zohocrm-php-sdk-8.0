<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class Button implements Model
{

	private  $id;
	private  $sequenceNumber;
	private  $displayLabel;
	private  $criteria;
	private  $targetScreen;
	private  $type;
	private  $message;
	private  $color;
	private  $shape;
	private  $backgroundColor;
	private  $visibility;
	private  $resource;
	private  $transition;
	private  $category;
	private  $referenceId;
	private  $keyModified=array();

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the sequenceNumber
	 * @return int A int representing the sequenceNumber
	 */
	public function getSequenceNumber()
	{
		return $this->sequenceNumber; 

	}

	/**
	 * The method to set the value to sequenceNumber
	 * @param int $sequenceNumber A int
	 */
	public function setSequenceNumber(int $sequenceNumber)
	{
		$this->sequenceNumber=$sequenceNumber; 
		$this->keyModified['sequence_number'] = 1; 

	}

	/**
	 * The method to get the displayLabel
	 * @return string A string representing the displayLabel
	 */
	public function getDisplayLabel()
	{
		return $this->displayLabel; 

	}

	/**
	 * The method to set the value to displayLabel
	 * @param string $displayLabel A string
	 */
	public function setDisplayLabel(string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return Criteria An instance of Criteria
	 */
	public function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param Criteria $criteria An instance of Criteria
	 */
	public function setCriteria(Criteria $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

	}

	/**
	 * The method to get the targetScreen
	 * @return Screen An instance of Screen
	 */
	public function getTargetScreen()
	{
		return $this->targetScreen; 

	}

	/**
	 * The method to set the value to targetScreen
	 * @param Screen $targetScreen An instance of Screen
	 */
	public function setTargetScreen(Screen $targetScreen)
	{
		$this->targetScreen=$targetScreen; 
		$this->keyModified['target_screen'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the message
	 * @return Message An instance of Message
	 */
	public function getMessage()
	{
		return $this->message; 

	}

	/**
	 * The method to set the value to message
	 * @param Message $message An instance of Message
	 */
	public function setMessage(Message $message)
	{
		$this->message=$message; 
		$this->keyModified['message'] = 1; 

	}

	/**
	 * The method to get the color
	 * @return string A string representing the color
	 */
	public function getColor()
	{
		return $this->color; 

	}

	/**
	 * The method to set the value to color
	 * @param string $color A string
	 */
	public function setColor(string $color)
	{
		$this->color=$color; 
		$this->keyModified['color'] = 1; 

	}

	/**
	 * The method to get the shape
	 * @return string A string representing the shape
	 */
	public function getShape()
	{
		return $this->shape; 

	}

	/**
	 * The method to set the value to shape
	 * @param string $shape A string
	 */
	public function setShape(string $shape)
	{
		$this->shape=$shape; 
		$this->keyModified['shape'] = 1; 

	}

	/**
	 * The method to get the backgroundColor
	 * @return string A string representing the backgroundColor
	 */
	public function getBackgroundColor()
	{
		return $this->backgroundColor; 

	}

	/**
	 * The method to set the value to backgroundColor
	 * @param string $backgroundColor A string
	 */
	public function setBackgroundColor(string $backgroundColor)
	{
		$this->backgroundColor=$backgroundColor; 
		$this->keyModified['background_color'] = 1; 

	}

	/**
	 * The method to get the visibility
	 * @return string A string representing the visibility
	 */
	public function getVisibility()
	{
		return $this->visibility; 

	}

	/**
	 * The method to set the value to visibility
	 * @param string $visibility A string
	 */
	public function setVisibility(string $visibility)
	{
		$this->visibility=$visibility; 
		$this->keyModified['visibility'] = 1; 

	}

	/**
	 * The method to get the resource
	 */
	public function getResource()
	{
		return $this->resource; 

	}

	/**
	 * The method to set the value to resource
	 * @param 
	 */
	public function setResource( $resource)
	{
		$this->resource=$resource; 
		$this->keyModified['resource'] = 1; 

	}

	/**
	 * The method to get the transition
	 * @return Transition An instance of Transition
	 */
	public function getTransition()
	{
		return $this->transition; 

	}

	/**
	 * The method to set the value to transition
	 * @param Transition $transition An instance of Transition
	 */
	public function setTransition(Transition $transition)
	{
		$this->transition=$transition; 
		$this->keyModified['transition'] = 1; 

	}

	/**
	 * The method to get the category
	 * @return string A string representing the category
	 */
	public function getCategory()
	{
		return $this->category; 

	}

	/**
	 * The method to set the value to category
	 * @param string $category A string
	 */
	public function setCategory(string $category)
	{
		$this->category=$category; 
		$this->keyModified['category'] = 1; 

	}

	/**
	 * The method to get the referenceId
	 * @return string A string representing the referenceId
	 */
	public function getReferenceId()
	{
		return $this->referenceId; 

	}

	/**
	 * The method to set the value to referenceId
	 * @param string $referenceId A string
	 */
	public function setReferenceId(string $referenceId)
	{
		$this->referenceId=$referenceId; 
		$this->keyModified['reference_id'] = 1; 

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
