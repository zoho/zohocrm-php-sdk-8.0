<?php
namespace samples\assignmentrules;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\assignmentrules\AssignmentRulesOperations;
use com\zoho\crm\api\assignmentrules\APIException;
use com\zoho\crm\api\assignmentrules\ResponseWrapper;
use com\zoho\crm\api\assignmentrules\GetAssignmentRulesParam;

class GetAssignmentRules
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
     * This method is used to get all assignment rules
     */
    public static function getAssignmentRules()
    {
        $assignmentRulesOperations = new AssignmentRulesOperations();
        
        // Create parameter map for optional parameters
        $paramInstance = new ParameterMap();
        
        // Add module parameter if needed
        $paramInstance->add(GetAssignmentRulesParam::module(), "Leads");
        
        $response = $assignmentRulesOperations->getAssignmentRules($paramInstance);

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
                    $assignmentRules = $responseWrapper->getAssignmentRules();

                    if ($assignmentRules != null) {
                        foreach ($assignmentRules as $assignmentRule) {
                            echo "Assignment Rule ID: " . $assignmentRule->getId() . "\n";
                            echo "Assignment Rule Name: " . $assignmentRule->getName() . "\n";
                            echo "Assignment Rule API Name: " . $assignmentRule->getAPIName() . "\n";
                            echo "Assignment Rule Description: " . $assignmentRule->getDescription() . "\n";
                            
                            // Get created time
                            if ($assignmentRule->getCreatedTime() != null) {
                                echo "Created Time: " . $assignmentRule->getCreatedTime()->format('Y-m-d H:i:s') . "\n";
                            }
                            
                            // Get modified time
                            if ($assignmentRule->getModifiedTime() != null) {
                                echo "Modified Time: " . $assignmentRule->getModifiedTime()->format('Y-m-d H:i:s') . "\n";
                            }
                            
                            // Get created by user
                            $createdBy = $assignmentRule->getCreatedBy();
                            if ($createdBy != null) {
                                echo "Created By - ID: " . $createdBy->getId() . "\n";
                                echo "Created By - Name: " . $createdBy->getName() . "\n";
                                echo "Created By - Email: " . $createdBy->getEmail() . "\n";
                            }
                            
                            // Get modified by user
                            $modifiedBy = $assignmentRule->getModifiedBy();
                            if ($modifiedBy != null) {
                                echo "Modified By - ID: " . $modifiedBy->getId() . "\n";
                                echo "Modified By - Name: " . $modifiedBy->getName() . "\n";
                                echo "Modified By - Email: " . $modifiedBy->getEmail() . "\n";
                            }
                            
                            // Get default assignee
                            $defaultAssignee = $assignmentRule->getDefaultAssignee();
                            if ($defaultAssignee != null) {
                                echo "Default Assignee - ID: " . $defaultAssignee->getId() . "\n";
                                echo "Default Assignee - Name: " . $defaultAssignee->getName() . "\n";
                            }
                            
                            // Get module information
                            $module = $assignmentRule->getModule();
                            if ($module != null) {
                                echo "Module - API Name: " . $module->getAPIName() . "\n";
                                echo "Module - ID: " . $module->getId() . "\n";
                            }
                            
                            echo "-----------------------------\n";
                        }
                    }
                } else if ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . "\n";
                    echo "Code: " . $exception->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    if ($exception->getDetails() != null) {
                        foreach ($exception->getDetails() as $key => $value) {
                            echo $key . ": " . $value . "\n";
                        }
                    }
                    echo "Message: " . $exception->getMessage()->getValue() . "\n";
                }
            } else {
                print_r($response);
            }
        }
    }
}

GetAssignmentRules::initialize();
GetAssignmentRules::getAssignmentRules();