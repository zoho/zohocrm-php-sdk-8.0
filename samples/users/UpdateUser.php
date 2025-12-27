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

require_once "vendor/autoload.php";

class UpdateUser
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
     * <h3> Update User </h3>
     * This method is used to update a single user and print the response.
     * @param userId - The ID of the User to be updated
     * @throws Exception
     */
    public static function updateUser(string $userId)
    {
        $usersOperations = new UsersOperations();
        
        $bodyWrapper = new BodyWrapper();
        $users = array();
        
        $user = new Users();
        $user->setFirstName("Updated Single");
        $user->setLastName("User");
        $user->setEmail("updatedsingle@example.com");
        
        array_push($users, $user);
        $bodyWrapper->setUsers($users);
        
        $response = $usersOperations->updateUser($userId, $bodyWrapper);
        
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
}
UpdateUser::initialize();
UpdateUser::updateUser("1055806000028512005");