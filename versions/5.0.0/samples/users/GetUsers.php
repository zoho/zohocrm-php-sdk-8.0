<?php
namespace com\zoho\crm\sample\users;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\users\APIException;
use com\zoho\crm\api\users\ResponseWrapper;
use com\zoho\crm\api\users\UsersOperations;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\HeaderMap;

require_once "vendor/autoload.php";

class GetUsers
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
     * <h3> Get Users </h3>
     * This method is used to get the list of users and print the response.
     * @throws Exception
     */
    public static function getUsers()
    {
        $usersOperations = new UsersOperations();
        $paramInstance = new ParameterMap();
        $headerInstance = new HeaderMap();
        
        $response = $usersOperations->getUsers($paramInstance, $headerInstance);
        
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
                        }
                    }
                }
                
                $info = $responseWrapper->getInfo();
                if($info != null)
                {
                    echo("User Info PerPage: " . $info->getPerPage() . "\n");
                    echo("User Info Count: " . $info->getCount() . "\n");
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
GetUsers::initialize();
GetUsers::getUsers();