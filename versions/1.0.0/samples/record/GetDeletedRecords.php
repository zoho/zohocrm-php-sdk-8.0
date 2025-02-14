<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\DeletedRecordsWrapper;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\GetDeletedRecordsHeader;
use com\zoho\crm\api\record\GetDeletedRecordsParam;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class GetDeletedRecords
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

    public static function getDeletedRecords(string $moduleAPIName)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetDeletedRecordsParam::type(), "all"); //all, recycle, permanent
        $paramInstance->add(GetDeletedRecordsParam::page(), 1);
        $paramInstance->add(GetDeletedRecordsParam::perPage(), 2);
        $headerInstance = new HeaderMap();
        $ifModifiedSince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $headerInstance->add(GetDeletedRecordsHeader::IfModifiedSince(), $ifModifiedSince);
        $response = $recordOperations->getDeletedRecords($paramInstance, $headerInstance);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            if ($response->isExpected()) {
                $deletedRecordsHandler = $response->getObject();
                if ($deletedRecordsHandler instanceof DeletedRecordsWrapper) {
                    $deletedRecordsWrapper = $deletedRecordsHandler;
                    $deletedRecords = $deletedRecordsWrapper->getData();
                    foreach ($deletedRecords as $deletedRecord) {
                        $deletedBy = $deletedRecord->getDeletedBy();
                        if ($deletedBy != null) {
                            echo ("DeletedRecord Deleted By User-Name: " . $deletedBy->getName() . "\n");
                            echo ("DeletedRecord Deleted By User-ID: " . $deletedBy->getId() . "\n");
                        }
                        echo ("DeletedRecord ID: " . $deletedRecord->getId() . "\n");
                        echo ("DeletedRecord DisplayName: " . $deletedRecord->getDisplayName() . "\n");
                        echo ("DeletedRecord Type: " . $deletedRecord->getType() . "\n");
                        $createdBy = $deletedRecord->getCreatedBy();
                        if ($createdBy != null) {
                            echo ("DeletedRecord Created By User-Name: " . $createdBy->getName() . "\n");
                            echo ("DeletedRecord Created By User-ID: " . $createdBy->getId() . "\n");
                        }
                        echo ("DeletedRecord DeletedTime: ");
                        print_r($deletedRecord->getDeletedTime());
                        echo ("\n");
                    }
                    $info = $deletedRecordsWrapper->getInfo();
                    if ($info != null) {
                        if ($info->getPerPage() != null) {
                            echo ("Deleted Record Info PerPage: " . $info->getPerPage() . "\n");
                        }
                        if ($info->getCount() != null) {
                            echo ("Deleted Record Info Count: " . $info->getCount() . "\n");
                        }
                        if ($info->getPage() != null) {
                            echo ("Deleted Record Info Page: " . $info->getPage() . "\n");
                        }
                        if ($info->getMoreRecords() != null) {
                            echo ("Deleted Record Info MoreRecords: " . $info->getMoreRecords() . "\n");
                        }
                    }
                } else if ($deletedRecordsHandler instanceof APIException) {
                    $exception = $deletedRecordsHandler;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo ($key . " : " . $value . "\n");
                    }
                    echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}
$moduleAPIName = "leads";
GetDeletedRecords::initialize();
GetDeletedRecords::getDeletedRecords($moduleAPIName);
