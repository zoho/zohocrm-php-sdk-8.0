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
use com\zoho\crm\api\assignmentrules\GetAssignmentRuleParam;

class GetAssignmentRule
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
     * This method is used to get a specific assignment rule by ID
     * @param string $assignmentRuleId The ID of the assignment rule
     */
    public static function getAssignmentRule($assignmentRuleId)
    {
        $assignmentRulesOperations = new AssignmentRulesOperations();
        
        // Create parameter map for optional parameters
        $paramInstance = new ParameterMap();
        
        // Add module parameter if needed
        $paramInstance->add(GetAssignmentRuleParam::module(), "Leads");
        
        $response = $assignmentRulesOperations->getAssignmentRule($assignmentRuleId, $paramInstance);

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

                    if ($assignmentRules != null && count($assignmentRules) > 0) {
                        $assignmentRule = $assignmentRules[0]; // Get the first (and only) assignment rule
                        
                        echo "Assignment Rule Details:\n";
                        echo "=======================\n";
                        echo "ID: " . $assignmentRule->getId() . "\n";
                        echo "Name: " . $assignmentRule->getName() . "\n";
                        echo "API Name: " . $assignmentRule->getAPIName() . "\n";
                        echo "Description: " . $assignmentRule->getDescription() . "\n";
                        
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
                            echo "Created By:\n";
                            echo "  ID: " . $createdBy->getId() . "\n";
                            echo "  Name: " . $createdBy->getName() . "\n";
                            echo "  Email: " . $createdBy->getEmail() . "\n";
                            if ($createdBy->getZuid() != null) {
                                echo "  ZUID: " . $createdBy->getZuid() . "\n";
                            }
                        }
                        
                        // Get modified by user
                        $modifiedBy = $assignmentRule->getModifiedBy();
                        if ($modifiedBy != null) {
                            echo "Modified By:\n";
                            echo "  ID: " . $modifiedBy->getId() . "\n";
                            echo "  Name: " . $modifiedBy->getName() . "\n";
                            echo "  Email: " . $modifiedBy->getEmail() . "\n";
                            if ($modifiedBy->getZuid() != null) {
                                echo "  ZUID: " . $modifiedBy->getZuid() . "\n";
                            }
                        }
                        
                        // Get default assignee
                        $defaultAssignee = $assignmentRule->getDefaultAssignee();
                        if ($defaultAssignee != null) {
                            echo "Default Assignee:\n";
                            echo "  ID: " . $defaultAssignee->getId() . "\n";
                            echo "  Name: " . $defaultAssignee->getName() . "\n";
                        }
                        
                        // Get module information
                        $module = $assignmentRule->getModule();
                        if ($module != null) {
                            echo "Module:\n";
                            echo "  API Name: " . $module->getAPIName() . "\n";
                            echo "  ID: " . $module->getId() . "\n";
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

GetAssignmentRule::initialize();
GetAssignmentRule::getAssignmentRule("1055806000027559001");