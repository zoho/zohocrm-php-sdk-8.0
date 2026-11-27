<?php
namespace samples\usergroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\usergroups\APIException;
use com\zoho\crm\api\usergroups\ResponseWrapper;
use com\zoho\crm\api\usergroups\UserGroupsOperations;
use com\zoho\crm\api\usergroups\Criteria;
use com\zoho\crm\api\usergroups\GetGroupsParam;
use com\zoho\crm\api\usergroups\Field;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetGroups
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

    public static function getGroups()
    {
        $userGroupsOperations = new UserGroupsOperations();
        $criteria = new Criteria();
        $criteria->setComparator("equal");
        $field = new Field();
        $field->setAPIName("name");
        $criteria->setField($field);
        $criteria->setValue("group");
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetGroupsParam::filters(), $criteria);
        $response = $userGroupsOperations->getGroups($paramInstance);
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
                    echo ("User CreatedTime: " . date_format($user->getCreatedTime(), "d-m-Y-H-i-s") . "\n");
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
                    $info = $responseWrapper->getInfo();
                    if ($info != null) {
                        if ($info->getPerPage() != null) {
                            echo ("User Info PerPage: " . $info->getPerPage() . "\n");
                        }
                        if ($info->getCount() != null) {
                            echo ("User Info Count: " . $info->getCount() . "\n");
                        }
                        if ($info->getPage() != null) {
                            echo ("User Info Page: " . $info->getPage() . "\n");
                        }
                        if ($info->getMoreRecords() != null) {
                            echo ("User Info MoreRecords: " . $info->getMoreRecords() . "\n");
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
GetGroups::initialize();
GetGroups::getGroups();
