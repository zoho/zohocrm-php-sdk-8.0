<?php
namespace com\zoho\crm\sample\users;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\users\APIException;
use com\zoho\crm\api\users\ActionWrapper;
use com\zoho\crm\api\users\UsersOperations;
use com\zoho\crm\api\users\BodyWrapper;
use com\zoho\crm\api\users\Users;
use com\zoho\crm\api\users\SuccessResponse;
use com\zoho\crm\api\users\Profile;
use com\zoho\crm\api\users\Role;

require_once "vendor/autoload.php";

class CreateUsers
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

    /**
     * <h3> Create Users </h3>
     * This method is used to create users and print the response.
     * @throws Exception
     */
    public static function createUsers()
    {
        $usersOperations = new UsersOperations();
        
        $bodyWrapper = new BodyWrapper();
        $users = array();
        
        $user = new Users();
        $user->setFirstName("Sample");
        $user->setLastName("User");
        $user->setEmail("sampleuser@example.com");
        
        $role = new Role();
        $role->setId("1055806000000026005");
        $user->setRole($role);
        
        $profile = new Profile();
        $profile->setId("1055806000016715008");
        $user->setProfile($profile);
        
        array_push($users, $user);
        $bodyWrapper->setUsers($users);
        
        $response = $usersOperations->createUsers($bodyWrapper);
        
        if($response != null)
        {
            echo("Status code " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getUsers();
                
                foreach($actionResponses as $actionResponse)
                {
                    if($actionResponse instanceof SuccessResponse)
                    {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Details: ");
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                            echo($key . " : " . $value . "\n");
                        }
                        echo("Message: " . $successResponse->getMessage() . "\n");
                    }
                    else if($actionResponse instanceof APIException)
                    {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Details: ");
                        foreach($exception->getDetails() as $key => $value)
                        {
                            echo($key . " : " . $value . "\n");
                        }
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            }
            else if($actionHandler instanceof APIException)
            {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus() . "\n");
                echo("Code: " . $exception->getCode() . "\n");
                echo("Details: " . print_r($exception->getDetails(), true) . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}
CreateUsers::initialize();
CreateUsers::createUsers();