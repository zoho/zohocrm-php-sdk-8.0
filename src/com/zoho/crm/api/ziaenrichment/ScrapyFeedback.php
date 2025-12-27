<?php 
namespace com\zoho\crm\api\ziaenrichment;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class ScrapyFeedback implements Model
{

	private  $enrichId;
	private  $type;
	private  $feedback;
	private  $comment;
	private  $keyModified=array();

	/**
	 * The method to get the enrichId
	 * @return Choice An instance of Choice
	 */
	public function getEnrichId()
	{
		return $this->enrichId; 

	}

	/**
	 * The method to set the value to enrichId
	 * @param Choice $enrichId An instance of Choice
	 */
	public function setEnrichId(?Choice $enrichId)
	{
		$this->enrichId=$enrichId; 
		$this->keyModified['enrich_id'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return Choice An instance of Choice
	 */
	public function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param Choice $type An instance of Choice
	 */
	public function setType(?Choice $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the feedback
	 * @return Choice An instance of Choice
	 */
	public function getFeedback()
	{
		return $this->feedback; 

	}

	/**
	 * The method to set the value to feedback
	 * @param Choice $feedback An instance of Choice
	 */
	public function setFeedback(?Choice $feedback)
	{
		$this->feedback=$feedback; 
		$this->keyModified['feedback'] = 1; 

	}

	/**
	 * The method to get the comment
	 * @return string A string representing the comment
	 */
	public function getComment()
	{
		return $this->comment; 

	}

	/**
	 * The method to set the value to comment
	 * @param string $comment A string
	 */
	public function setComment(?string $comment)
	{
		$this->comment=$comment; 
		$this->keyModified['comment'] = 1; 

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
