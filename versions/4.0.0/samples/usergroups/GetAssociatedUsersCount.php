<?php
namespace samples\usergroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\usergroups\APIException;
use com\zoho\crm\api\usergroups\AssociatedUserCount;
use com\zoho\crm\api\usergroups\UserGroupsOperations;
use com\zoho\crm\api\usergroups\GetAssociatedUsersCountParam;
use com\zoho\crm\api\usergroups\Criteria;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\usergroups\Field;

require_once "vendor/autoload.php";

class GetAssociatedUsersCount
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

	public static function getAssociatedUsersCount()
	{
		$userGroupsOperations = new UserGroupsOperations();
		$paramInstance = new ParameterMap();
		$paramInstance->add(GetAssociatedUsersCountParam::page(), "1");
		$paramInstance->add(GetAssociatedUsersCountParam::perPage(), "10");
		$criteria = new Criteria();
		$criteria->setGroupOperator(new Choice("OR"));
		$group = [];
		$group1 = new Criteria();
		$group1->setComparator("equal");
		$group1->setValue("test group");
		$field1 = new Field();
		$field1->setAPIName("name");
		$group1->setField($field1);
		array_push($group, $group1);

		$group2 = new Criteria();
		$group2->setComparator("equal");
		$group2->setValue("Tier2");
		$field2 = new Field();
		$field2->setAPIName("name");
		$group2->setField($field2);
		array_push($group, $group2);

		$criteria->setGroup($group);
		$paramInstance->add(GetAssociatedUsersCountParam::filters(), $criteria);
		$response = $userGroupsOperations->getAssociatedUsersCount($paramInstance);
		if ($response != null) {
			echo ("Status code " . $response->getStatusCode() . "\n");
			if (in_array($response->getStatusCode(), array(204, 304))) {
				echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
				return;
			}
			$responseHandler = $response->getObject();
			if ($responseHandler instanceof AssociatedUserCount) {
				$associatedUsersCount = $responseHandler->getAssociatedUsersCount();
				if ($associatedUsersCount != null) {
					foreach ($associatedUsersCount as $associatedUser) {
						echo ("AssociatedUser count: " . $associatedUser->getCount() . "\n");
						$userGroup = $associatedUser->getUserGroup();
						if ($userGroup != null) {
							echo ("AssociatedUser Name: " . $userGroup->getName() . "\n");
							echo ("AssociatedUser ID: " . $userGroup->getId() . "\n");
						}
					}
				}
				$info = $responseHandler->getInfo();
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
GetAssociatedUsersCount::initialize();
GetAssociatedUsersCount::getAssociatedUsersCount();