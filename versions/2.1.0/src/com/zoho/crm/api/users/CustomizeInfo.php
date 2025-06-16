<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\util\Model;

class CustomizeInfo implements Model
{

	private  $notesDesc;
	private  $showRightPanel;
	private  $bcView;
	private  $unpinRecentItem;
	private  $showHome;
	private  $showDetailView;
	private  $keyModified=array();

	/**
	 * The method to get the notesDesc
	 */
	public function getNotesDesc()
	{
		return $this->notesDesc; 

	}

	/**
	 * The method to set the value to notesDesc
	 * @param 
	 */
	public function setNotesDesc( $notesDesc)
	{
		$this->notesDesc=$notesDesc; 
		$this->keyModified['notes_desc'] = 1; 

	}

	/**
	 * The method to get the showRightPanel
	 */
	public function getShowRightPanel()
	{
		return $this->showRightPanel; 

	}

	/**
	 * The method to set the value to showRightPanel
	 * @param 
	 */
	public function setShowRightPanel( $showRightPanel)
	{
		$this->showRightPanel=$showRightPanel; 
		$this->keyModified['show_right_panel'] = 1; 

	}

	/**
	 * The method to get the bcView
	 */
	public function getBcView()
	{
		return $this->bcView; 

	}

	/**
	 * The method to set the value to bcView
	 * @param 
	 */
	public function setBcView( $bcView)
	{
		$this->bcView=$bcView; 
		$this->keyModified['bc_view'] = 1; 

	}

	/**
	 * The method to get the unpinRecentItem
	 */
	public function getUnpinRecentItem()
	{
		return $this->unpinRecentItem; 

	}

	/**
	 * The method to set the value to unpinRecentItem
	 * @param 
	 */
	public function setUnpinRecentItem( $unpinRecentItem)
	{
		$this->unpinRecentItem=$unpinRecentItem; 
		$this->keyModified['unpin_recent_item'] = 1; 

	}

	/**
	 * The method to get the showHome
	 * @return bool A bool representing the showHome
	 */
	public function getShowHome()
	{
		return $this->showHome; 

	}

	/**
	 * The method to set the value to showHome
	 * @param bool $showHome A bool
	 */
	public function setShowHome(bool $showHome)
	{
		$this->showHome=$showHome; 
		$this->keyModified['show_home'] = 1; 

	}

	/**
	 * The method to get the showDetailView
	 * @return bool A bool representing the showDetailView
	 */
	public function getShowDetailView()
	{
		return $this->showDetailView; 

	}

	/**
	 * The method to set the value to showDetailView
	 * @param bool $showDetailView A bool
	 */
	public function setShowDetailView(bool $showDetailView)
	{
		$this->showDetailView=$showDetailView; 
		$this->keyModified['show_detail_view'] = 1; 

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
