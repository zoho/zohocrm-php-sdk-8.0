<?php
use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\convertlead\ConvertLeadOperations;
use com\zoho\crm\api\convertlead\BodyWrapper;
use com\zoho\crm\api\convertlead\LeadConverter;
use com\zoho\crm\api\convertlead\ActionWrapper;
use com\zoho\crm\api\convertlead\SuccessResponse;
use com\zoho\crm\api\convertlead\APIException;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\record\Deals;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class ConvertLead 
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

    public static function convertLead(string $leadId) 
    {
        $convertLeadOperations = new ConvertLeadOperations($leadId);
        
        $bodyWrapper = new BodyWrapper();
        $data = array();
        
        $leadConverter = new LeadConverter();
        $leadConverter->setOverwrite(true);
        $leadConverter->setNotifyLeadOwner(true);
        $leadConverter->setNotifyNewEntityOwner(true);

		$accounts = new Record();
		$accounts->setId("1055806000023362051");
		$leadConverter->setAccounts($accounts);

		$contacts = new Record();
		$contacts->setId("1055806000022418044");
		$leadConverter->setContacts($contacts);

		$assignTo = new MinifiedUser();
		$assignTo->setId("1055806000000173021");
		$leadConverter->setAssignTo($assignTo);

		$deals = new Record();

		/*
		 * Call addFieldValue method that takes two arguments 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list. 2 -> Value
		 */
		$deals->addFieldValue(Deals::DealName(), "deal_name");
		$deals->addFieldValue(Deals::Description(), "deals description");
		$deals->addFieldValue(Deals::Stage(), new Choice("Closed Won"));
        $deals->addFieldValue(Deals::ClosingDate(),new \DateTime("2023-12-10"));
		$deals->addFieldValue(Deals::Amount(), 50.7);
		/*
		 * Call addKeyValue method that takes two arguments 1 -> A string that is the Field's API Name 2 -> Value
		 */
		$deals->addKeyValue("Custom_field", "Value");
		$deals->addKeyValue("Pipeline", new Choice("Qualification"));

		$leadConverter->setDeals($deals);
        
        array_push($data, $leadConverter);
        $bodyWrapper->setData($data);
        
        $response = $convertLeadOperations->convertLead($bodyWrapper);
        
        if($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");

            if($response->isExpected()) {
                $actionHandler = $response->getObject();
                
                if($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getData();
                    
                    foreach($actionResponses as $actionResponse) {
                        if($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                            echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                            echo("Details: \n");
                            if($successResponse->getDetails() != null) {
                                foreach($successResponse->getDetails() as $key => $value) {
                                    echo($key . " : " . print_r($value) . "\n");
                                }
                            }
                            echo("Message: " . $successResponse->getMessage() . "\n");
                        }
                        else if($actionResponse instanceof APIException) {
                            $exception = $actionResponse;
                            echo("Status: " . $exception->getStatus()->getValue() . "\n");
                            echo("Code: " . $exception->getCode()->getValue() . "\n");
                            echo("Details: \n");
                            if($exception->getDetails() != null) {
                                foreach($exception->getDetails() as $key => $value) {
                                    echo($key . " : " . print_r($value) . "\n");
                                }
                            }
                            echo("Message: " . $exception->getMessage()->getValue() . "\n");
                        }
                    }
                }
                else if($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
                    echo("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo("Code: " . $exception->getCode()->getValue() . "\n");
                    echo("Details: \n");
                    if($exception->getDetails() != null) {
                        foreach($exception->getDetails() as $key => $value) {
                            echo($key . " : " . $value . "\n");
                        }
                    }
                    echo("Message: " . $exception->getMessage()->getValue() . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}

ConvertLead::initialize();
ConvertLead::convertLead("1055806000028448054");
?>