<?php
namespace samples\record\createrecords;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\InitializeBuilder;
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
use com\zoho\crm\api\record\Leads;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\layouts\Layouts;

require_once "vendor/autoload.php";

class CreateLeads
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

    public static function createLeads(string $moduleAPIName)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $bodyWrapper = new BodyWrapper();
        $records = array();
        $recordClass = 'com\zoho\crm\api\record\Record';
        $record1 = new $recordClass();
        $record1->addFieldValue(Leads::City(), "City");
        $record1->addFieldValue(Leads::Company(), "company");
        $record1->addFieldValue(Leads::LastName(), "FROm now PHP");
        $record1->addFieldValue(Leads::FirstName(), "First Name");
        $record1->addFieldValue(Leads::AnnualRevenue(), 1002.2);
        $record1->addFieldValue(Leads::Email(), "abc@zoho.com");
        $record1->addKeyValue("Title", "Title Name");
        $record1->addFieldValue(Leads::SecondaryEmail(), "abc1@zoho.com");
        $record1->addFieldValue(Leads::Phone(), "131131");
        $record1->addFieldValue(Leads::Fax(), "Fax");
        $record1->addFieldValue(Leads::Mobile(), "2010101");
        $record1->addFieldValue(Leads::Website(), "www.domain.com");
        $record1->addFieldValue(Leads::LeadSource(), new Choice("Advertisement"));
        $record1->addFieldValue(Leads::NoOfEmployees(), 10);
        $record1->addFieldValue(Leads::Industry(), new Choice("ERP"));
        $record1->addFieldValue(Leads::EmailOptOut(), true);
        $record1->addFieldValue(Leads::LeadStatus(), new Choice("Contacted"));
        $record1->addFieldValue(Leads::Rating(), new Choice("Active"));
        $record1->addFieldValue(Leads::SkypeID(), "Skype_id");
        $record1->addFieldValue(Leads::Twitter(), "twitter123");
        //Address info
        $record1->addFieldValue(Leads::Street(), "Street");
        $record1->addFieldValue(Leads::State(), "State Name");
        $record1->addFieldValue(Leads::City(), "City name");
        $record1->addFieldValue(Leads::Country(), "Country Name");
        $record1->addFieldValue(Leads::ZipCode(), "Zipcode");
        //
        $record1->addFieldValue(Leads::Description(), "description");
        //used when GDPR is enabled
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
        //for custom Fields
        $record1->addKeyValue("External", "Value12445");
        $record1->addKeyValue("Longinteger", 123);
        $record1->addKeyValue("CustomField", "custom_value");
        $record1->addKeyValue("Datetime", date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
        $record1->addKeyValue("Date_1", new \DateTime('2021-12-10'));
        $record1->addKeyValue("Subject", "AutomatedSDK");
        $record1->addKeyValue("Product_Name", "Automated");
        $fileDetails = array();
        $fileDetail1 = new FileDetails();
        $fileDetail1->setFileIdS("ae9c7cefa418aec1d6a5cc2d9ab35c32a6ae23d729ad87c6d90b0bd44183d280");
        array_push($fileDetails, $fileDetail1);
        $fileDetail2 = new FileDetails();
        $fileDetail2->setFileIdS("ae9c7cefa418aec1d6a5cc2d9ab35c32a6ae23d729ad87c6d90b0bd44183d2de");
        array_push($fileDetails, $fileDetail2);
        $record1->addKeyValue("File_Upload", $fileDetails);
        //for Custom User LookUp
        $user = new MinifiedUser();
        $user->setId("440248000254001");
        $record1->addKeyValue("User_1", $user);
        //for Custom LookUp
        $data = new Record();
        $data->setId("440248000774074");
        $record1->addKeyValue("Lookup_1", $data);
        //for Custom PickList
        $record1->addKeyValue("Pick", new Choice("true"));
        //for Custom MultiSelect
        $record1->addKeyValue("Multiselect", array(new Choice("Option 1"), new Choice("Option 2")));
        //for Subform
        $subformList = array();
        $subform = new Record();
        $subform->addKeyValue("customfield", "customValue");
        $user1 = new MinifiedUser();
        $user1->setId("440248000254001");
        $subform->addKeyValue("Userfield", $user1);
        array_push($subformList, $subform);
        $record1->addKeyValue("Subform_2", $subformList);
        //for MultiSelectLookUp/Custom MultiSelectLookup
        $multiselectList = array();
        $record = new Record();
        $record->addKeyValue("id", "440248000884001");
        $linkingRecord = new Record();
        $linkingRecord->addKeyValue("MultiSelectLookup", $record);
        $record2 = new Record();
        $record2->setId("440248001103145");
        $linkingRecord1 = new Record();
        $linkingRecord1->addKeyValue("MultiSelectLookup", $record2);
        array_push($multiselectList, $linkingRecord);
        array_push($multiselectList, $linkingRecord1);
        $record1->addKeyValue("MultiSelectLookup", $multiselectList);

        $data = new Layouts();
        $data->setId("42322123");
        $record1->addKeyValue("Layout", $data);

        $tagList = array();
        $tag = new Tag();
        $tag->setName("Testtask");
        array_push($tagList, $tag);
        $record1->setTag($tagList);
        //Add Record instance to the list
        array_push($records, $record1);
        $bodyWrapper->setData($records);
        $trigger = array("approval", "workflow", "blueprint");
        $bodyWrapper->setTrigger($trigger);
        $bodyWrapper->setLarId("34770610087515");

        $headerInstance = new HeaderMap();
        // $headerInstance->add(CreateRecordsHeader::XEXTERNAL(), "Quotes.Quoted_Items.Product_Name.Products_External");
        // $headerInstance->add(CreateRecordsHeader::XEXTERNAL(), "Products.Products_External");
        //Call createRecords method that takes BodyWrapper instance as parameter.
        $response = $recordOperations->createRecords($bodyWrapper, $headerInstance);
        if ($response != null) {
            echo ("Status Code: " . $response->getStatusCode() . "\n");
            if ($response->isExpected()) {
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
$moduleAPIName = "leads";
CreateLeads::initialize();
CreateLeads::createLeads($moduleAPIName);