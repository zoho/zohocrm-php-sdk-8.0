<?php
namespace samples\bulkread;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\bulkread\BulkReadOperations;
use com\zoho\crm\api\bulkread\BodyWrapper;
use com\zoho\crm\api\bulkread\CallBack;
use com\zoho\crm\api\bulkread\Query;
use com\zoho\crm\api\bulkread\Criteria;
use com\zoho\crm\api\bulkread\ActionWrapper;
use com\zoho\crm\api\bulkread\SuccessResponse;
use com\zoho\crm\api\bulkread\APIException;
use com\zoho\crm\api\modules\MinifiedModule;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\fields\MinifiedField;

require_once "vendor/autoload.php";

class CreateBulkReadJob
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

    public static function createBulkReadJob(string $moduleAPIName)
    {
        $bulkReadOperations = new BulkReadOperations();
        
        $requestWrapper = new BodyWrapper();
        
        $callback = new CallBack();
        $callback->setUrl("https://www.example.com/callback");
        $callback->setMethod(new Choice("post"));
        $requestWrapper->setCallback($callback);
        
        $query = new Query();
        $module = new MinifiedModule();
		$module->setAPIName($moduleAPIName);
        $query->setModule($module);
        // $query->setCvid("34770610087501");
        
        $fieldAPINames = array();
        array_push($fieldAPINames, "Last_Name");
        $query->setFields($fieldAPINames);
        $query->setPage(1);
        
        $criteria = new Criteria();
        $field = new MinifiedField();
        $field->setAPIName("Created_Time");
        $criteria->setField($field);
        $criteria->setComparator(new Choice("between"));
        $createdTime = array("2020-06-03T17:31:48+05:30", "2020-06-03T17:31:48+05:30");
        $criteria->setValue($createdTime);
        $query->setCriteria($criteria);
        $query->setFileType("csv");
        
        $requestWrapper->setQuery($query);
        
        $response = $bulkReadOperations->createBulkReadJob($requestWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getData();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                        
                        echo("Details: ");
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo($key . " : ");
                            print_r($value);
                            echo("\n");
                        }
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Message: " . $exception->getMessage() . "\n");
                        
                        echo("Details: ");
                        foreach ($exception->getDetails() as $key => $value) {
                            echo($key . " : " . $value . "\n");
                        }
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

CreateBulkReadJob::initialize();
$moduleAPIName = "Leads";
CreateBulkReadJob::createBulkReadJob($moduleAPIName);
?>
