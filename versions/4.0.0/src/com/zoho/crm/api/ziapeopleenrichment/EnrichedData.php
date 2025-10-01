<?php 
namespace com\zoho\crm\api\ziapeopleenrichment;

use com\zoho\crm\api\util\Model;

class EnrichedData implements Model
{

	private  $website;
	private  $emailInfos;
	private  $gender;
	private  $companyInfo;
	private  $lastName;
	private  $educations;
	private  $middleName;
	private  $skills;
	private  $otherContacts;
	private  $addressListInfo;
	private  $primaryAddressInfo;
	private  $name;
	private  $secondaryContact;
	private  $primaryEmail;
	private  $designation;
	private  $id;
	private  $interests;
	private  $firstName;
	private  $primaryContact;
	private  $socialMedia;
	private  $keyModified=array();

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
	 * The method to get the emailInfos
	 * @return array A array representing the emailInfos
	 */
	public function getEmailInfos()
	{
		return $this->emailInfos; 

	}

	/**
	 * The method to set the value to emailInfos
	 * @param array $emailInfos A array
	 */
	public function setEmailInfos(array $emailInfos)
	{
		$this->emailInfos=$emailInfos; 
		$this->keyModified['email_infos'] = 1; 

	}

	/**
	 * The method to get the gender
	 * @return string A string representing the gender
	 */
	public function getGender()
	{
		return $this->gender; 

	}

	/**
	 * The method to set the value to gender
	 * @param string $gender A string
	 */
	public function setGender(string $gender)
	{
		$this->gender=$gender; 
		$this->keyModified['gender'] = 1; 

	}

	/**
	 * The method to get the companyInfo
	 * @return CompanyInfo An instance of CompanyInfo
	 */
	public function getCompanyInfo()
	{
		return $this->companyInfo; 

	}

	/**
	 * The method to set the value to companyInfo
	 * @param CompanyInfo $companyInfo An instance of CompanyInfo
	 */
	public function setCompanyInfo(CompanyInfo $companyInfo)
	{
		$this->companyInfo=$companyInfo; 
		$this->keyModified['company_info'] = 1; 

	}

	/**
	 * The method to get the lastName
	 * @return string A string representing the lastName
	 */
	public function getLastName()
	{
		return $this->lastName; 

	}

	/**
	 * The method to set the value to lastName
	 * @param string $lastName A string
	 */
	public function setLastName(string $lastName)
	{
		$this->lastName=$lastName; 
		$this->keyModified['last_name'] = 1; 

	}

	/**
	 * The method to get the educations
	 * @return array A array representing the educations
	 */
	public function getEducations()
	{
		return $this->educations; 

	}

	/**
	 * The method to set the value to educations
	 * @param array $educations A array
	 */
	public function setEducations(array $educations)
	{
		$this->educations=$educations; 
		$this->keyModified['educations'] = 1; 

	}

	/**
	 * The method to get the middleName
	 * @return string A string representing the middleName
	 */
	public function getMiddleName()
	{
		return $this->middleName; 

	}

	/**
	 * The method to set the value to middleName
	 * @param string $middleName A string
	 */
	public function setMiddleName(string $middleName)
	{
		$this->middleName=$middleName; 
		$this->keyModified['middle_name'] = 1; 

	}

	/**
	 * The method to get the skills
	 * @return array A array representing the skills
	 */
	public function getSkills()
	{
		return $this->skills; 

	}

	/**
	 * The method to set the value to skills
	 * @param array $skills A array
	 */
	public function setSkills(array $skills)
	{
		$this->skills=$skills; 
		$this->keyModified['skills'] = 1; 

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
	 * The method to get the addressListInfo
	 * @return array A array representing the addressListInfo
	 */
	public function getAddressListInfo()
	{
		return $this->addressListInfo; 

	}

	/**
	 * The method to set the value to addressListInfo
	 * @param array $addressListInfo A array
	 */
	public function setAddressListInfo(array $addressListInfo)
	{
		$this->addressListInfo=$addressListInfo; 
		$this->keyModified['address_list_info'] = 1; 

	}

	/**
	 * The method to get the primaryAddressInfo
	 * @return Address An instance of Address
	 */
	public function getPrimaryAddressInfo()
	{
		return $this->primaryAddressInfo; 

	}

	/**
	 * The method to set the value to primaryAddressInfo
	 * @param Address $primaryAddressInfo An instance of Address
	 */
	public function setPrimaryAddressInfo(Address $primaryAddressInfo)
	{
		$this->primaryAddressInfo=$primaryAddressInfo; 
		$this->keyModified['primary_address_info'] = 1; 

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
	 * The method to get the designation
	 * @return string A string representing the designation
	 */
	public function getDesignation()
	{
		return $this->designation; 

	}

	/**
	 * The method to set the value to designation
	 * @param string $designation A string
	 */
	public function setDesignation(string $designation)
	{
		$this->designation=$designation; 
		$this->keyModified['designation'] = 1; 

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
	 * The method to get the interests
	 * @return array A array representing the interests
	 */
	public function getInterests()
	{
		return $this->interests; 

	}

	/**
	 * The method to set the value to interests
	 * @param array $interests A array
	 */
	public function setInterests(array $interests)
	{
		$this->interests=$interests; 
		$this->keyModified['interests'] = 1; 

	}

	/**
	 * The method to get the firstName
	 * @return string A string representing the firstName
	 */
	public function getFirstName()
	{
		return $this->firstName; 

	}

	/**
	 * The method to set the value to firstName
	 * @param string $firstName A string
	 */
	public function setFirstName(string $firstName)
	{
		$this->firstName=$firstName; 
		$this->keyModified['first_name'] = 1; 

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
