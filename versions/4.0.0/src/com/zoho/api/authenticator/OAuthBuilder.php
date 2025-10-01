<?php
namespace com\zoho\api\authenticator;

use com\zoho\crm\api\UserSignature;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\exception\SDKException;

class OAuthBuilder
{
    private $clientID;
    private $clientSecret;
    private $redirectURL;
    private $refreshToken;
    private $grantToken;
    private $accessToken;
    private $id;
    private $userSignature = null;
    private $findUser = true;

    public function id($id)
    {
        $this->id = $id;
        return $this;
    }

    public function clientId(string $clientID)
    {
        Utility::assertNotNull($clientID, Constants::TOKEN_ERROR, Constants::CLIENT_ID_NULL_ERROR_MESSAGE);
        $this->clientID = $clientID;
        return $this;
    }

    public function clientSecret(string $clientSecret)
    {
        Utility::assertNotNull($clientSecret, Constants::TOKEN_ERROR, Constants::CLIENT_SECRET_NULL_ERROR_MESSAGE);
        $this->clientSecret = $clientSecret;
        return $this;
    }

    public function redirectURL(string $redirectURL)
    {
        $this->redirectURL = $redirectURL;
        return $this;
    }

    public function refreshToken(string $refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    public function grantToken(string $grantToken)
    {
        $this->grantToken = $grantToken;
        return $this;
    }

    public function accessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function findUser(bool $findUser)
    {
        $this->findUser = $findUser;
        return $this;
    }

    /**
     * @param UserSignature $userSignature
     * @return $this
     */
    public function userSignature(UserSignature $userSignature)
    {
        $this->userSignature = $userSignature;
        return $this;
    }

    public function build()
    {
        if($this->grantToken == null && $this->refreshToken == null && $this->id == null && $this->accessToken == null && $this->userSignature == null)
        {
            throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR . "-" . join(", ", Constants::OAUTH_MANDATORY_KEYS));
        }
        if ($this->grantToken != null || $this->refreshToken != null)
        {
            if ($this->clientID == null && $this->clientSecret == null)
            {
                throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR . "-" . join(", ", Constants::OAUTH_MANDATORY_KEYS1));
            }
            else
            {
                Utility::assertNotNull($this->clientID, Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR . " - " . Constants::CLIENT_ID);
                Utility::assertNotNull($this->clientSecret, Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR . " - " . Constants::CLIENT_SECRET);
            }
        }
        $class = new \ReflectionClass(OAuthToken::class);
        $constructor = $class->getConstructor();
        $constructor->setAccessible(true);
        $object = $class->newInstanceWithoutConstructor();
        $constructor->invoke($object, $this->clientID, $this->clientSecret, $this->grantToken, $this->refreshToken, $this->redirectURL, $this->id, $this->accessToken, $this->userSignature,$this->findUser);
        return $object;
    }
}