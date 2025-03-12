<?php
namespace samples\auditlogexport;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\auditlogexport\AuditLogExportOperations;
use com\zoho\crm\api\auditlogexport\ResponseWrapper;
use com\zoho\crm\api\auditlogexport\APIException;

class GetExportedAuditlog
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

    public static function getExportedAuditlog($id)
    {
        $auditLogExportOperations = new AuditLogExportOperations();
        $response = $auditLogExportOperations->getExportedAuditlog($id);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

            if ($response->getStatusCode() == 204) {
                echo "No Content" . PHP_EOL;
                return;
            }

            if ($response->isExpected()) {
                $responseHandler = $response->getObject();

                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $auditLogExport = $responseWrapper->getAuditLogExport();

                    if ($auditLogExport != null) {
                        foreach ($auditLogExport as $auditLogExport1) {
                            $criteria = $auditLogExport1->getCriteria();
                            if ($criteria != null) {
                                self::printCriteria($criteria);
                            }

                            echo "AuditLogExport Id: " . $auditLogExport1->getId() . PHP_EOL;
                            echo "AuditLogExport Status: " . $auditLogExport1->getStatus() . PHP_EOL;

                            $createdBy = $auditLogExport1->getCreatedBy();
                            if ($createdBy != null) {
                                echo "AuditLogExport User Id: " . $createdBy->getId() . PHP_EOL;
                                echo "AuditLogExport User Name: " . $createdBy->getName() . PHP_EOL;
                            }

                            $downloadLinks = $auditLogExport1->getDownloadLinks();
                            if ($downloadLinks != null) {
                                foreach ($downloadLinks as $link) {
                                    echo "AuditLogExport DownloadLink: " . $link . PHP_EOL;
                                }
                            }
                            echo "AuditLogExport JobStartTime: " . date_format($auditLogExport1->getJobStartTime(), 'd-m-y-H-i-s') . PHP_EOL;
                            echo "AuditLogExport JobEndTime: " . date_format($auditLogExport1->getJobEndTime(), 'd-m-y-H-i-s') . PHP_EOL;
                            if ($auditLogExport1->getExpiryDate() != null) {
                                echo "AuditLogExport ExpiryDate: " . date_format($auditLogExport1->getExpiryDate(), 'd-m-y') . PHP_EOL;
                            }
                        }
                    }
                } elseif ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                    echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                    echo "Details: " . PHP_EOL;
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . PHP_EOL;
                    }
                    echo "Message: " . $exception->getMessage() . PHP_EOL;
                }
            }
        }
    }

    private static function printCriteria($criteria)
    {
        if ($criteria->getComparator() != null) {
            echo "ExportedAuditlogs Criteria Comparator: " . $criteria->getComparator() . PHP_EOL;
        }

        if ($criteria->getValue() != null) {
            echo "ExportedAuditlogs Criteria Value: " . implode(", ", $criteria->getValue()) . PHP_EOL;
        }

        if ($criteria->getField() != null) {
            echo "ExportedAuditlogs Criteria Field Name: " . $criteria->getField()->getAPIName() . PHP_EOL;
        }

        $criteriaGroup = $criteria->getGroup();
        if ($criteriaGroup != null) {
            foreach ($criteriaGroup as $criteria1) {
                self::printCriteria($criteria1);
            }
        }

        if ($criteria->getGroupOperator() != null) {
            echo "ExportedAuditlogs Criteria Group Operator: " . $criteria->getGroupOperator() . PHP_EOL;
        }
    }
}

GetExportedAuditlog::initialize();
$id = 72722500621004;
GetExportedAuditlog::getExportedAuditlog($id);