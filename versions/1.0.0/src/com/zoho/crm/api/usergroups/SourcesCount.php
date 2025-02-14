<?php 
namespace com\zoho\crm\api\usergroups;

use com\zoho\crm\api\util\Model;

class SourcesCount implements Model
{

	private  $territories;
	private  $roles;
	private  $groups;
	private  $users;
	private  $keyModified=array();

	/**
	 * The method to get the territories
	 * @return int A int representing the territories
	 */
	public function getTerritories()
	{
		return $this->territories; 

	}

	/**
	 * The method to set the value to territories
	 * @param int $territories A int
	 */
	public function setTerritories(int $territories)
	{
		$this->territories=$territories; 
		$this->keyModified['territories'] = 1; 

	}

	/**
	 * The method to get the roles
	 * @return int A int representing the roles
	 */
	public function getRoles()
	{
		return $this->roles; 

	}

	/**
	 * The method to set the value to roles
	 * @param int $roles A int
	 */
	public function setRoles(int $roles)
	{
		$this->roles=$roles; 
		$this->keyModified['roles'] = 1; 

	}

	/**
	 * The method to get the groups
	 * @return int A int representing the groups
	 */
	public function getGroups()
	{
		return $this->groups; 

	}

	/**
	 * The method to set the value to groups
	 * @param int $groups A int
	 */
	public function setGroups(int $groups)
	{
		$this->groups=$groups; 
		$this->keyModified['groups'] = 1; 

	}

	/**
	 * The method to get the users
	 * @return Users An instance of Users
	 */
	public function getUsers()
	{
		return $this->users; 

	}

	/**
	 * The method to set the value to users
	 * @param Users $users An instance of Users
	 */
	public function setUsers(Users $users)
	{
		$this->users=$users; 
		$this->keyModified['users'] = 1; 

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
