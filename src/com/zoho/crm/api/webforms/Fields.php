<?php 
namespace com\zoho\crm\api\webforms;

use com\zoho\crm\api\util\Model;

class Fields implements Model
{

	private  $layout;
	private  $help;
	private  $field;
	private  $module;
	private  $secretKey;
	private  $recaptchaLabel;
	private  $hidden;
	private  $siteKey;
	private  $advanced;
	private  $apiName;
	private  $fieldLabel;
	private  $theme;
	private  $id;
	private  $required;
	private  $fieldName;
	private  $dateFormat;
	private  $keyModified=array();

	/**
	 * The method to get the layout
	 * @return Layout An instance of Layout
	 */
	public function getLayout()
	{
		return $this->layout; 

	}

	/**
	 * The method to set the value to layout
	 * @param Layout $layout An instance of Layout
	 */
	public function setLayout(Layout $layout)
	{
		$this->layout=$layout; 
		$this->keyModified['layout'] = 1; 

	}

	/**
	 * The method to get the help
	 * @return string A string representing the help
	 */
	public function getHelp()
	{
		return $this->help; 

	}

	/**
	 * The method to set the value to help
	 * @param string $help A string
	 */
	public function setHelp(string $help)
	{
		$this->help=$help; 
		$this->keyModified['help'] = 1; 

	}

	/**
	 * The method to get the field
	 * @return Fields An instance of Fields
	 */
	public function getField()
	{
		return $this->field; 

	}

	/**
	 * The method to set the value to field
	 * @param Fields $field An instance of Fields
	 */
	public function setField(Fields $field)
	{
		$this->field=$field; 
		$this->keyModified['field'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return Module An instance of Module
	 */
	public function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Module $module An instance of Module
	 */
	public function setModule(Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

	/**
	 * The method to get the secretKey
	 * @return string A string representing the secretKey
	 */
	public function getSecretKey()
	{
		return $this->secretKey; 

	}

	/**
	 * The method to set the value to secretKey
	 * @param string $secretKey A string
	 */
	public function setSecretKey(string $secretKey)
	{
		$this->secretKey=$secretKey; 
		$this->keyModified['secret_key'] = 1; 

	}

	/**
	 * The method to get the recaptchaLabel
	 * @return string A string representing the recaptchaLabel
	 */
	public function getRecaptchaLabel()
	{
		return $this->recaptchaLabel; 

	}

	/**
	 * The method to set the value to recaptchaLabel
	 * @param string $recaptchaLabel A string
	 */
	public function setRecaptchaLabel(string $recaptchaLabel)
	{
		$this->recaptchaLabel=$recaptchaLabel; 
		$this->keyModified['recaptcha_label'] = 1; 

	}

	/**
	 * The method to get the hidden
	 * @return bool A bool representing the hidden
	 */
	public function getHidden()
	{
		return $this->hidden; 

	}

	/**
	 * The method to set the value to hidden
	 * @param bool $hidden A bool
	 */
	public function setHidden(bool $hidden)
	{
		$this->hidden=$hidden; 
		$this->keyModified['hidden'] = 1; 

	}

	/**
	 * The method to get the siteKey
	 * @return string A string representing the siteKey
	 */
	public function getSiteKey()
	{
		return $this->siteKey; 

	}

	/**
	 * The method to set the value to siteKey
	 * @param string $siteKey A string
	 */
	public function setSiteKey(string $siteKey)
	{
		$this->siteKey=$siteKey; 
		$this->keyModified['site_key'] = 1; 

	}

	/**
	 * The method to get the advanced
	 * @return bool A bool representing the advanced
	 */
	public function getAdvanced()
	{
		return $this->advanced; 

	}

	/**
	 * The method to set the value to advanced
	 * @param bool $advanced A bool
	 */
	public function setAdvanced(bool $advanced)
	{
		$this->advanced=$advanced; 
		$this->keyModified['advanced'] = 1; 

	}

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the fieldLabel
	 * @return string A string representing the fieldLabel
	 */
	public function getFieldLabel()
	{
		return $this->fieldLabel; 

	}

	/**
	 * The method to set the value to fieldLabel
	 * @param string $fieldLabel A string
	 */
	public function setFieldLabel(string $fieldLabel)
	{
		$this->fieldLabel=$fieldLabel; 
		$this->keyModified['field_label'] = 1; 

	}

	/**
	 * The method to get the theme
	 * @return string A string representing the theme
	 */
	public function getTheme()
	{
		return $this->theme; 

	}

	/**
	 * The method to set the value to theme
	 * @param string $theme A string
	 */
	public function setTheme(string $theme)
	{
		$this->theme=$theme; 
		$this->keyModified['theme'] = 1; 

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
	 * The method to get the required
	 * @return bool A bool representing the required
	 */
	public function getRequired()
	{
		return $this->required; 

	}

	/**
	 * The method to set the value to required
	 * @param bool $required A bool
	 */
	public function setRequired(bool $required)
	{
		$this->required=$required; 
		$this->keyModified['required'] = 1; 

	}

	/**
	 * The method to get the fieldName
	 * @return string A string representing the fieldName
	 */
	public function getFieldName()
	{
		return $this->fieldName; 

	}

	/**
	 * The method to set the value to fieldName
	 * @param string $fieldName A string
	 */
	public function setFieldName(string $fieldName)
	{
		$this->fieldName=$fieldName; 
		$this->keyModified['field_name'] = 1; 

	}

	/**
	 * The method to get the dateFormat
	 * @return string A string representing the dateFormat
	 */
	public function getDateFormat()
	{
		return $this->dateFormat; 

	}

	/**
	 * The method to set the value to dateFormat
	 * @param string $dateFormat A string
	 */
	public function setDateFormat(string $dateFormat)
	{
		$this->dateFormat=$dateFormat; 
		$this->keyModified['date_format'] = 1; 

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
