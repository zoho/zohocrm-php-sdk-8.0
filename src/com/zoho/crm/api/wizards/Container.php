<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\layouts\Layouts;
use com\zoho\crm\api\util\Model;

class Container implements Model
{

	private  $id;
	private  $layout;
	private  $chartData;
	private  $screens;
	private  $keyModified=array();

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
	 * The method to get the layout
	 * @return Layouts An instance of Layouts
	 */
	public function getLayout()
	{
		return $this->layout; 

	}

	/**
	 * The method to set the value to layout
	 * @param Layouts $layout An instance of Layouts
	 */
	public function setLayout(Layouts $layout)
	{
		$this->layout=$layout; 
		$this->keyModified['layout'] = 1; 

	}

	/**
	 * The method to get the chartData
	 * @return ChartData An instance of ChartData
	 */
	public function getChartData()
	{
		return $this->chartData; 

	}

	/**
	 * The method to set the value to chartData
	 * @param ChartData $chartData An instance of ChartData
	 */
	public function setChartData(ChartData $chartData)
	{
		$this->chartData=$chartData; 
		$this->keyModified['chart_data'] = 1; 

	}

	/**
	 * The method to get the screens
	 * @return array A array representing the screens
	 */
	public function getScreens()
	{
		return $this->screens; 

	}

	/**
	 * The method to set the value to screens
	 * @param array $screens A array
	 */
	public function setScreens(array $screens)
	{
		$this->screens=$screens; 
		$this->keyModified['screens'] = 1; 

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
