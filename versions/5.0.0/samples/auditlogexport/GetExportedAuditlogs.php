<?php
namespace samples\auditlogexport;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\auditlogexport\APIException;
use com\zoho\crm\api\auditlogexport\AuditLogExportOperations;
use com\zoho\crm\api\auditlogexport\ResponseWrapper;

class GetExportedAuditlogs
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

    public static function getExportedAuditlogs()
    {
        $auditLogExportOperations = new AuditLogExportOperations();
        $response = $auditLogExportOperations->getExportedAuditlogs();

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";

            if ($response->getStatusCode() == 204) {
                echo "No Content\n";
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

                            echo "AuditLogExport Id: " . $auditLogExport1->getId() . "\n";
                            echo "AuditLogExport Status: " . $auditLogExport1->getStatus() . "\n";

                            $createdBy = $auditLogExport1->getCreatedBy();
                            if ($createdBy != null) {
                                echo "AuditLogExport User Id: " . $createdBy->getId() . "\n";
                                echo "AuditLogExport User Name: " . $createdBy->getName() . "\n";
                            }

                            $downloadLinks = $auditLogExport1->getDownloadLinks();
                            if ($downloadLinks != null) {
                                foreach ($downloadLinks as $link) {
                                    echo "AuditLogExport DownloadLink: " . $link . "\n";
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
                    echo "Status: " . $exception->getStatus()->getValue() . "\n";
                    echo "Code: " . $exception->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . "\n";
                    }
                    echo "Message: " . $exception->getMessage() . "\n";
                }
            }
        }
    }

    private static function printCriteria($criteria)
    {
        if ($criteria->getComparator() != null) {
            echo "ExportedAuditlogs Criteria Comparator: " . $criteria->getComparator() . "\n";
        }

        if ($criteria->getValue() != null) {
            echo "ExportedAuditlogs Criteria Value: " . implode(", ", $criteria->getValue()) . "\n";
        }

        if ($criteria->getField() != null) {
            echo "ExportedAuditlogs Criteria Field Name: " . $criteria->getField()->getAPIName() . "\n";
        }

        $criteriaGroup = $criteria->getGroup();
        if ($criteriaGroup != null) {
            foreach ($criteriaGroup as $criteria1) {
                self::printCriteria($criteria1);
            }
        }

        if ($criteria->getGroupOperator() != null) {
            echo "ExportedAuditlogs Criteria Group Operator: " . $criteria->getGroupOperator() . "\n";
        }
    }
}

GetExportedAuditlogs::initialize();
GetExportedAuditlogs::getExportedAuditlogs();
