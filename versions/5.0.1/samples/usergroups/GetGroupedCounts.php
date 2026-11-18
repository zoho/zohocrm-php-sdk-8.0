<?php
namespace samples\usergroups;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\usergroups\APIException;
use com\zoho\crm\api\usergroups\GetGroupedCountsParam;
use com\zoho\crm\api\usergroups\UserGroupsOperations;
use com\zoho\crm\api\usergroups\GroupedCountWrapper;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetGroupedCounts
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

	public static function getGroupedCounts($groupId)
	{
		$userGroupsOperations = new UserGroupsOperations();
		$paramInstance = new ParameterMap();
		$paramInstance->add(GetGroupedCountsParam::groupBy(), "status");
		$response = $userGroupsOperations->getGroupedCounts($groupId, $paramInstance);
		if ($response != null) {
			echo ("Status Code : " . $response->getStatusCode() . "\n");
			if (in_array($response->getStatusCode(), array(204, 304))) {
				echo ($response->getStatusCode() == 204 ? "No Content" : "Not Modified");
				return;
			}
			if ($response->isExpected()) {
				$responseHandler = $response->getObject();
				if ($responseHandler instanceof GroupedCountWrapper) {
					$responseWrapper = $responseHandler;
					$groupedCounts = $responseWrapper->getGroupedCounts();
					if ($groupedCounts != null) {
						foreach ($groupedCounts as $groupedCount) {
							echo ("User Status: " . $groupedCount->getStatus()->getValue() . "\n");
							echo ("User Count: " . $groupedCount->getCount() . "\n");
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
}
$groupId = "347717236002";
GetGroupedCounts::initialize();
GetGroupedCounts::getGroupedCounts($groupId);