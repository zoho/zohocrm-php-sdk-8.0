<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class AcknowledgeVisitor implements Model
{

	private  $replyToAddress;
	private  $templateName;
	private  $autoResponseRule;
	private  $templateId;
	private  $fromAddress;
	private  $keyModified=array();

	/**
	 * The method to get the replyToAddress
	 * @return FromAddress An instance of FromAddress
	 */
	public function getReplyToAddress()
	{
		return $this->replyToAddress; 

	}

	/**
	 * The method to set the value to replyToAddress
	 * @param FromAddress $replyToAddress An instance of FromAddress
	 */
	public function setReplyToAddress(?FromAddress $replyToAddress)
	{
		$this->replyToAddress=$replyToAddress; 
		$this->keyModified['reply_to_address'] = 1; 

	}

	/**
	 * The method to get the templateName
	 * @return string A string representing the templateName
	 */
	public function getTemplateName()
	{
		return $this->templateName; 

	}

	/**
	 * The method to set the value to templateName
	 * @param string $templateName A string
	 */
	public function setTemplateName(?string $templateName)
	{
		$this->templateName=$templateName; 
		$this->keyModified['template_name'] = 1; 

	}

	/**
	 * The method to get the autoResponseRule
	 * @return AutoResponseRule An instance of AutoResponseRule
	 */
	public function getAutoResponseRule()
	{
		return $this->autoResponseRule; 

	}

	/**
	 * The method to set the value to autoResponseRule
	 * @param AutoResponseRule $autoResponseRule An instance of AutoResponseRule
	 */
	public function setAutoResponseRule(?AutoResponseRule $autoResponseRule)
	{
		$this->autoResponseRule=$autoResponseRule; 
		$this->keyModified['auto_response_rule'] = 1; 

	}

	/**
	 * The method to get the templateId
	 * @return string A string representing the templateId
	 */
	public function getTemplateId()
	{
		return $this->templateId; 

	}

	/**
	 * The method to set the value to templateId
	 * @param string $templateId A string
	 */
	public function setTemplateId(?string $templateId)
	{
		$this->templateId=$templateId; 
		$this->keyModified['template_id'] = 1; 

	}

	/**
	 * The method to get the fromAddress
	 * @return FromAddress An instance of FromAddress
	 */
	public function getFromAddress()
	{
		return $this->fromAddress; 

	}

	/**
	 * The method to set the value to fromAddress
	 * @param FromAddress $fromAddress An instance of FromAddress
	 */
	public function setFromAddress(?FromAddress $fromAddress)
	{
		$this->fromAddress=$fromAddress; 
		$this->keyModified['from_address'] = 1; 

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
