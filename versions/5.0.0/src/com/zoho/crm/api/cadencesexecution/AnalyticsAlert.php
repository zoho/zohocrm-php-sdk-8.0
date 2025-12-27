<?php 
namespace com\zoho\crm\api\cadencesexecution;

use com\zoho\crm\api\util\Model;

class AnalyticsAlert implements Model
{

	private  $emailCount;
	private  $clikedEmailCount;
	private  $bouncedEmailCount;
	private  $repliedEmailCount;
	private  $emailSpamCount;
	private  $sentEmailCount;
	private  $unsentEmailCount;
	private  $openedEmailCount;
	private  $unsubscribedEmailCount;
	private  $keyModified=array();

	/**
	 * The method to get the emailCount
	 * @return int A int representing the emailCount
	 */
	public function getEmailCount()
	{
		return $this->emailCount; 

	}

	/**
	 * The method to set the value to emailCount
	 * @param int $emailCount A int
	 */
	public function setEmailCount(?int $emailCount)
	{
		$this->emailCount=$emailCount; 
		$this->keyModified['email_count'] = 1; 

	}

	/**
	 * The method to get the clikedEmailCount
	 * @return int A int representing the clikedEmailCount
	 */
	public function getClikedEmailCount()
	{
		return $this->clikedEmailCount; 

	}

	/**
	 * The method to set the value to clikedEmailCount
	 * @param int $clikedEmailCount A int
	 */
	public function setClikedEmailCount(?int $clikedEmailCount)
	{
		$this->clikedEmailCount=$clikedEmailCount; 
		$this->keyModified['cliked_email_count'] = 1; 

	}

	/**
	 * The method to get the bouncedEmailCount
	 * @return int A int representing the bouncedEmailCount
	 */
	public function getBouncedEmailCount()
	{
		return $this->bouncedEmailCount; 

	}

	/**
	 * The method to set the value to bouncedEmailCount
	 * @param int $bouncedEmailCount A int
	 */
	public function setBouncedEmailCount(?int $bouncedEmailCount)
	{
		$this->bouncedEmailCount=$bouncedEmailCount; 
		$this->keyModified['bounced_email_count'] = 1; 

	}

	/**
	 * The method to get the repliedEmailCount
	 * @return int A int representing the repliedEmailCount
	 */
	public function getRepliedEmailCount()
	{
		return $this->repliedEmailCount; 

	}

	/**
	 * The method to set the value to repliedEmailCount
	 * @param int $repliedEmailCount A int
	 */
	public function setRepliedEmailCount(?int $repliedEmailCount)
	{
		$this->repliedEmailCount=$repliedEmailCount; 
		$this->keyModified['replied_email_count'] = 1; 

	}

	/**
	 * The method to get the emailSpamCount
	 * @return int A int representing the emailSpamCount
	 */
	public function getEmailSpamCount()
	{
		return $this->emailSpamCount; 

	}

	/**
	 * The method to set the value to emailSpamCount
	 * @param int $emailSpamCount A int
	 */
	public function setEmailSpamCount(?int $emailSpamCount)
	{
		$this->emailSpamCount=$emailSpamCount; 
		$this->keyModified['email_spam_count'] = 1; 

	}

	/**
	 * The method to get the sentEmailCount
	 * @return int A int representing the sentEmailCount
	 */
	public function getSentEmailCount()
	{
		return $this->sentEmailCount; 

	}

	/**
	 * The method to set the value to sentEmailCount
	 * @param int $sentEmailCount A int
	 */
	public function setSentEmailCount(?int $sentEmailCount)
	{
		$this->sentEmailCount=$sentEmailCount; 
		$this->keyModified['sent_email_count'] = 1; 

	}

	/**
	 * The method to get the unsentEmailCount
	 * @return int A int representing the unsentEmailCount
	 */
	public function getUnsentEmailCount()
	{
		return $this->unsentEmailCount; 

	}

	/**
	 * The method to set the value to unsentEmailCount
	 * @param int $unsentEmailCount A int
	 */
	public function setUnsentEmailCount(?int $unsentEmailCount)
	{
		$this->unsentEmailCount=$unsentEmailCount; 
		$this->keyModified['unsent_email_count'] = 1; 

	}

	/**
	 * The method to get the openedEmailCount
	 * @return int A int representing the openedEmailCount
	 */
	public function getOpenedEmailCount()
	{
		return $this->openedEmailCount; 

	}

	/**
	 * The method to set the value to openedEmailCount
	 * @param int $openedEmailCount A int
	 */
	public function setOpenedEmailCount(?int $openedEmailCount)
	{
		$this->openedEmailCount=$openedEmailCount; 
		$this->keyModified['opened_email_count'] = 1; 

	}

	/**
	 * The method to get the unsubscribedEmailCount
	 * @return int A int representing the unsubscribedEmailCount
	 */
	public function getUnsubscribedEmailCount()
	{
		return $this->unsubscribedEmailCount; 

	}

	/**
	 * The method to set the value to unsubscribedEmailCount
	 * @param int $unsubscribedEmailCount A int
	 */
	public function setUnsubscribedEmailCount(?int $unsubscribedEmailCount)
	{
		$this->unsubscribedEmailCount=$unsubscribedEmailCount; 
		$this->keyModified['unsubscribed_email_count'] = 1; 

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
