<?php 
namespace com\zoho\crm\api\signals;

use com\zoho\crm\api\util\Model;

class Signals implements Model
{

	private  $displayLabel;
	private  $namespace;
	private  $chatEnabled;
	private  $enabled;
	private  $id;
	private  $featureAvailability;
	private  $extension;
	private  $keyModified=array();

	/**
	 * The method to get the displayLabel
	 * @return string A string representing the displayLabel
	 */
	public function getDisplayLabel()
	{
		return $this->displayLabel; 

	}

	/**
	 * The method to set the value to displayLabel
	 * @param string $displayLabel A string
	 */
	public function setDisplayLabel(?string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

	}

	/**
	 * The method to get the namespace
	 * @return string A string representing the namespace
	 */
	public function getNamespace()
	{
		return $this->namespace; 

	}

	/**
	 * The method to set the value to namespace
	 * @param string $namespace A string
	 */
	public function setNamespace(?string $namespace)
	{
		$this->namespace=$namespace; 
		$this->keyModified['namespace'] = 1; 

	}

	/**
	 * The method to get the chatEnabled
	 * @return bool A bool representing the chatEnabled
	 */
	public function getChatEnabled()
	{
		return $this->chatEnabled; 

	}

	/**
	 * The method to set the value to chatEnabled
	 * @param bool $chatEnabled A bool
	 */
	public function setChatEnabled(?bool $chatEnabled)
	{
		$this->chatEnabled=$chatEnabled; 
		$this->keyModified['chat_enabled'] = 1; 

	}

	/**
	 * The method to get the enabled
	 * @return bool A bool representing the enabled
	 */
	public function getEnabled()
	{
		return $this->enabled; 

	}

	/**
	 * The method to set the value to enabled
	 * @param bool $enabled A bool
	 */
	public function setEnabled(?bool $enabled)
	{
		$this->enabled=$enabled; 
		$this->keyModified['enabled'] = 1; 

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
	 * The method to get the featureAvailability
	 * @return FeatureAvailability An instance of FeatureAvailability
	 */
	public function getFeatureAvailability()
	{
		return $this->featureAvailability; 

	}

	/**
	 * The method to set the value to featureAvailability
	 * @param FeatureAvailability $featureAvailability An instance of FeatureAvailability
	 */
	public function setFeatureAvailability(?FeatureAvailability $featureAvailability)
	{
		$this->featureAvailability=$featureAvailability; 
		$this->keyModified['feature_availability'] = 1; 

	}

	/**
	 * The method to get the extension
	 * @return Extension An instance of Extension
	 */
	public function getExtension()
	{
		return $this->extension; 

	}

	/**
	 * The method to set the value to extension
	 * @param Extension $extension An instance of Extension
	 */
	public function setExtension(?Extension $extension)
	{
		$this->extension=$extension; 
		$this->keyModified['extension'] = 1; 

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
