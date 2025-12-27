<?php
namespace com\zoho\crm\sample\users;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\users\APIException;
use com\zoho\crm\api\users\ResponseWrapper;
use com\zoho\crm\api\users\UsersOperations;
use com\zoho\crm\api\HeaderMap;

require_once "vendor/autoload.php";

class GetUser
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
     * <h3> Get User </h3>
     * This method is used to get a single user and print the response.
     * @param userId - The ID of the User to be obtained
     * @throws Exception
     */
    public static function getUser(string $userId)
    {
        $usersOperations = new UsersOperations();
        $headerInstance = new HeaderMap();
        
        $response = $usersOperations->getUser($userId, $headerInstance);
        
        if($response != null)
        {
            echo("Status code " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $userList = $responseWrapper->getUsers();

                if($userList != null)
                {
                    foreach($userList as $user)
                    {
                        echo("User ID: " . $user->getId() . "\n");
                        echo("User Name: " . $user->getName() . "\n");
                        echo("User Email: " . $user->getEmail() . "\n");
                        echo("User Status: " . $user->getStatus() . "\n");
                        echo("User First Name: " . $user->getFirstName() . "\n");
                        echo("User Last Name: " . $user->getLastName() . "\n");
                        
                        $role = $user->getRole();
                        if($role != null)
                        {
                            echo("User Role Name: " . $role->getName() . "\n");
                            echo("User Role ID: " . $role->getId() . "\n");
                        }
                        
                        $profile = $user->getProfile();
                        if($profile != null)
                        {
                            echo("User Profile Name: " . $profile->getName() . "\n");
                            echo("User Profile ID: " . $profile->getId() . "\n");
                        }
                        
                        $reportingTo = $user->getReportingTo();
                        if($reportingTo != null)
                        {
                            echo("User Reporting To: " . $reportingTo->getName() . "\n");
                        }
                    }
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
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
GetUser::initialize();
GetUser::getUser("1055806000028512005");