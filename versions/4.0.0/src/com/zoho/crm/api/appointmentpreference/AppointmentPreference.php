<?php 
namespace com\zoho\crm\api\appointmentpreference;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class AppointmentPreference implements Model
{

	private  $showJobSheet;
	private  $whenDurationExceeds;
	private  $whenAppointmentCompleted;
	private  $allowBookingOutsideServiceAvailability;
	private  $allowBookingOutsideBusinesshours;
	private  $dealRecordConfiguration;
	private  $keyModified=array();

	/**
	 * The method to get the showJobSheet
	 * @return bool A bool representing the showJobSheet
	 */
	public function getShowJobSheet()
	{
		return $this->showJobSheet; 

	}

	/**
	 * The method to set the value to showJobSheet
	 * @param bool $showJobSheet A bool
	 */
	public function setShowJobSheet(bool $showJobSheet)
	{
		$this->showJobSheet=$showJobSheet; 
		$this->keyModified['show_job_sheet'] = 1; 

	}

	/**
	 * The method to get the whenDurationExceeds
	 * @return string A string representing the whenDurationExceeds
	 */
	public function getWhenDurationExceeds()
	{
		return $this->whenDurationExceeds; 

	}

	/**
	 * The method to set the value to whenDurationExceeds
	 * @param string $whenDurationExceeds A string
	 */
	public function setWhenDurationExceeds(string $whenDurationExceeds)
	{
		$this->whenDurationExceeds=$whenDurationExceeds; 
		$this->keyModified['when_duration_exceeds'] = 1; 

	}

	/**
	 * The method to get the whenAppointmentCompleted
	 * @return Choice An instance of Choice
	 */
	public function getWhenAppointmentCompleted()
	{
		return $this->whenAppointmentCompleted; 

	}

	/**
	 * The method to set the value to whenAppointmentCompleted
	 * @param Choice $whenAppointmentCompleted An instance of Choice
	 */
	public function setWhenAppointmentCompleted(Choice $whenAppointmentCompleted)
	{
		$this->whenAppointmentCompleted=$whenAppointmentCompleted; 
		$this->keyModified['when_appointment_completed'] = 1; 

	}

	/**
	 * The method to get the allowBookingOutsideServiceAvailability
	 * @return bool A bool representing the allowBookingOutsideServiceAvailability
	 */
	public function getAllowBookingOutsideServiceAvailability()
	{
		return $this->allowBookingOutsideServiceAvailability; 

	}

	/**
	 * The method to set the value to allowBookingOutsideServiceAvailability
	 * @param bool $allowBookingOutsideServiceAvailability A bool
	 */
	public function setAllowBookingOutsideServiceAvailability(bool $allowBookingOutsideServiceAvailability)
	{
		$this->allowBookingOutsideServiceAvailability=$allowBookingOutsideServiceAvailability; 
		$this->keyModified['allow_booking_outside_service_availability'] = 1; 

	}

	/**
	 * The method to get the allowBookingOutsideBusinesshours
	 * @return bool A bool representing the allowBookingOutsideBusinesshours
	 */
	public function getAllowBookingOutsideBusinesshours()
	{
		return $this->allowBookingOutsideBusinesshours; 

	}

	/**
	 * The method to set the value to allowBookingOutsideBusinesshours
	 * @param bool $allowBookingOutsideBusinesshours A bool
	 */
	public function setAllowBookingOutsideBusinesshours(bool $allowBookingOutsideBusinesshours)
	{
		$this->allowBookingOutsideBusinesshours=$allowBookingOutsideBusinesshours; 
		$this->keyModified['allow_booking_outside_businesshours'] = 1; 

	}

	/**
	 * The method to get the dealRecordConfiguration
	 * @return DealRecordConfiguration An instance of DealRecordConfiguration
	 */
	public function getDealRecordConfiguration()
	{
		return $this->dealRecordConfiguration; 

	}

	/**
	 * The method to set the value to dealRecordConfiguration
	 * @param DealRecordConfiguration $dealRecordConfiguration An instance of DealRecordConfiguration
	 */
	public function setDealRecordConfiguration(DealRecordConfiguration $dealRecordConfiguration)
	{
		$this->dealRecordConfiguration=$dealRecordConfiguration; 
		$this->keyModified['deal_record_configuration'] = 1; 

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
