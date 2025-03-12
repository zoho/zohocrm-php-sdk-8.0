<?php
namespace samples\record\updaterecords;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\record\Accounts;
use com\zoho\crm\api\record\ActionWrapper;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\BodyWrapper;
use com\zoho\crm\api\record\Consent;
use com\zoho\crm\api\record\FileDetails;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\SuccessResponse;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class UpdateAccounts
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

    public static function updateAccounts(string $moduleAPIName)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $bodyWrapper = new BodyWrapper();
        $records = array();
        $record1 = new Record();
        $record1->setId("3477061189101");
        $record1->addFieldValue(Accounts::AccountName(), 'New Account');
        $record1->addFieldValue(Accounts::Phone(), '1010101');
        $record1->addFieldValue(Accounts::Fax(), 'fax');
        $record1->addFieldValue(Accounts::AccountSite(), 'www.account.com');
        $record1->addFieldValue(Accounts::Website(), 'website.com');
        $record1->addFieldValue(Accounts::AccountNumber(), '10212212');
        $record1->addFieldValue(Accounts::Ownership(), new Choice('Private'));
        $record1->addFieldValue(Accounts::AccountType(), new Choice('Customer'));
        $record1->addFieldValue(Accounts::Employees(), '');
        $record1->addFieldValue(Accounts::Industry(), new Choice('Real Estate'));
        $record1->addFieldValue(Accounts::SICCode(), 12231);
        $record1->addFieldValue(Accounts::AnnualRevenue(), 1002.2);
        $record1->addFieldValue(Accounts::AccountName(), 'New Account');
        $parent_account = new Record();
        // $parent_account->setId("3232302312313");
        // $record1->addFieldValue(Accounts::ParentAccount(), $parent_account);
        // Address info
        $record1->addFieldValue(Accounts::BillingCity(), 'billing city');
        $record1->addFieldValue(Accounts::BillingStreet(), 'billing Street');
        $record1->addFieldValue(Accounts::BillingCode(), 'billing code');
        $record1->addFieldValue(Accounts::BillingCountry(), 'billing Country');
        $record1->addFieldValue(Accounts::BillingState(), 'billing State');
        $record1->addFieldValue(Accounts::ShippingCity(), 'shipping city');
        $record1->addFieldValue(Accounts::ShippingCode(), 'shipping code');
        $record1->addFieldValue(Accounts::ShippingCountry(), 'shipping country');
        $record1->addFieldValue(Accounts::ShippingStreet(), 'shipping street');
        $record1->addFieldValue(Accounts::ShippingState(), 'shipping state');
        //
        $record1->addFieldValue(Accounts::Description(), 'description');
        // used when GDPR is enabled
        $dataConsent = new Consent();
        $dataConsent->setConsentRemarks("Approved");
        $dataConsent->setConsentThrough("Email");
        $dataConsent->setContactThroughEmail(true);
        $dataConsent->setContactThroughSocial(false);
        $dataConsent->setContactThroughPhone(true);
        $dataConsent->setContactThroughSurvey(true);
        $dataConsent->setConsentDate(new \DateTime('2023-10-10'));
        $dataConsent->setDataProcessingBasis("Obtained");
        $record1->addKeyValue("Data_Processing_Basis_Details", $dataConsent);
        // for custom Fields
        $record1->addKeyValue("External", "Value12445");
        $record1->addKeyValue("Custom_Field", "custom_value");
        $record1->addKeyValue("Date_Time_1", date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
        $record1->addKeyValue("Date_1", '2023:10:21');
        $record1->addKeyValue("Subject", "AutomatedSDK");
        $record1->addKeyValue("Product_Name", "Automated");
        $fileDetails = array();
        $fileDetail1 = new FileDetails();
        $fileDetail1->setFileIdS("ae9c7cefa418aec1d6d90b0bd44183d280");
        array_push($fileDetails, $fileDetail1);
        $fileDetail2 = new FileDetails();
        $fileDetail2->setFileIdS("ae9c7cefa418aec1dd87c6d90b0bd44183d2de");
        array_push($fileDetails, $fileDetail2);
        $record1->addKeyValue("File_Upload", $fileDetails);
        // for Custom User LookUp
        $user = new MinifiedUser();
        $user->setId("4222222222222323123");
        $record1->addKeyValue("User_1", $user);
        // for Custom LookUp
        $data = new Record();
        $data->setId("4232434444444342123");
        $record1->addKeyValue("Lookup_1", $data);
        // for Custom PickList
        $record1->addKeyValue("Pick", new Choice("true"));
        // for Custom MultiSelect
        $record1->addKeyValue("MultiSelect", array(new Choice("Option 1"), new Choice("Option 2")));
        // for Subform
        $subformList = array();
        $subform = new Record();
        $subform->addKeyValue("CustomField", "customValue");
        $user1 = new MinifiedUser();
        $user1->setId("4303032334334343");
        $subform->addKeyValue("UserField", $user1);
        array_push($subformList, $subform);
        $record1->addKeyValue("Subform_1", $subformList);
        // for MultiSelectLookUp/Custom MultiSelectLookup
        $multiselectList = array();
        $record = new Record();
        $record->addKeyValue("id", "44024808841");
        $linkingRecord = new Record();
        $linkingRecord->addKeyValue("Msl", $record);
        array_push($multiselectList, $linkingRecord);
        $record1->addKeyValue("Msl", $multiselectList);
        //
        $tagList = array();
        $tag = new Tag();
        $tag->setName("Testtask");
        array_push($tagList, $tag);
        $record1->setTag($tagList);

        // can add update another record with same above mention fields
        $record2 = new Record();
        $record2->setId("3454324334");
        //
        //Add Record instance to the list
        array_push($records, $record1);
        $bodyWrapper->setData($records);
        $trigger = array("approval", "workflow", "blueprint");
        $bodyWrapper->setTrigger($trigger);
        $bodyWrapper->setLarId("347706187515");

        $headerInstance = new HeaderMap();
        // $headerInstance->add(CreateRecordsHeader::XEXTERNAL(), "Quotes.Quoted_Items.Product_Name.Products_External");
        // $headerInstance->add(CreateRecordsHeader::XEXTERNAL(), "Products.Products_External");
        //Call createRecords method that takes BodyWrapper instance as parameter.
        $response = $recordOperations->updateRecords($bodyWrapper, $headerInstance);
        if ($response != null) {
            //Get the status code from response
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            if ($response->isExpected()) {
                //Get object from response
                $actionHandler = $response->getObject();
                if ($actionHandler instanceof ActionWrapper) {
                    $actionWrapper = $actionHandler;
                    $actionResponses = $actionWrapper->getData();
                    foreach ($actionResponses as $actionResponse) {
                        if ($actionResponse instanceof SuccessResponse) {
                            $successResponse = $actionResponse;
                            echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");
                            echo ("Code: " . $successResponse->getCode()->getValue() . "\n");
                            echo ("Details: ");
                            foreach ($successResponse->getDetails() as $key => $value) {
                                echo ($key . " : ");
                                print_r($value);
                                echo ("\n");
                            }
                            echo ("Message: " . ($successResponse->getMessage() instanceof Choice ? $successResponse->getMessage()->getValue() : $successResponse->getMessage()) . "\n");
                        } else if ($actionResponse instanceof APIException) {
                            $exception = $actionResponse;
                            echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                            echo ("Code: " . $exception->getCode()->getValue() . "\n");
                            echo ("Details: ");
                            foreach ($exception->getDetails() as $key => $value) {
                                echo ($key . " : " . $value . "\n");
                            }
                            echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                        }
                    }
                } else if ($actionHandler instanceof APIException) {
                    $exception = $actionHandler;
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
$moduleAPIName = "Accounts";
UpdateAccounts::initialize();
UpdateAccounts::updateAccounts($moduleAPIName);