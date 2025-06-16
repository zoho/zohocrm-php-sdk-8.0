<?php
namespace samples\usergroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\usergroups\APIException;
use com\zoho\crm\api\usergroups\ActionWrapper;
use com\zoho\crm\api\usergroups\BodyWrapper;
use com\zoho\crm\api\usergroups\Groups;
use com\zoho\crm\api\usergroups\Source;
use com\zoho\crm\api\usergroups\Sources;
use com\zoho\crm\api\usergroups\SuccessResponse;
use com\zoho\crm\api\usergroups\UserGroupsOperations;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class CreateGroup
{
    public static function initialize()
    {
        $environment = USDataCenter::PRODUCTION();
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

    public static function createGroup()
    {
        $userGroupsOperations = new UserGroupsOperations();
        $request = new BodyWrapper();
        // List of User instances
        $userList = array();
        $user1 = new Groups();
        $user1->setName("test group1");
        $user1->setDescription("my group");
        $sources = array();
        $source = new Sources();
        $source->setType(new Choice("users"));
        $source1 = new Source();
        $source1->setId("347706118959001");
        $source->setSource($source1);
        array_push($sources, $source);
        $user1->setSources($sources);
        array_push($userList, $user1);
        $request->setUserGroups($userList);
        $response = $userGroupsOperations->createGroups($request);
        if ($response != null) {
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            $actionHandler = $response->getObject();
            if ($actionHandler instanceof ActionWrapper) {
                $responseWrapper = $actionHandler;
                $actionResponses = $responseWrapper->getUserGroups();
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo ("Details: ");
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo ($key . " : " . $value . "\n");
                        }
                        echo ("Message: " . $successResponse->getMessage()) . "\n";
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo ("Code: " . $exception->getCode()->getValue() . "\n");
                        echo ("Details: ");
                        if ($exception->getDetails() != null) {
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo ($keyName . ": " . $keyValue . "\n");
                            }
                        }
                        echo ("Message : " . $exception->getMessage() . "\n");
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                if ($exception->getDetails() != null) {
                    echo ("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo ($keyName . ": " . $keyValue . "\n");
                    }
                }
                echo ("Message : " . $exception->getMessage());
            }
        }
    }
}
CreateGroup::initialize();
CreateGroup::createGroup();
