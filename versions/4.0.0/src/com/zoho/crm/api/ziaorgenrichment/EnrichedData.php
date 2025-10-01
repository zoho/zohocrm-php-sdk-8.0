<?php 
namespace com\zoho\crm\api\ziaorgenrichment;

use com\zoho\crm\api\util\Model;

class EnrichedData implements Model
{

	private  $orgStatus;
	private  $description;
	private  $ceo;
	private  $secondaryEmail;
	private  $revenue;
	private  $yearsInIndustry;
	private  $otherContacts;
	private  $technoGraphicData;
	private  $logo;
	private  $secondaryContact;
	private  $id;
	private  $otherEmails;
	private  $signIn;
	private  $website;
	private  $address;
	private  $signUp;
	private  $orgType;
	private  $headQuarters;
	private  $noOfEmployees;
	private  $territoryList;
	private  $foundingYear;
	private  $industries;
	private  $name;
	private  $primaryEmail;
	private  $businessModel;
	private  $primaryContact;
	private  $socialMedia;
	private  $keyModified=array();

	/**
	 * The method to get the orgStatus
	 * @return string A string representing the orgStatus
	 */
	public function getOrgStatus()
	{
		return $this->orgStatus; 

	}

	/**
	 * The method to set the value to orgStatus
	 * @param string $orgStatus A string
	 */
	public function setOrgStatus(string $orgStatus)
	{
		$this->orgStatus=$orgStatus; 
		$this->keyModified['org_status'] = 1; 

	}

	/**
	 * The method to get the description
	 * @return array A array representing the description
	 */
	public function getDescription()
	{
		return $this->description; 

	}

	/**
	 * The method to set the value to description
	 * @param array $description A array
	 */
	public function setDescription(array $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

	}

	/**
	 * The method to get the ceo
	 * @return string A string representing the ceo
	 */
	public function getCeo()
	{
		return $this->ceo; 

	}

	/**
	 * The method to set the value to ceo
	 * @param string $ceo A string
	 */
	public function setCeo(string $ceo)
	{
		$this->ceo=$ceo; 
		$this->keyModified['ceo'] = 1; 

	}

	/**
	 * The method to get the secondaryEmail
	 * @return string A string representing the secondaryEmail
	 */
	public function getSecondaryEmail()
	{
		return $this->secondaryEmail; 

	}

	/**
	 * The method to set the value to secondaryEmail
	 * @param string $secondaryEmail A string
	 */
	public function setSecondaryEmail(string $secondaryEmail)
	{
		$this->secondaryEmail=$secondaryEmail; 
		$this->keyModified['secondary_email'] = 1; 

	}

	/**
	 * The method to get the revenue
	 * @return string A string representing the revenue
	 */
	public function getRevenue()
	{
		return $this->revenue; 

	}

	/**
	 * The method to set the value to revenue
	 * @param string $revenue A string
	 */
	public function setRevenue(string $revenue)
	{
		$this->revenue=$revenue; 
		$this->keyModified['revenue'] = 1; 

	}

	/**
	 * The method to get the yearsInIndustry
	 * @return string A string representing the yearsInIndustry
	 */
	public function getYearsInIndustry()
	{
		return $this->yearsInIndustry; 

	}

	/**
	 * The method to set the value to yearsInIndustry
	 * @param string $yearsInIndustry A string
	 */
	public function setYearsInIndustry(string $yearsInIndustry)
	{
		$this->yearsInIndustry=$yearsInIndustry; 
		$this->keyModified['years_in_industry'] = 1; 

	}

	/**
	 * The method to get the otherContacts
	 * @return array A array representing the otherContacts
	 */
	public function getOtherContacts()
	{
		return $this->otherContacts; 

	}

	/**
	 * The method to set the value to otherContacts
	 * @param array $otherContacts A array
	 */
	public function setOtherContacts(array $otherContacts)
	{
		$this->otherContacts=$otherContacts; 
		$this->keyModified['other_contacts'] = 1; 

	}

	/**
	 * The method to get the technoGraphicData
	 * @return string A string representing the technoGraphicData
	 */
	public function getTechnoGraphicData()
	{
		return $this->technoGraphicData; 

	}

	/**
	 * The method to set the value to technoGraphicData
	 * @param string $technoGraphicData A string
	 */
	public function setTechnoGraphicData(string $technoGraphicData)
	{
		$this->technoGraphicData=$technoGraphicData; 
		$this->keyModified['techno_graphic_data'] = 1; 

	}

	/**
	 * The method to get the logo
	 * @return string A string representing the logo
	 */
	public function getLogo()
	{
		return $this->logo; 

	}

	/**
	 * The method to set the value to logo
	 * @param string $logo A string
	 */
	public function setLogo(string $logo)
	{
		$this->logo=$logo; 
		$this->keyModified['logo'] = 1; 

	}

	/**
	 * The method to get the secondaryContact
	 * @return string A string representing the secondaryContact
	 */
	public function getSecondaryContact()
	{
		return $this->secondaryContact; 

	}

	/**
	 * The method to set the value to secondaryContact
	 * @param string $secondaryContact A string
	 */
	public function setSecondaryContact(string $secondaryContact)
	{
		$this->secondaryContact=$secondaryContact; 
		$this->keyModified['secondary_contact'] = 1; 

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
	 * The method to get the otherEmails
	 * @return array A array representing the otherEmails
	 */
	public function getOtherEmails()
	{
		return $this->otherEmails; 

	}

	/**
	 * The method to set the value to otherEmails
	 * @param array $otherEmails A array
	 */
	public function setOtherEmails(array $otherEmails)
	{
		$this->otherEmails=$otherEmails; 
		$this->keyModified['other_emails'] = 1; 

	}

	/**
	 * The method to get the signIn
	 * @return string A string representing the signIn
	 */
	public function getSignIn()
	{
		return $this->signIn; 

	}

	/**
	 * The method to set the value to signIn
	 * @param string $signIn A string
	 */
	public function setSignIn(string $signIn)
	{
		$this->signIn=$signIn; 
		$this->keyModified['sign_in'] = 1; 

	}

	/**
	 * The method to get the website
	 * @return string A string representing the website
	 */
	public function getWebsite()
	{
		return $this->website; 

	}

	/**
	 * The method to set the value to website
	 * @param string $website A string
	 */
	public function setWebsite(string $website)
	{
		$this->website=$website; 
		$this->keyModified['website'] = 1; 

	}

	/**
	 * The method to get the address
	 * @return array A array representing the address
	 */
	public function getAddress()
	{
		return $this->address; 

	}

	/**
	 * The method to set the value to address
	 * @param array $address A array
	 */
	public function setAddress(array $address)
	{
		$this->address=$address; 
		$this->keyModified['address'] = 1; 

	}

	/**
	 * The method to get the signUp
	 * @return string A string representing the signUp
	 */
	public function getSignUp()
	{
		return $this->signUp; 

	}

	/**
	 * The method to set the value to signUp
	 * @param string $signUp A string
	 */
	public function setSignUp(string $signUp)
	{
		$this->signUp=$signUp; 
		$this->keyModified['sign_up'] = 1; 

	}

	/**
	 * The method to get the orgType
	 * @return string A string representing the orgType
	 */
	public function getOrgType()
	{
		return $this->orgType; 

	}

	/**
	 * The method to set the value to orgType
	 * @param string $orgType A string
	 */
	public function setOrgType(string $orgType)
	{
		$this->orgType=$orgType; 
		$this->keyModified['org_type'] = 1; 

	}

	/**
	 * The method to get the headQuarters
	 * @return array A array representing the headQuarters
	 */
	public function getHeadQuarters()
	{
		return $this->headQuarters; 

	}

	/**
	 * The method to set the value to headQuarters
	 * @param array $headQuarters A array
	 */
	public function setHeadQuarters(array $headQuarters)
	{
		$this->headQuarters=$headQuarters; 
		$this->keyModified['head_quarters'] = 1; 

	}

	/**
	 * The method to get the noOfEmployees
	 * @return string A string representing the noOfEmployees
	 */
	public function getNoOfEmployees()
	{
		return $this->noOfEmployees; 

	}

	/**
	 * The method to set the value to noOfEmployees
	 * @param string $noOfEmployees A string
	 */
	public function setNoOfEmployees(string $noOfEmployees)
	{
		$this->noOfEmployees=$noOfEmployees; 
		$this->keyModified['no_of_employees'] = 1; 

	}

	/**
	 * The method to get the territoryList
	 * @return array A array representing the territoryList
	 */
	public function getTerritoryList()
	{
		return $this->territoryList; 

	}

	/**
	 * The method to set the value to territoryList
	 * @param array $territoryList A array
	 */
	public function setTerritoryList(array $territoryList)
	{
		$this->territoryList=$territoryList; 
		$this->keyModified['territory_list'] = 1; 

	}

	/**
	 * The method to get the foundingYear
	 * @return string A string representing the foundingYear
	 */
	public function getFoundingYear()
	{
		return $this->foundingYear; 

	}

	/**
	 * The method to set the value to foundingYear
	 * @param string $foundingYear A string
	 */
	public function setFoundingYear(string $foundingYear)
	{
		$this->foundingYear=$foundingYear; 
		$this->keyModified['founding_year'] = 1; 

	}

	/**
	 * The method to get the industries
	 * @return array A array representing the industries
	 */
	public function getIndustries()
	{
		return $this->industries; 

	}

	/**
	 * The method to set the value to industries
	 * @param array $industries A array
	 */
	public function setIndustries(array $industries)
	{
		$this->industries=$industries; 
		$this->keyModified['industries'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the primaryEmail
	 * @return string A string representing the primaryEmail
	 */
	public function getPrimaryEmail()
	{
		return $this->primaryEmail; 

	}

	/**
	 * The method to set the value to primaryEmail
	 * @param string $primaryEmail A string
	 */
	public function setPrimaryEmail(string $primaryEmail)
	{
		$this->primaryEmail=$primaryEmail; 
		$this->keyModified['primary_email'] = 1; 

	}

	/**
	 * The method to get the businessModel
	 * @return array A array representing the businessModel
	 */
	public function getBusinessModel()
	{
		return $this->businessModel; 

	}

	/**
	 * The method to set the value to businessModel
	 * @param array $businessModel A array
	 */
	public function setBusinessModel(array $businessModel)
	{
		$this->businessModel=$businessModel; 
		$this->keyModified['business_model'] = 1; 

	}

	/**
	 * The method to get the primaryContact
	 * @return string A string representing the primaryContact
	 */
	public function getPrimaryContact()
	{
		return $this->primaryContact; 

	}

	/**
	 * The method to set the value to primaryContact
	 * @param string $primaryContact A string
	 */
	public function setPrimaryContact(string $primaryContact)
	{
		$this->primaryContact=$primaryContact; 
		$this->keyModified['primary_contact'] = 1; 

	}

	/**
	 * The method to get the socialMedia
	 * @return array A array representing the socialMedia
	 */
	public function getSocialMedia()
	{
		return $this->socialMedia; 

	}

	/**
	 * The method to set the value to socialMedia
	 * @param array $socialMedia A array
	 */
	public function setSocialMedia(array $socialMedia)
	{
		$this->socialMedia=$socialMedia; 
		$this->keyModified['social_media'] = 1; 

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
