<?php 
namespace com\zoho\crm\api\layouts;

use com\zoho\crm\api\util\Model;

class ConvertMapping implements Model
{

	private  $contacts;
	private  $deals;
	private  $accounts;
	private  $invoices;
	private  $salesorders;
	private  $keyModified=array();

	/**
	 * The method to get the contacts
	 * @return MinifiedLayout An instance of MinifiedLayout
	 */
	public function getContacts()
	{
		return $this->contacts; 

	}

	/**
	 * The method to set the value to contacts
	 * @param MinifiedLayout $contacts An instance of MinifiedLayout
	 */
	public function setContacts(MinifiedLayout $contacts)
	{
		$this->contacts=$contacts; 
		$this->keyModified['Contacts'] = 1; 

	}

	/**
	 * The method to get the deals
	 * @return DealLayoutMapping An instance of DealLayoutMapping
	 */
	public function getDeals()
	{
		return $this->deals; 

	}

	/**
	 * The method to set the value to deals
	 * @param DealLayoutMapping $deals An instance of DealLayoutMapping
	 */
	public function setDeals(DealLayoutMapping $deals)
	{
		$this->deals=$deals; 
		$this->keyModified['Deals'] = 1; 

	}

	/**
	 * The method to get the accounts
	 * @return MinifiedLayout An instance of MinifiedLayout
	 */
	public function getAccounts()
	{
		return $this->accounts; 

	}

	/**
	 * The method to set the value to accounts
	 * @param MinifiedLayout $accounts An instance of MinifiedLayout
	 */
	public function setAccounts(MinifiedLayout $accounts)
	{
		$this->accounts=$accounts; 
		$this->keyModified['Accounts'] = 1; 

	}

	/**
	 * The method to get the invoices
	 * @return MinifiedLayout An instance of MinifiedLayout
	 */
	public function getInvoices()
	{
		return $this->invoices; 

	}

	/**
	 * The method to set the value to invoices
	 * @param MinifiedLayout $invoices An instance of MinifiedLayout
	 */
	public function setInvoices(MinifiedLayout $invoices)
	{
		$this->invoices=$invoices; 
		$this->keyModified['Invoices'] = 1; 

	}

	/**
	 * The method to get the salesorders
	 * @return MinifiedLayout An instance of MinifiedLayout
	 */
	public function getSalesorders()
	{
		return $this->salesorders; 

	}

	/**
	 * The method to set the value to salesorders
	 * @param MinifiedLayout $salesorders An instance of MinifiedLayout
	 */
	public function setSalesorders(MinifiedLayout $salesorders)
	{
		$this->salesorders=$salesorders; 
		$this->keyModified['SalesOrders'] = 1; 

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
