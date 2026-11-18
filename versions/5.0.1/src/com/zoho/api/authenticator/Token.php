<?php
namespace com\zoho\api\authenticator;

use com\zoho\crm\api\util\APIHTTPConnector;

/**
 * This interface verifies and sets token to APIHTTPConnector instance.
 */
interface Token
{
    /**
     * This method to set authentication token to APIHTTPConnector instance.
     * @param APIHTTPConnector $connector A APIHTTPConnector class instance.
     */
    public function authenticate(APIHTTPConnector $urlConnection);
    public function revoke($id);
    public function remove();	
	public function generateToken();
	public function getId();
}
