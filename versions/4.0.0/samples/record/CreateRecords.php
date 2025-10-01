<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\ActionWrapper;
use com\zoho\crm\api\record\BodyWrapper;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\SuccessResponse;
use com\zoho\crm\api\record\{Leads, Accounts, Deals, Vendors, Purchase_Orders, Quotes, Contacts, Tasks, Events, Calls, Price_Books};
use com\zoho\crm\api\record\ImageUpload;
use com\zoho\crm\api\record\CreateRecordsHeader;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\record\Tax;
use com\zoho\crm\api\record\FileDetails;
use com\zoho\crm\api\record\Consent;
use com\zoho\crm\api\record\LineItemProduct;
use com\zoho\crm\api\record\LineTax;
use com\zoho\crm\api\record\RemindAt;
use com\zoho\crm\api\record\Participants;
use com\zoho\crm\api\record\RecurringActivity;
use com\zoho\crm\api\record\Reminder;
use com\zoho\crm\api\record\PricingDetails;

require_once "vendor/autoload.php";

class CreateRecords
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

    public static function createRecords(string $moduleAPIName)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $bodyWrapper = new BodyWrapper();
        $records = array();
        $record1 = new Record();
        /*
         * Call addFieldValue method that takes two arguments
         * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
         * 2 -> Value
         */
        // Leads start
        $record1->addFieldValue(Leads::City(), "City");
        $record1->addFieldValue(Leads::LastName(), "FROm PHP");
        $record1->addFieldValue(Leads::FirstName(), "First Name");
        $record1->addFieldValue(Leads::Company(), "KKRNP");
        $recordOwner = new MinifiedUser();
        $recordOwner->setEmail("abc@zoho.com");
        $record1->addFieldValue(Leads::Owner(), $recordOwner);
        // Leads end

        //Custom fields
        /*
         * Call addKeyValue method that takes two arguments
         * 1 -> A string that is the Field's API Name
         * 2 -> Value
         */
        $record1->addKeyValue("CustomField", "Value");
        $record1->addKeyValue("Pick", new Choice("true"));
        $record = new Record();
        $record->addKeyValue("id", "44024801099117");
        $record1->addKeyValue("Lookup_1", $record);
        $user = new MinifiedUser();
        $user->setId("4402482541");
        $record1->addKeyValue("User_1", $user);

        $multi_select_record = new Record();
        $multi_select_record->setId("347706112966050");
        $linkingRecord = new Record();
        $linkingRecord->addKeyValue("Multi_Select_Lookup_1", $multi_select_record);
        $record1->addKeyValue("Multi_Select_Lookup_1", [$linkingRecord]);

        $subformList = array();
        $subform = new Record();
        $subform->addKeyValue("customfield", "customValue");
        $user1 = new MinifiedUser();
        $user1->setId("4402482541");
        $subform->addKeyValue("Userfield", $user1);
        array_push($subformList, $subform);
        $record1->addKeyValue("Subform_2", $subformList);

        $record1->addKeyValue("Multiselect", array(new Choice("Option 1"), new Choice("Option 2")));
        $record1->addKeyValue("Datetime3", date_create("2023-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
        $record1->addKeyValue("Date_1", (new \DateTime('2021-03-08')));
        $record1->addKeyValue("Subject", "From PHP");
        $record1->addKeyValue("External", "TestExternal123");
        $taxes = array();
        $tax = new Tax();
        $tax->setValue("MyTax1123 - 10.0 %");
        array_push($taxes, $tax);
        $record1->addKeyValue("Tax", $taxes);
        $record1->addKeyValue("Product_Name", "AutomatedSDK");
        $record1->addKeyValue("Products_External", "Products_External");

        $imageUpload = new ImageUpload();
        $imageUpload->setFileIdS("ae9c7cefa4183e275ffade3f0ff");
        $record1->addKeyValue("Image_Upload", [$imageUpload]);

        $fileDetails = array();
        $fileDetail1 = new FileDetails();
        $fileDetail1->setFileIdS("ae9c7cefa418ae8b6161a4df6e2c0dc1f0f80");
        array_push($fileDetails, $fileDetail1);
        $fileDetail2 = new FileDetails();
        $fileDetail2->setFileIdS("ae9c7cefa418ae745678b577297a3b3");
        array_push($fileDetails, $fileDetail2);
        $fileDetail3 = new FileDetails();
        $fileDetail3->setFileIdS("ae9c7cefa418aecb609f1ba7bd4aee6eb");
        array_push($fileDetails, $fileDetail3);
        $record1->addKeyValue("File_Upload", $fileDetails);
        // Custom fields end

        // Deals start
        $record1->addFieldValue(Deals::Stage(), new Choice("Qualification"));
        $record1->addFieldValue(Deals::DealName(), "deal_name");
        $record1->addFieldValue(Deals::Description(), "deals description");
        $record1->addFieldValue(Deals::ClosingDate(), new \DateTime("2021-06-02"));
        $record1->addFieldValue(Deals::Amount(), 50.7);
        $accounts = new Record();
        $accounts->addKeyValue("id", "3477061058489");
        // $record1->addFieldValue(Deals::AccountName(), $accounts);
        $record1->addFieldValue(Deals::Pipeline(), new Choice("Qualification"));
        // Deals end

        /** Following methods are being used only by Inventory modules */
        $record1->addFieldValue(Purchase_Orders::Subject(), "TestPHP SDK");
        $vendorName = new Record();
        $vendorName->addFieldValue(Vendors::id(), "3477061072471");
        $record1->addFieldValue(Purchase_Orders::VendorName(), $vendorName);
        $contactName = new Record();
        $contactName->addFieldValue(Contacts::id(), "3477061113834");
        $record1->addFieldValue(Purchase_Orders::ContactName(), $contactName);
        $accountName = new Record();
        $accountName->addKeyValue("name", "automatedAccount");
        // $record1->addFieldValue(Quotes::AccountName(), $accountName);
        $record1->addKeyValue("Discount", 10.5);
        $inventoryLineItemList = array();
        $inventoryLineItem = new Record();
        $lineItemProduct = new LineItemProduct();
        $lineItemProduct->setId("3477061053569");
        // $lineItemProduct->addKeyValue("Products_External", "Products_External");
        $inventoryLineItem->addKeyValue("Product_Name", $lineItemProduct);
        $inventoryLineItem->addKeyValue("Quantity", 1.5);
        $inventoryLineItem->addKeyValue("Description", "productDescription");
        $inventoryLineItem->addKeyValue("ListPrice", 10.0);
        $inventoryLineItem->addKeyValue("Discount", "5%");
        $productLineTaxes = array();
        $productLineTax = new LineTax();
        $productLineTax->setName("MyTax2156");
        $productLineTax->setPercentage(20.0);
        array_push($productLineTaxes, $productLineTax);
        $inventoryLineItem->addKeyValue("Line_Tax", $productLineTaxes);
        array_push($inventoryLineItemList, $inventoryLineItem);
        $record1->addKeyValue("Purchase_Items", $inventoryLineItemList);
        $lineTaxes = array();
        $lineTax = new LineTax();
        $lineTax->setName("MyTax2156 - 12.0 %");
        $lineTax->setPercentage(20.0);
        array_push($lineTaxes, $lineTax);
        $record1->addKeyValue('$line_tax', $lineTaxes);
        /** End Inventory **/

        /** Following methods are being used only by Activity modules */
        // Tasks,Calls,Events
        $record1->addFieldValue(Tasks::Subject(), "TestPHP SDK");
        $record1->addFieldValue(Tasks::Description(), "Test Task");
        $record1->addKeyValue("Currency", new Choice("INR"));
        $remindAt = new RemindAt();
        $remindAt->setAlarm("FREQ=DAILY;INTERVAL=10;UNTIL=2020-08-14;DTSTART=2020-07-03");
        $record1->addFieldValue(Tasks::RemindAt(), $remindAt);
        $whoId = new Record();
        $whoId->setId("3477061113834");
        $record1->addFieldValue(Tasks::WhoId(), $whoId);
        $record1->addFieldValue(Tasks::Status(), new Choice("Waiting for input"));
        $record1->addFieldValue(Tasks::DueDate(), new \DateTime('2021-03-08'));
        $record1->addFieldValue(Tasks::Priority(), new Choice("High"));
        $record1->addKeyValue('$se_module', "Accounts");
        $whatId = new Record();
        $whatId->setId("3477061113831");
        $record1->addFieldValue(Tasks::WhatId(), $whatId);

        // Events
        /** Recurring Activity can be provided in any activity module*/
        $recurringActivity = new RecurringActivity();
        $recurringActivity->setRrule("FREQ=DAILY;INTERVAL=10;UNTIL=2020-08-14;DTSTART=2020-07-03");
        $record1->addFieldValue(Events::RecurringActivity(), $recurringActivity);
        $record1->addFieldValue(Events::Description(), "Test Events");
        $startdatetime = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $record1->addFieldValue(Events::StartDateTime(), $startdatetime);
        $participants = array();
        $participant1 = new Participants();
        $participant1->setEmail("abc@zoho.com");
        $participant1->setType("email");
        array_push($participants, $participant1);
        $participant2 = new Participants();
        $participant2->addKeyValue("participant", "3477061190301");
        $participant2->addKeyValue("type", "lead");
        array_push($participants, $participant2);
        $record1->addFieldValue(Events::Participants(), $participants);
        $record1->addKeyValue('$send_notification', true);
        $record1->addFieldValue(Events::EventTitle(), "From PHP");
        $enddatetime = date_create("2020-07-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $record1->addFieldValue(Events::EndDateTime(), $enddatetime);
        $record1->addFieldValue(Events::CheckInStatus(), "PLANNED");
        $reminderList = array();
        $remindAt = new Reminder();
        $remindAt->setPeriod("minutes");
        $remindAt->setUnit(15);
        array_push($reminderList, $remindAt);
        $remindAt1 = new Reminder();
        $remindAt1->setPeriod("days");
        $remindAt1->setUnit(1);
        $remindAt1->setTime("10:30");
        array_push($reminderList, $remindAt1);
        $record1->addFieldValue(Events::RemindAt(), $reminderList);
        $record1->addKeyValue('$se_module', "Leads");
        $whatId = new Record();
        $whatId->setId("3477061190301");
        $record1->addFieldValue(Events::WhatId(), $whatId);
        $record1->addFieldValue(Tasks::WhatId(), $whatId);
        $record1->addFieldValue(Calls::CallType(), new Choice("Outbound"));
        $record1->addFieldValue(Calls::CallStartTime(), date_create("2020-07-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
        /** End Activity **/

        /** Following methods are being used only by Price_Books modules */
        $pricingDetails = array();
        $pricingDetail1 = new PricingDetails();
        $pricingDetail1->setFromRange(1.0);
        $pricingDetail1->setToRange(5.0);
        $pricingDetail1->setDiscount(2.0);
        array_push($pricingDetails, $pricingDetail1);
        $pricingDetail2 = new PricingDetails();
        $pricingDetail2->addKeyValue("from_range", 6.0);
        $pricingDetail2->addKeyValue("to_range", 11.0);
        $pricingDetail2->addKeyValue("discount", 3.0);
        array_push($pricingDetails, $pricingDetail2);
        $record1->addFieldValue(Price_Books::PricingDetails(), $pricingDetails);
        $record1->addKeyValue("Email", "user1223@zoho.com");
        $record1->addFieldValue(Price_Books::Description(), "TEST");
        $record1->addFieldValue(Price_Books::PriceBookName(), "book_name");
        $record1->addFieldValue(Price_Books::PricingModel(), new Choice("Flat"));
        $tag = new Tag();
        $tag->setName("Testtask");
        $record1->setTag([$tag]);

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

        array_push($records, $record1);
        $bodyWrapper->setData($records);
        $trigger = array("approval", "workflow", "blueprint");
        $bodyWrapper->setTrigger($trigger);
        $bodyWrapper->setLarId("347706187515");

        $headerInstance = new HeaderMap();
        // $headerInstance->add(CreateRecordsHeader::XEXTERNAL(), "Quotes.Quoted_Items.Product_Name.Products_External");
        // $headerInstance->add(CreateRecordsHeader::XEXTERNAL(), "Products.Products_External");
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
                                echo ($key . " : ");
                                print_r($value);
                                echo ("\n");
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
CreateRecords::initialize();
CreateRecords::createRecords($moduleAPIName);
