<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class Groups implements Model
{

	private  $createdBy;
	private  $modifiedBy;
	private  $modifiedTime;
	private  $createdTime;
	private  $description;
	private  $id;
	private  $name;
	private  $sourcesCount;
	private  $sources;
	private  $keyModified=array();

	/**
	 * The method to get the createdBy
	 * @return Owner An instance of Owner
	 */
	public function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param Owner $createdBy An instance of Owner
	 */
	public function setCreatedBy(?Owner $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return Owner An instance of Owner
	 */
	public function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param Owner $modifiedBy An instance of Owner
	 */
	public function setModifiedBy(?Owner $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public function setModifiedTime(?\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public function setCreatedTime(?\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

	}

	/**
	 * The method to get the description
	 * @return string A string representing the description
	 */
	public function getDescription()
	{
		return $this->description; 

	}

	/**
	 * The method to set the value to description
	 * @param string $description A string
	 */
	public function setDescription(?string $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

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
	public function setId(?string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
	public function setName(?string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the sourcesCount
	 * @return SourcesCount An instance of SourcesCount
	 */
	public function getSourcesCount()
	{
		return $this->sourcesCount; 

	}

	/**
	 * The method to set the value to sourcesCount
	 * @param SourcesCount $sourcesCount An instance of SourcesCount
	 */
	public function setSourcesCount(?SourcesCount $sourcesCount)
	{
		$this->sourcesCount=$sourcesCount; 
		$this->keyModified['sources_count'] = 1; 

	}

	/**
	 * The method to get the sources
	 * @return array A array representing the sources
	 */
	public function getSources()
	{
		return $this->sources; 

	}

	/**
	 * The method to set the value to sources
	 * @param array $sources A array
	 */
	public function setSources(?array $sources)
	{
		$this->sources=$sources; 
		$this->keyModified['sources'] = 1; 

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
