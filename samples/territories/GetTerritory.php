<?php
namespace com\zoho\crm\sample\territories;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\territories\APIException;
use com\zoho\crm\api\territories\ResponseWrapper;
use com\zoho\crm\api\territories\TerritoriesOperations;

require_once "vendor/autoload.php";

class GetTerritory
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
     * <h3> Get Territory </h3>
     * This method is used to get the single territory and print the response.
     * @param territoryId - The ID of the Territory to be obtained
     * @throws Exception
     */
    public static function getTerritory(string $territoryId)
    {
        $territoriesOperations = new TerritoriesOperations();
        
        $response = $territoriesOperations->getTerritory($territoryId);
        
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
                $territoryList = $responseWrapper->getTerritories();
                if($territoryList != null)
                {
                    foreach($territoryList as $territory)
                    {
						echo("Territory CreatedTime: " . print_r($territory->getCreatedTime(), true) . "\n");
						echo("Territory permission type: " . $territory->getPermissionType()->getValue() . "\n");
						echo("Territory ModifiedTime: " . print_r($territory->getModifiedTime(), true) . "\n");
						$manager = $territory->getManager();
						if ($manager != null)
						{
							echo("Territory Manager User-Name: " . $manager->getName() . "\n");
							echo("Territory Manager User-ID: " . $manager->getId() . "\n");
						}
						$criteria = $territory->getAccountRuleCriteria();
						if ($criteria != null)
						{
							self::printCriteria($criteria);
						}
						echo("Territory Name: " . $territory->getName() . "\n");
						$modifiedBy = $territory->getModifiedBy();
						if ($modifiedBy != null)
						{
							echo("Territory Modified By User-Name: " . $modifiedBy->getName() . "\n");
							echo("Territory Modified By User-ID: " . $modifiedBy->getId() . "\n");
						}
						$dealRuleCriteria1 = $territory->getDealRuleCriteria();
						if ($dealRuleCriteria1 != null)
						{
							self::printCriteria($dealRuleCriteria1);
						}
						echo("Territory Description: " . $territory->getDescription() . "\n");
						echo("Territory ID: " . $territory->getId() . "\n");
						$createdBy = $territory->getCreatedBy();
						if ($createdBy != null)
						{
							echo("Territory Created By User-Name: " . $createdBy->getName() . "\n");
							echo("Territory Created By User-ID: " . $createdBy->getId() . "\n");
						}
						$reportingTo = $territory->getReportingTo();
						if ($reportingTo != null)
						{
							echo("Territory reporting By Territory-Name: " . $reportingTo->getName() . "\n");
							echo("Territory reporting By Territory-ID: " . $reportingTo->getId() . "\n");
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

    public static function printCriteria($criteria)
	{
		if ($criteria->getComparator() != null)
		{
			echo("CustomView Criteria Comparator: " . $criteria->getComparator() . "\n");
		}
		if ($criteria->getField() != null)
		{
			echo("CustomView Criteria field name: " . $criteria->getField()->getAPIName() . "\n");
		}
		if ($criteria->getValue() != null)
		{
			echo("CustomView Criteria Value: " . $criteria->getValue()->toString() . "\n");
		}
		$criteriaGroup = $criteria->getGroup();
		if ($criteriaGroup != null)
		{
			foreach ($criteriaGroup as $criteria1)
			{
				self::printCriteria($criteria1);
			}
		}
		if ($criteria->getGroupOperator() != null)
		{
			echo("CustomView Criteria Group Operator: " . $criteria->getGroupOperator() . "\n");
		}
	}
}
GetTerritory::initialize();
GetTerritory::getTerritory("1055806000003051397");