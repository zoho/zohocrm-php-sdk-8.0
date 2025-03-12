<?php 
namespace com\zoho\crm\api\wizards;

use com\zoho\crm\api\util\Model;

class Node implements Model
{

	private  $posY;
	private  $posX;
	private  $startNode;
	private  $screen;
	private  $keyModified=array();

	/**
	 * The method to get the posY
	 * @return int A int representing the posY
	 */
	public function getPosY()
	{
		return $this->posY; 

	}

	/**
	 * The method to set the value to posY
	 * @param int $posY A int
	 */
	public function setPosY(int $posY)
	{
		$this->posY=$posY; 
		$this->keyModified['pos_y'] = 1; 

	}

	/**
	 * The method to get the posX
	 * @return int A int representing the posX
	 */
	public function getPosX()
	{
		return $this->posX; 

	}

	/**
	 * The method to set the value to posX
	 * @param int $posX A int
	 */
	public function setPosX(int $posX)
	{
		$this->posX=$posX; 
		$this->keyModified['pos_x'] = 1; 

	}

	/**
	 * The method to get the startNode
	 * @return bool A bool representing the startNode
	 */
	public function getStartNode()
	{
		return $this->startNode; 

	}

	/**
	 * The method to set the value to startNode
	 * @param bool $startNode A bool
	 */
	public function setStartNode(bool $startNode)
	{
		$this->startNode=$startNode; 
		$this->keyModified['start_node'] = 1; 

	}

	/**
	 * The method to get the screen
	 * @return Screen An instance of Screen
	 */
	public function getScreen()
	{
		return $this->screen; 

	}

	/**
	 * The method to set the value to screen
	 * @param Screen $screen An instance of Screen
	 */
	public function setScreen(Screen $screen)
	{
		$this->screen=$screen; 
		$this->keyModified['screen'] = 1; 

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
