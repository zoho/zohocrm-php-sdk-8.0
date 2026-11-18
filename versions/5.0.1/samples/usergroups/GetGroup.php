<?php
namespace samples\usergroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\usergroups\APIException;
use com\zoho\crm\api\usergroups\ResponseWrapper;
use com\zoho\crm\api\usergroups\UserGroupsOperations;

require_once "vendor/autoload.php";

class GetGroup
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
    public static function getGroup(string $group)
    {
        $userGroupsOperations = new UserGroupsOperations();
        $response = $userGroupsOperations->getGroup($group);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            $responseHandler = $response->getObject();
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $users = $responseWrapper->getUserGroups();
                foreach ($users as $user) {
                    $createdBy = $user->getCreatedBy();
                    if ($createdBy != null) {
                        echo ("UserGroups Created By User-Name: " . $createdBy->getName() . "\n");
                        echo ("UserGroups Created By User-ID: " . $createdBy->getId() . "\n");
                    }
                    $modifiedBy = $user->getModifiedBy();
                    if ($modifiedBy != null) {
                        echo ("UserGroups Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        echo ("UserGroups Modified By User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    echo ("User ModifiedTime: " . date_format($user->getModifiedTime(), 'd-m-Y-H-i-s') . "\n");
                    echo ("User CreatedTime: ");
                    print_r($user->getCreatedTime());
                    echo ("\n");
                    echo ("UserGroups Description: " . $user->getDescription() . "\n");
                    echo ("UserGroups Id: " . $user->getId() . "\n");
                    echo ("UserGroups Name: " . $user->getName() . "\n");
                    $sources = $user->getSources();
                    if ($sources != null) {
                        foreach ($sources as $source) {
                            echo ("UserGroups Sources Type: " . $source->getType()->getValue() . "\n");
                            $source1 = $source->getSource();
                            if ($source1 != null) {
                                echo ("UserGroups Sources Id: " . $source1->getId() . "\n");
                            }
                            echo ("UserGroups Sources Subordinates: " . $source->getSubordinates() . "\n");
                            echo ("UserGroups Sources SubTerritories: " . $source->getSubTerritories() . "\n");
                        }
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                echo ("Details: ");
                foreach ($exception->getDetails() as $key => $value) {
                    echo ($key . ": " . $value . "\n");
                }
                echo ("Message : " . $exception->getMessage());
            }
        }
    }
}
$group = "347706117236002";
GetGroup::initialize();
GetGroup::getGroup($group);
