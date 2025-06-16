<?php
namespace notes;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\notes\APIException;
use com\zoho\crm\api\notes\ActionWrapper;
use com\zoho\crm\api\notes\BodyWrapper;
use com\zoho\crm\api\notes\NotesOperations;
use com\zoho\crm\api\notes\SuccessResponse;
use com\zoho\crm\api\notes\ParentId;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\modules\MinifiedModule;

require_once "vendor/autoload.php";

class CreateNotes
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

    public static function createNotes()
    {
        $notesOperations = new NotesOperations();
        $bodyWrapper = new BodyWrapper();
        //List of Note instances
        $notes = array();
        for ($i = 1; $i <= 5; $i++) {
            $nodeClass = 'com\zoho\crm\api\notes\Note';
            $note = new $nodeClass();
            $note->setNoteTitle("Contacted");
            $note->setNoteContent("Need to do further tracking");
            $parentRecord = new ParentId();
            $parentRecord->setId("4402480774074");
            $module = new MinifiedModule();
			$module->setId(34770612175);
			$module->setAPIName("Leads");
			$parentRecord->setModule($module);
            $note->setParentId($parentRecord);
            //Add Note instance to the list
            array_push($notes, $note);
        }
        $bodyWrapper->setData($notes);
        $bodyWrapper->setTrigger(["workflow", "approval", "blueprint"]);
        //Call createNotes method that takes BodyWrapper instance as parameter
        $response = $notesOperations->createNotes($bodyWrapper);
        if ($response != null) {
            echo ("Status Code: " . $response->getStatusCode() . "\n");
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
                        if ($successResponse->getDetails() != null) {
                            foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                                echo ($keyName . " : ");
                                print_r($keyValue);
                                echo ("\n");
                            }
                        }
                        echo ("Message: " . ($successResponse->getMessage() instanceof Choice ? $successResponse->getMessage()->getValue() : $successResponse->getMessage()) . "\n");
                    }
                    else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo ("Code: " . $exception->getCode()->getValue() . "\n");
                        echo ("Details: ");
                        if ($exception->getDetails() != null) {
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo ($keyName . ": \n"); print_r($keyValue );
                                echo ("\n");
                            }
                        }
                        echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                    }
                }
            }
            else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                if ($exception->getDetails() != null) {
                    echo ("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo ($keyName . ": " . $keyValue . "\n");
                    }
                }
                echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()));
            }
        }
    }
}
CreateNotes::initialize();
CreateNotes::createNotes();