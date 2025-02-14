<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Users extends Record implements Model
{


	/**
	 * The method to get the country
	 * @return string A string representing the country
	 */
	public function getCountry()
	{
		return $this->getKeyValue('country'); 

	}

	/**
	 * The method to set the value to country
	 * @param string $country A string
	 */
	public function setCountry(string $country)
	{
		$this->addKeyValue('country', $country); 

	}

	/**
	 * The method to get the language
	 * @return string A string representing the language
	 */
	public function getLanguage()
	{
		return $this->getKeyValue('language'); 

	}

	/**
	 * The method to set the value to language
	 * @param string $language A string
	 */
	public function setLanguage(string $language)
	{
		$this->addKeyValue('language', $language); 

	}

	/**
	 * The method to get the microsoft
	 * @return bool A bool representing the microsoft
	 */
	public function getMicrosoft()
	{
		return $this->getKeyValue('microsoft'); 

	}

	/**
	 * The method to set the value to microsoft
	 * @param bool $microsoft A bool
	 */
	public function setMicrosoft(bool $microsoft)
	{
		$this->addKeyValue('microsoft', $microsoft); 

	}

	/**
	 * The method to get the shiftEffectiveFrom
	 */
	public function getShiftEffectiveFrom()
	{
		return $this->getKeyValue('$shift_effective_from'); 

	}

	/**
	 * The method to set the value to shiftEffectiveFrom
	 * @param 
	 */
	public function setShiftEffectiveFrom( $shiftEffectiveFrom)
	{
		$this->addKeyValue('$shift_effective_from', $shiftEffectiveFrom); 

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
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public function getState()
	{
		return $this->getKeyValue('state'); 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public function setState(string $state)
	{
		$this->addKeyValue('state', $state); 

	}

	/**
	 * The method to get the fax
	 * @return string A string representing the fax
	 */
	public function getFax()
	{
		return $this->getKeyValue('fax'); 

	}

	/**
	 * The method to set the value to fax
	 * @param string $fax A string
	 */
	public function setFax(string $fax)
	{
		$this->addKeyValue('fax', $fax); 

	}

	/**
	 * The method to get the countryLocale
	 * @return string A string representing the countryLocale
	 */
	public function getCountryLocale()
	{
		return $this->getKeyValue('country_locale'); 

	}

	/**
	 * The method to set the value to countryLocale
	 * @param string $countryLocale A string
	 */
	public function setCountryLocale(string $countryLocale)
	{
		$this->addKeyValue('country_locale', $countryLocale); 

	}

	/**
	 * The method to get the zip
	 * @return string A string representing the zip
	 */
	public function getZip()
	{
		return $this->getKeyValue('zip'); 

	}

	/**
	 * The method to set the value to zip
	 * @param string $zip A string
	 */
	public function setZip(string $zip)
	{
		$this->addKeyValue('zip', $zip); 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->getKeyValue('created_time'); 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(\DateTime $createdTime)
	{
		$this->addKeyValue('created_time', $createdTime); 

	}

	/**
	 * The method to get the timeFormat
	 * @return Choice An instance of Choice
	 */
	public function getTimeFormat()
	{
		return $this->getKeyValue('time_format'); 

	}

	/**
	 * The method to set the value to timeFormat
	 * @param Choice $timeFormat An instance of Choice
	 */
	public function setTimeFormat(Choice $timeFormat)
	{
		$this->addKeyValue('time_format', $timeFormat); 

	}

	/**
	 * The method to get the offset
	 * @return int A int representing the offset
	 */
	public function getOffset()
	{
		return $this->getKeyValue('offset'); 

	}

	/**
	 * The method to set the value to offset
	 * @param int $offset A int
	 */
	public function setOffset(int $offset)
	{
		$this->addKeyValue('offset', $offset); 

	}

	/**
	 * The method to get the imapStatus
	 * @return bool A bool representing the imapStatus
	 */
	public function getImapStatus()
	{
		return $this->getKeyValue('imap_status'); 

	}

	/**
	 * The method to set the value to imapStatus
	 * @param bool $imapStatus A bool
	 */
	public function setImapStatus(bool $imapStatus)
	{
		$this->addKeyValue('imap_status', $imapStatus); 

	}

	/**
	 * The method to get the imageLink
	 * @return string A string representing the imageLink
	 */
	public function getImageLink()
	{
		return $this->getKeyValue('image_link'); 

	}

	/**
	 * The method to set the value to imageLink
	 * @param string $imageLink A string
	 */
	public function setImageLink(string $imageLink)
	{
		$this->addKeyValue('image_link', $imageLink); 

	}

	/**
	 * The method to get the ezuid
	 * @return string A string representing the ezuid
	 */
	public function getEzuid()
	{
		return $this->getKeyValue('ezuid'); 

	}

	/**
	 * The method to set the value to ezuid
	 * @param string $ezuid A string
	 */
	public function setEzuid(string $ezuid)
	{
		$this->addKeyValue('ezuid', $ezuid); 

	}

	/**
	 * The method to get the profile
	 * @return Profile An instance of Profile
	 */
	public function getProfile()
	{
		return $this->getKeyValue('profile'); 

	}

	/**
	 * The method to set the value to profile
	 * @param Profile $profile An instance of Profile
	 */
	public function setProfile(Profile $profile)
	{
		$this->addKeyValue('profile', $profile); 

	}

	/**
	 * The method to get the role
	 * @return Role An instance of Role
	 */
	public function getRole()
	{
		return $this->getKeyValue('role'); 

	}

	/**
	 * The method to set the value to role
	 * @param Role $role An instance of Role
	 */
	public function setRole(Role $role)
	{
		$this->addKeyValue('role', $role); 

	}

	/**
	 * The method to get the createdBy
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy()
	{
		return $this->getKeyValue('created_by'); 

	}

	/**
	 * The method to set the value to createdBy
	 * @param MinifiedUser $createdBy An instance of MinifiedUser
	 */
	public function setCreatedBy(MinifiedUser $createdBy)
	{
		$this->addKeyValue('created_by', $createdBy); 

	}

	/**
	 * The method to get the fullName
	 * @return string A string representing the fullName
	 */
	public function getFullName()
	{
		return $this->getKeyValue('full_name'); 

	}

	/**
	 * The method to set the value to fullName
	 * @param string $fullName A string
	 */
	public function setFullName(string $fullName)
	{
		$this->addKeyValue('full_name', $fullName); 

	}

	/**
	 * The method to get the zuid
	 * @return string A string representing the zuid
	 */
	public function getZuid()
	{
		return $this->getKeyValue('zuid'); 

	}

	/**
	 * The method to set the value to zuid
	 * @param string $zuid A string
	 */
	public function setZuid(string $zuid)
	{
		$this->addKeyValue('zuid', $zuid); 

	}

	/**
	 * The method to get the phone
	 * @return string A string representing the phone
	 */
	public function getPhone()
	{
		return $this->getKeyValue('phone'); 

	}

	/**
	 * The method to set the value to phone
	 * @param string $phone A string
	 */
	public function setPhone(string $phone)
	{
		$this->addKeyValue('phone', $phone); 

	}

	/**
	 * The method to get the dob
	 * @return \DateTime An instance of \DateTime
	 */
	public function getDob()
	{
		return $this->getKeyValue('dob'); 

	}

	/**
	 * The method to set the value to dob
	 * @param \DateTime $dob An instance of \DateTime
	 */
	public function setDob(\DateTime $dob)
	{
		$this->addKeyValue('dob', $dob); 

	}

	/**
	 * The method to get the status
	 * @return string A string representing the status
	 */
	public function getStatus()
	{
		return $this->getKeyValue('status'); 

	}

	/**
	 * The method to set the value to status
	 * @param string $status A string
	 */
	public function setStatus(string $status)
	{
		$this->addKeyValue('status', $status); 

	}

	/**
	 * The method to get the customizeInfo
	 * @return CustomizeInfo An instance of CustomizeInfo
	 */
	public function getCustomizeInfo()
	{
		return $this->getKeyValue('customize_info'); 

	}

	/**
	 * The method to set the value to customizeInfo
	 * @param CustomizeInfo $customizeInfo An instance of CustomizeInfo
	 */
	public function setCustomizeInfo(CustomizeInfo $customizeInfo)
	{
		$this->addKeyValue('customize_info', $customizeInfo); 

	}

	/**
	 * The method to get the city
	 * @return string A string representing the city
	 */
	public function getCity()
	{
		return $this->getKeyValue('city'); 

	}

	/**
	 * The method to set the value to city
	 * @param string $city A string
	 */
	public function setCity(string $city)
	{
		$this->addKeyValue('city', $city); 

	}

	/**
	 * The method to get the signature
	 * @return string A string representing the signature
	 */
	public function getSignature()
	{
		return $this->getKeyValue('signature'); 

	}

	/**
	 * The method to set the value to signature
	 * @param string $signature A string
	 */
	public function setSignature(string $signature)
	{
		$this->addKeyValue('signature', $signature); 

	}

	/**
	 * The method to get the sortOrderPreferenceS
	 * @return string A string representing the sortOrderPreferenceS
	 */
	public function getSortOrderPreferenceS()
	{
		return $this->getKeyValue('sort_order_preference__s'); 

	}

	/**
	 * The method to set the value to sortOrderPreferenceS
	 * @param string $sortOrderPreferenceS A string
	 */
	public function setSortOrderPreferenceS(string $sortOrderPreferenceS)
	{
		$this->addKeyValue('sort_order_preference__s', $sortOrderPreferenceS); 

	}

	/**
	 * The method to get the category
	 * @return string A string representing the category
	 */
	public function getCategory()
	{
		return $this->getKeyValue('category'); 

	}

	/**
	 * The method to set the value to category
	 * @param string $category A string
	 */
	public function setCategory(string $category)
	{
		$this->addKeyValue('category', $category); 

	}

	/**
	 * The method to get the dateFormat
	 * @return Choice An instance of Choice
	 */
	public function getDateFormat()
	{
		return $this->getKeyValue('date_format'); 

	}

	/**
	 * The method to set the value to dateFormat
	 * @param Choice $dateFormat An instance of Choice
	 */
	public function setDateFormat(Choice $dateFormat)
	{
		$this->addKeyValue('date_format', $dateFormat); 

	}

	/**
	 * The method to get the confirm
	 * @return bool A bool representing the confirm
	 */
	public function getConfirm()
	{
		return $this->getKeyValue('confirm'); 

	}

	/**
	 * The method to set the value to confirm
	 * @param bool $confirm A bool
	 */
	public function setConfirm(bool $confirm)
	{
		$this->addKeyValue('confirm', $confirm); 

	}

	/**
	 * The method to get the decimalSeparator
	 * @return Choice An instance of Choice
	 */
	public function getDecimalSeparator()
	{
		return $this->getKeyValue('decimal_separator'); 

	}

	/**
	 * The method to set the value to decimalSeparator
	 * @param Choice $decimalSeparator An instance of Choice
	 */
	public function setDecimalSeparator(Choice $decimalSeparator)
	{
		$this->addKeyValue('decimal_separator', $decimalSeparator); 

	}

	/**
	 * The method to get the numberSeparator
	 * @return Choice An instance of Choice
	 */
	public function getNumberSeparator()
	{
		return $this->getKeyValue('number_separator'); 

	}

	/**
	 * The method to set the value to numberSeparator
	 * @param Choice $numberSeparator An instance of Choice
	 */
	public function setNumberSeparator(Choice $numberSeparator)
	{
		$this->addKeyValue('number_separator', $numberSeparator); 

	}

	/**
	 * The method to get the timeZone
	 * @return \DateTimeZone An instance of \DateTimeZone
	 */
	public function getTimeZone()
	{
		return $this->getKeyValue('time_zone'); 

	}

	/**
	 * The method to set the value to timeZone
	 * @param \DateTimeZone $timeZone An instance of \DateTimeZone
	 */
	public function setTimeZone(\DateTimeZone $timeZone)
	{
		$this->addKeyValue('time_zone', $timeZone); 

	}

	/**
	 * The method to get the lastName
	 * @return string A string representing the lastName
	 */
	public function getLastName()
	{
		return $this->getKeyValue('last_name'); 

	}

	/**
	 * The method to set the value to lastName
	 * @param string $lastName A string
	 */
	public function setLastName(string $lastName)
	{
		$this->addKeyValue('last_name', $lastName); 

	}

	/**
	 * The method to get the mobile
	 * @return string A string representing the mobile
	 */
	public function getMobile()
	{
		return $this->getKeyValue('mobile'); 

	}

	/**
	 * The method to set the value to mobile
	 * @param string $mobile A string
	 */
	public function setMobile(string $mobile)
	{
		$this->addKeyValue('mobile', $mobile); 

	}

	/**
	 * The method to get the currentShift
	 * @return Shift An instance of Shift
	 */
	public function getCurrentShift()
	{
		return $this->getKeyValue('$current_shift'); 

	}

	/**
	 * The method to set the value to currentShift
	 * @param Shift $currentShift An instance of Shift
	 */
	public function setCurrentShift(Shift $currentShift)
	{
		$this->addKeyValue('$current_shift', $currentShift); 

	}

	/**
	 * The method to get the reportingTo
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getReportingTo()
	{
		return $this->getKeyValue('Reporting_To'); 

	}

	/**
	 * The method to set the value to reportingTo
	 * @param MinifiedUser $reportingTo An instance of MinifiedUser
	 */
	public function setReportingTo(MinifiedUser $reportingTo)
	{
		$this->addKeyValue('Reporting_To', $reportingTo); 

	}

	/**
	 * The method to get the currency
	 * @return string A string representing the currency
	 */
	public function getCurrency()
	{
		return $this->getKeyValue('Currency'); 

	}

	/**
	 * The method to set the value to currency
	 * @param string $currency A string
	 */
	public function setCurrency(string $currency)
	{
		$this->addKeyValue('Currency', $currency); 

	}

	/**
	 * The method to get the nextShift
	 * @return Shift An instance of Shift
	 */
	public function getNextShift()
	{
		return $this->getKeyValue('$next_shift'); 

	}

	/**
	 * The method to set the value to nextShift
	 * @param Shift $nextShift An instance of Shift
	 */
	public function setNextShift(Shift $nextShift)
	{
		$this->addKeyValue('$next_shift', $nextShift); 

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
	 * The method to get the website
	 * @return string A string representing the website
	 */
	public function getWebsite()
	{
		return $this->getKeyValue('website'); 

	}

	/**
	 * The method to set the value to website
	 * @param string $website A string
	 */
	public function setWebsite(string $website)
	{
		$this->addKeyValue('website', $website); 

	}

	/**
	 * The method to get the statusReasonS
	 * @return string A string representing the statusReasonS
	 */
	public function getStatusReasonS()
	{
		return $this->getKeyValue('status_reason__s'); 

	}

	/**
	 * The method to set the value to statusReasonS
	 * @param string $statusReasonS A string
	 */
	public function setStatusReasonS(string $statusReasonS)
	{
		$this->addKeyValue('status_reason__s', $statusReasonS); 

	}

	/**
	 * The method to get the email
	 * @return string A string representing the email
	 */
	public function getEmail()
	{
		return $this->getKeyValue('email'); 

	}

	/**
	 * The method to set the value to email
	 * @param string $email A string
	 */
	public function setEmail(string $email)
	{
		$this->addKeyValue('email', $email); 

	}

	/**
	 * The method to get the firstName
	 * @return string A string representing the firstName
	 */
	public function getFirstName()
	{
		return $this->getKeyValue('first_name'); 

	}

	/**
	 * The method to set the value to firstName
	 * @param string $firstName A string
	 */
	public function setFirstName(string $firstName)
	{
		$this->addKeyValue('first_name', $firstName); 

	}

	/**
	 * The method to get the sandboxdeveloper
	 * @return bool A bool representing the sandboxdeveloper
	 */
	public function getSandboxdeveloper()
	{
		return $this->getKeyValue('sandboxDeveloper'); 

	}

	/**
	 * The method to set the value to sandboxdeveloper
	 * @param bool $sandboxdeveloper A bool
	 */
	public function setSandboxdeveloper(bool $sandboxdeveloper)
	{
		$this->addKeyValue('sandboxDeveloper', $sandboxdeveloper); 

	}

	/**
	 * The method to get the alias
	 * @return string A string representing the alias
	 */
	public function getAlias()
	{
		return $this->getKeyValue('alias'); 

	}

	/**
	 * The method to set the value to alias
	 * @param string $alias A string
	 */
	public function setAlias(string $alias)
	{
		$this->addKeyValue('alias', $alias); 

	}

	/**
	 * The method to get the street
	 * @return string A string representing the street
	 */
	public function getStreet()
	{
		return $this->getKeyValue('street'); 

	}

	/**
	 * The method to set the value to street
	 * @param string $street A string
	 */
	public function setStreet(string $street)
	{
		$this->addKeyValue('street', $street); 

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
	 * The method to get the isonline
	 * @return bool A bool representing the isonline
	 */
	public function getIsonline()
	{
		return $this->getKeyValue('Isonline'); 

	}

	/**
	 * The method to set the value to isonline
	 * @param bool $isonline A bool
	 */
	public function setIsonline(bool $isonline)
	{
		$this->addKeyValue('Isonline', $isonline); 

	}

	/**
	 * The method to get the locale
	 * @return string A string representing the locale
	 */
	public function getLocale()
	{
		return $this->getKeyValue('locale'); 

	}

	/**
	 * The method to set the value to locale
	 * @param string $locale A string
	 */
	public function setLocale(string $locale)
	{
		$this->addKeyValue('locale', $locale); 

	}

	/**
	 * The method to get the nameFormatS
	 * @return Choice An instance of Choice
	 */
	public function getNameFormatS()
	{
		return $this->getKeyValue('name_format__s'); 

	}

	/**
	 * The method to set the value to nameFormatS
	 * @param Choice $nameFormatS An instance of Choice
	 */
	public function setNameFormatS(Choice $nameFormatS)
	{
		$this->addKeyValue('name_format__s', $nameFormatS); 

	}

	/**
	 * The method to get the personalAccount
	 * @return bool A bool representing the personalAccount
	 */
	public function getPersonalAccount()
	{
		return $this->getKeyValue('personal_account'); 

	}

	/**
	 * The method to set the value to personalAccount
	 * @param bool $personalAccount A bool
	 */
	public function setPersonalAccount(bool $personalAccount)
	{
		$this->addKeyValue('personal_account', $personalAccount); 

	}

	/**
	 * The method to get the defaultTabGroup
	 * @return string A string representing the defaultTabGroup
	 */
	public function getDefaultTabGroup()
	{
		return $this->getKeyValue('default_tab_group'); 

	}

	/**
	 * The method to set the value to defaultTabGroup
	 * @param string $defaultTabGroup A string
	 */
	public function setDefaultTabGroup(string $defaultTabGroup)
	{
		$this->addKeyValue('default_tab_group', $defaultTabGroup); 

	}

	/**
	 * The method to get the theme
	 * @return Theme An instance of Theme
	 */
	public function getTheme()
	{
		return $this->getKeyValue('theme'); 

	}

	/**
	 * The method to set the value to theme
	 * @param Theme $theme An instance of Theme
	 */
	public function setTheme(Theme $theme)
	{
		$this->addKeyValue('theme', $theme); 

	}

	/**
	 * The method to get the ntcNotificationType
	 * @return array A array representing the ntcNotificationType
	 */
	public function getNtcNotificationType()
	{
		return $this->getKeyValue('ntc_notification_type'); 

	}

	/**
	 * The method to set the value to ntcNotificationType
	 * @param array $ntcNotificationType A array
	 */
	public function setNtcNotificationType(array $ntcNotificationType)
	{
		$this->addKeyValue('ntc_notification_type', $ntcNotificationType); 

	}

	/**
	 * The method to get the ntcEnabled
	 * @return bool A bool representing the ntcEnabled
	 */
	public function getNtcEnabled()
	{
		return $this->getKeyValue('ntc_enabled'); 

	}

	/**
	 * The method to set the value to ntcEnabled
	 * @param bool $ntcEnabled A bool
	 */
	public function setNtcEnabled(bool $ntcEnabled)
	{
		$this->addKeyValue('ntc_enabled', $ntcEnabled); 

	}

	/**
	 * The method to get the rtlEnabled
	 * @return bool A bool representing the rtlEnabled
	 */
	public function getRtlEnabled()
	{
		return $this->getKeyValue('rtl_enabled'); 

	}

	/**
	 * The method to set the value to rtlEnabled
	 * @param bool $rtlEnabled A bool
	 */
	public function setRtlEnabled(bool $rtlEnabled)
	{
		$this->addKeyValue('rtl_enabled', $rtlEnabled); 

	}

	/**
	 * The method to get the telephonyEnabled
	 * @return bool A bool representing the telephonyEnabled
	 */
	public function getTelephonyEnabled()
	{
		return $this->getKeyValue('telephony_enabled'); 

	}

	/**
	 * The method to set the value to telephonyEnabled
	 * @param bool $telephonyEnabled A bool
	 */
	public function setTelephonyEnabled(bool $telephonyEnabled)
	{
		$this->addKeyValue('telephony_enabled', $telephonyEnabled); 

	}

	/**
	 * The method to get the sortOrderPreference
	 * @return string A string representing the sortOrderPreference
	 */
	public function getSortOrderPreference()
	{
		return $this->getKeyValue('sort_order_preference'); 

	}

	/**
	 * The method to set the value to sortOrderPreference
	 * @param string $sortOrderPreference A string
	 */
	public function setSortOrderPreference(string $sortOrderPreference)
	{
		$this->addKeyValue('sort_order_preference', $sortOrderPreference); 

	}

	/**
	 * The method to get the createdBy17
	 * @return MinifiedUser An instance of MinifiedUser
	 */
	public function getCreatedBy17()
	{
		return $this->getKeyValue('Created_By'); 

	}

	/**
	 * The method to set the value to createdBy17
	 * @param MinifiedUser $createdBy17 An instance of MinifiedUser
	 */
	public function setCreatedBy17(MinifiedUser $createdBy17)
	{
		$this->addKeyValue('Created_By', $createdBy17); 

	}

	/**
	 * The method to get the createdTime9
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime9()
	{
		return $this->getKeyValue('Created_Time'); 

	}

	/**
	 * The method to set the value to createdTime9
	 * @param \DateTime $createdTime9 An instance of \DateTime
	 */
	public function setCreatedTime9(\DateTime $createdTime9)
	{
		$this->addKeyValue('Created_Time', $createdTime9); 

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
