<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class AnalyticsData implements Model
{

	private  $iframeUrlTrackingCode;
	private  $urlAnalyticsEnabled;
	private  $analyticsEnabled;
	private  $analyticsEnabledTime;
	private  $trackingCode;
	private  $keyModified=array();

	/**
	 * The method to get the iframeUrlTrackingCode
	 * @return string A string representing the iframeUrlTrackingCode
	 */
	public function getIframeUrlTrackingCode()
	{
		return $this->iframeUrlTrackingCode; 

	}

	/**
	 * The method to set the value to iframeUrlTrackingCode
	 * @param string $iframeUrlTrackingCode A string
	 */
	public function setIframeUrlTrackingCode(string $iframeUrlTrackingCode)
	{
		$this->iframeUrlTrackingCode=$iframeUrlTrackingCode; 
		$this->keyModified['iframe_url_tracking_code'] = 1; 

	}

	/**
	 * The method to get the urlAnalyticsEnabled
	 * @return bool A bool representing the urlAnalyticsEnabled
	 */
	public function getUrlAnalyticsEnabled()
	{
		return $this->urlAnalyticsEnabled; 

	}

	/**
	 * The method to set the value to urlAnalyticsEnabled
	 * @param bool $urlAnalyticsEnabled A bool
	 */
	public function setUrlAnalyticsEnabled(bool $urlAnalyticsEnabled)
	{
		$this->urlAnalyticsEnabled=$urlAnalyticsEnabled; 
		$this->keyModified['url_analytics_enabled'] = 1; 

	}

	/**
	 * The method to get the analyticsEnabled
	 * @return bool A bool representing the analyticsEnabled
	 */
	public function getAnalyticsEnabled()
	{
		return $this->analyticsEnabled; 

	}

	/**
	 * The method to set the value to analyticsEnabled
	 * @param bool $analyticsEnabled A bool
	 */
	public function setAnalyticsEnabled(bool $analyticsEnabled)
	{
		$this->analyticsEnabled=$analyticsEnabled; 
		$this->keyModified['analytics_enabled'] = 1; 

	}

	/**
	 * The method to get the analyticsEnabledTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getAnalyticsEnabledTime()
	{
		return $this->analyticsEnabledTime; 

	}

	/**
	 * The method to set the value to analyticsEnabledTime
	 * @param \DateTime $analyticsEnabledTime An instance of \DateTime
	 */
	public function setAnalyticsEnabledTime(\DateTime $analyticsEnabledTime)
	{
		$this->analyticsEnabledTime=$analyticsEnabledTime; 
		$this->keyModified['analytics_enabled_time'] = 1; 

	}

	/**
	 * The method to get the trackingCode
	 * @return string A string representing the trackingCode
	 */
	public function getTrackingCode()
	{
		return $this->trackingCode; 

	}

	/**
	 * The method to set the value to trackingCode
	 * @param string $trackingCode A string
	 */
	public function setTrackingCode(string $trackingCode)
	{
		$this->trackingCode=$trackingCode; 
		$this->keyModified['tracking_code'] = 1; 

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
