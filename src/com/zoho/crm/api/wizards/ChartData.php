<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class ChartData implements Model
{

	private  $nodes;
	private  $connections;
	private  $colorPalette;
	private  $canvasWidth;
	private  $canvasHeight;
	private  $keyModified=array();

	/**
	 * The method to get the nodes
	 * @return array A array representing the nodes
	 */
	public function getNodes()
	{
		return $this->nodes; 

	}

	/**
	 * The method to set the value to nodes
	 * @param array $nodes A array
	 */
	public function setNodes(array $nodes)
	{
		$this->nodes=$nodes; 
		$this->keyModified['nodes'] = 1; 

	}

	/**
	 * The method to get the connections
	 * @return array A array representing the connections
	 */
	public function getConnections()
	{
		return $this->connections; 

	}

	/**
	 * The method to set the value to connections
	 * @param array $connections A array
	 */
	public function setConnections(array $connections)
	{
		$this->connections=$connections; 
		$this->keyModified['connections'] = 1; 

	}

	/**
	 * The method to get the colorPalette
	 * @return ButtonBackground An instance of ButtonBackground
	 */
	public function getColorPalette()
	{
		return $this->colorPalette; 

	}

	/**
	 * The method to set the value to colorPalette
	 * @param ButtonBackground $colorPalette An instance of ButtonBackground
	 */
	public function setColorPalette(ButtonBackground $colorPalette)
	{
		$this->colorPalette=$colorPalette; 
		$this->keyModified['color_palette'] = 1; 

	}

	/**
	 * The method to get the canvasWidth
	 * @return int A int representing the canvasWidth
	 */
	public function getCanvasWidth()
	{
		return $this->canvasWidth; 

	}

	/**
	 * The method to set the value to canvasWidth
	 * @param int $canvasWidth A int
	 */
	public function setCanvasWidth(int $canvasWidth)
	{
		$this->canvasWidth=$canvasWidth; 
		$this->keyModified['canvas_width'] = 1; 

	}

	/**
	 * The method to get the canvasHeight
	 * @return int A int representing the canvasHeight
	 */
	public function getCanvasHeight()
	{
		return $this->canvasHeight; 

	}

	/**
	 * The method to set the value to canvasHeight
	 * @param int $canvasHeight A int
	 */
	public function setCanvasHeight(int $canvasHeight)
	{
		$this->canvasHeight=$canvasHeight; 
		$this->keyModified['canvas_height'] = 1; 

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
