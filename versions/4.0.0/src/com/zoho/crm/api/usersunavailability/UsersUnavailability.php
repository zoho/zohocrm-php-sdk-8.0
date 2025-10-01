<?php 
namespace com\zoho\crm\api\usersunavailability;

use com\zoho\crm\api\util\Model;

class UsersUnavailability implements Model
{

	private  $service;
	private  $title;
	private  $allDay;
	private  $tpCalendarId;
	private  $tpEventId;
	private  $comments;
	private  $from;
	private  $id;
	private  $to;
	private  $user;
	private  $keyModified=array();

	/**
	 * The method to get the service
	 * @return string A string representing the service
	 */
	public function getService()
	{
		return $this->service; 

	}

	/**
	 * The method to set the value to service
	 * @param string $service A string
	 */
	public function setService(string $service)
	{
		$this->service=$service; 
		$this->keyModified['service'] = 1; 

	}

	/**
	 * The method to get the title
	 * @return string A string representing the title
	 */
	public function getTitle()
	{
		return $this->title; 

	}

	/**
	 * The method to set the value to title
	 * @param string $title A string
	 */
	public function setTitle(string $title)
	{
		$this->title=$title; 
		$this->keyModified['title'] = 1; 

	}

	/**
	 * The method to get the allDay
	 * @return bool A bool representing the allDay
	 */
	public function getAllDay()
	{
		return $this->allDay; 

	}

	/**
	 * The method to set the value to allDay
	 * @param bool $allDay A bool
	 */
	public function setAllDay(bool $allDay)
	{
		$this->allDay=$allDay; 
		$this->keyModified['all_day'] = 1; 

	}

	/**
	 * The method to get the tpCalendarId
	 * @return string A string representing the tpCalendarId
	 */
	public function getTpCalendarId()
	{
		return $this->tpCalendarId; 

	}

	/**
	 * The method to set the value to tpCalendarId
	 * @param string $tpCalendarId A string
	 */
	public function setTpCalendarId(string $tpCalendarId)
	{
		$this->tpCalendarId=$tpCalendarId; 
		$this->keyModified['tp_calendar_id'] = 1; 

	}

	/**
	 * The method to get the tpEventId
	 * @return string A string representing the tpEventId
	 */
	public function getTpEventId()
	{
		return $this->tpEventId; 

	}

	/**
	 * The method to set the value to tpEventId
	 * @param string $tpEventId A string
	 */
	public function setTpEventId(string $tpEventId)
	{
		$this->tpEventId=$tpEventId; 
		$this->keyModified['tp_event_id'] = 1; 

	}

	/**
	 * The method to get the comments
	 * @return string A string representing the comments
	 */
	public function getComments()
	{
		return $this->comments; 

	}

	/**
	 * The method to set the value to comments
	 * @param string $comments A string
	 */
	public function setComments(string $comments)
	{
		$this->comments=$comments; 
		$this->keyModified['comments'] = 1; 

	}

	/**
	 * The method to get the from
	 * @return \DateTime An instance of \DateTime
	 */
	public function getFrom()
	{
		return $this->from; 

	}

	/**
	 * The method to set the value to from
	 * @param \DateTime $from An instance of \DateTime
	 */
	public function setFrom(\DateTime $from)
	{
		$this->from=$from; 
		$this->keyModified['from'] = 1; 

	}

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
	 * The method to get the to
	 * @return \DateTime An instance of \DateTime
	 */
	public function getTo()
	{
		return $this->to; 

	}

	/**
	 * The method to set the value to to
	 * @param \DateTime $to An instance of \DateTime
	 */
	public function setTo(\DateTime $to)
	{
		$this->to=$to; 
		$this->keyModified['to'] = 1; 

	}

	/**
	 * The method to get the user
	 * @return User An instance of User
	 */
	public function getUser()
	{
		return $this->user; 

	}

	/**
	 * The method to set the value to user
	 * @param User $user An instance of User
	 */
	public function setUser(User $user)
	{
		$this->user=$user; 
		$this->keyModified['user'] = 1; 

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
