<?php
namespace samples\profile;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\profiles\APIException;
use com\zoho\crm\api\profiles\ProfilesOperations;
use com\zoho\crm\api\profiles\BodyWrapper;
use com\zoho\crm\api\profiles\Profile;
use com\zoho\crm\api\profiles\SuccessResponse;
use com\zoho\crm\api\profiles\ActionWrapper;

require_once "vendor/autoload.php";

class UpdateProfile
{
    public static function initialize()
    {
        $environment = INDataCenter::PRODUCTION();
        $token = (new OAuthBuilder())
            ->clientId("client_id")
            ->clientSecret("client_secret")
            ->refreshToken("refresh_token")
            ->build();
        (new InitializeBuilder())
            ->environment($environment)
            ->token($token)
            ->initialize();
    }

    public static function updateProfile(string $profileId)
    {
        $profilesOperations = new ProfilesOperations();
        $bodyWrapper = new BodyWrapper();
        
        $profile = new Profile();
        $profile->setName("Updated Profile Name");
        $profile->setDescription("Updated profile description");
        
        $profiles = array($profile);
        $bodyWrapper->setProfiles($profiles);
        
        $response = $profilesOperations->updateProfile($profileId, $bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getProfiles();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        
                        if ($successResponse->getDetails() != null) {
                            echo("Details: \n");
                            foreach ($successResponse->getDetails() as $key => $value) {
                                echo($key . ": " . $value . "\n");
                            }
                        }
                        
                        echo("Message: " . $successResponse->getMessage() . "\n");
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        
                        if ($exception->getDetails() != null) {
                            echo("Details: \n");
                            foreach ($exception->getDetails() as $key => $value) {
                                echo($key . ": " . $value . "\n");
                            }
                        }
                        
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

UpdateProfile::initialize();
UpdateProfile::updateProfile("4876876000000006758");