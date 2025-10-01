<?php
namespace com\zoho\api\authenticator\store;

use com\zoho\api\authenticator\Token;

/**
 * This interface stores the user token details.
 */
interface TokenStore
{
    /**
     * This method is used to get user token details.
     * @param Token $token A Token class instance.
     * @return Token A Token class instance representing the user token details.
     */
    public function findToken(Token $token);
    /**
     * This method is used to retrieve the user token details based on unique ID
     * @param string id A String representing the unique ID
     * @return Token | null A Token class instance representing the user token details.
     */
    public function findTokenById($id);
    /**
     * This method is used to store user token details.
     * @param Token $token A Token class instance.
     */
    public function saveToken(Token $token);
    /**
     * This method is used to delete user token details.
     * @param string id A String representing the unique ID
     */
    public function deleteToken($id);
    /**
     * The method to retrieve all the stored tokens.
     */
    public function getTokens();
    /**
     * The method to delete all the stored tokens.
     */
    public function deleteTokens();
}