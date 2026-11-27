<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\ActionWrapper;
use com\zoho\crm\api\record\BodyWrapper;
use com\zoho\crm\api\record\FileDetails;
use com\zoho\crm\api\record\LineItemProduct;
use com\zoho\crm\api\record\LineTax;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\SuccessResponse;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\record\{Leads, Deals, Sales_Orders, Contacts, Quotes, Purchase_Orders};
use com\zoho\crm\api\record\Consent;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\record\Record;

require_once "vendor/autoload.php";

class UpdateRecord
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

    public static function updateRecord(string $moduleAPIName, string $recordId)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $request = new BodyWrapper();
        $records = array();
        $record1 = new Record();
        /*
         * Call addFieldValue method that takes two arguments
         * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
         * 2 -> Value
         */
        $record1->addFieldValue(Leads::City(), "City");
        $record1->addFieldValue(Leads::LastName(), "Last Name");
        $record1->addFieldValue(Leads::FirstName(), "First Name");
        $record1->addFieldValue(Leads::Company(), "KKRNP");
        // $accounts = new Record();
        // $accounts->addKeyValue("id", "3477061058489");
        // $record1->addFieldValue(Contacts::AccountName(), $accounts);
        /*
         * Call addKeyValue method that takes two arguments
         * 1 -> A string that is the Field's API Name
         * 2 -> Value
         */
        $record1->addKeyValue("Custom_field", "Value");
        $record1->addKeyValue("Custom_field_2", "value");
        $record1->addKeyValue("Date_1", new \DateTime('2020-03-08'));
        $record1->addKeyValue("Date_Time_2", date_create("2021-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
        $fileDetails = array();
        $fileDetail1 = new FileDetails();
        $fileDetail1->setFileIds("3475");
        array_push($fileDetails, $fileDetail1);
        $fileDetail2 = new FileDetails();
        $fileDetail2->setFileIds("ae9c7cefa418aec1d6a5cc2d9ab35c32244f4e660f3702f05463e2fd0a2d8c1c");
        array_push($fileDetails, $fileDetail2);
        $fileDetail3 = new FileDetails();
        $fileDetail3->setFileIds("ae9c7cefa418aec1d6a5cc2d9ab35c326a3f4c7562925ac9afc0f7433dd2098c");
        array_push($fileDetails, $fileDetail3);
        $record1->addKeyValue("File_Upload", $fileDetails);
        $recordOwner = new MinifiedUser();
        $recordOwner->setEmail("abc@zoho.com");
        $record1->addKeyValue("Owner", $recordOwner);
        //Used when GDPR is enabled
        $dataConsent = new Consent();
        $dataConsent->setConsentRemarks("Approved.");
        $dataConsent->setConsentThrough("Email");
        $dataConsent->setContactThroughEmail(true);
        $dataConsent->setContactThroughSocial(false);
        $record1->addKeyValue("Data_Processing_Basis_Details", $dataConsent);
        $subformList = [];
        $subform = new Record();
        $subform->addKeyValue("Subform FieldAPIName", "FieldValue");
        array_push($subformList, $subform);
        $record1->addKeyValue("Subform Name", $subformList);
        /** Following methods are being used only by Inventory modules */
        $dealName = new Record();
        $dealName->addFieldValue(Deals::id(), "3477061121123");
        $record1->addFieldValue(Sales_Orders::DealName(), $dealName);
        $contactName = new Record();
        $contactName->addFieldValue(Contacts::id(), "3477061118531");
        $record1->addFieldValue(Purchase_Orders::ContactName(), $contactName);
        $accountName = new Record();
        $accountName->addKeyValue("name", "automatedAccount");
        $record1->addFieldValue(Quotes::AccountName(), $accountName);
        $record1->addKeyValue("Discount", 10.5);
        $inventoryLineItemList = [];
        $inventoryLineItem = new Record();
        $lineItemProduct = new LineItemProduct();
        $lineItemProduct->setId("3477061012107031");
        // $lineItemProduct->addKeyValue("Products_External", "AutomatedSDKExternal");
        $inventoryLineItem->addKeyValue("Description", "asd");
        $inventoryLineItem->addKeyValue("Discount", "5");
        $parentId = new Record();
        $parentId->setId("352403307331017");
        //		inventoryLineItem->addKeyValue("Parent_Id", 5);
        $inventoryLineItem->addKeyValue("Sequence_Number", "1");
        $lineitemProduct = new LineItemProduct();
        $lineitemProduct->setId("35240333659082");
        $inventoryLineItem->addKeyValue("Product_Name", $lineItemProduct);
        $inventoryLineItem->addKeyValue("Sequence_Number", "1");
        $inventoryLineItem->addKeyValue("Quantity", 123.2);
        $inventoryLineItem->addKeyValue("Tax", 123.2);
        array_push($inventoryLineItemList, $inventoryLineItem);
        $productLineTaxes = [];
        $productLineTax = new LineTax();
        $productLineTax->setName("MyT2ax1134");
        $productLineTax->setPercentage(20.0);
        array_push($productLineTaxes, $productLineTax);
        $inventoryLineItem->addKeyValue("Line_Tax", $productLineTaxes);
        array_push($inventoryLineItemList, $inventoryLineItem);
        $record1->addKeyValue("Quoted_Items", $inventoryLineItemList);
        $lineTaxes = [];
        $lineTax = new LineTax();
        $lineTax->setName("MyT2ax1134");
        $lineTax->setPercentage(20.0);
        array_push($lineTaxes, $lineTax);
        $record1->addKeyValue('$line_tax', $lineTaxes);
        /** End Inventory **/
        $tagList = [];
        $tag = new Tag();
        $tag->setName("Testtask1");
        array_push($tagList, $tag);
        $record1->setTag($tagList);
        //Add Record instance to the list
        array_push($records, $record1);
        $request->setData($records);
        $trigger = array("approval", "workflow", "blueprint");
        $request->setTrigger($trigger);
        $headerInstance = new HeaderMap();
        // $headerInstance->add(UpdateRecordHeader::XEXTERNAL(), "Quotes.Quoted_Items.Product_Name.Products_External");
        //Call updateRecord method that takes BodyWrapper instance, ModuleAPIName and recordId as parameter.
        $response = $recordOperations->updateRecord($recordId, $request, $headerInstance);
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
$recordId = "34772";
UpdateRecord::initialize();
UpdateRecord::updateRecord($moduleAPIName, $recordId);
